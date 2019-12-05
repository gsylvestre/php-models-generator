<?php 

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

class GenerateModelsCommand extends Command
{
    protected static $defaultName = 'generate-models';

    protected function configure()
    {
        $this->setDescription('Generate PHP models based on existing database');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $helper = $this->getHelper('question');

        $question = new Question('Database name ? ');
        $dbName = $helper->ask($input, $output, $question);

        $question = new Question('Database host ? [localhost] ', 'localhost');
        $dbHost = $helper->ask($input, $output, $question);

        $question = new Question('Database user ? [root] ', 'root');
        $dbUser = $helper->ask($input, $output, $question);

        $question = new Question('Database password ? ', '');
        $question->setHidden(true);
        $dbPass = $helper->ask($input, $output, $question);

        $generator = new ModelGenerator();
        
        $tableNames = $generator->getTableNames();
        $tableInfos = [];
        foreach($tableNames as $tableName){
            $tableInfos[] = new TableInfo($tableName);
        }

        foreach($tableInfos as $tableInfo){
            $classGenerator = new ClassGenerator($tableInfo);
            $classGenerator->createFile();
        }

        $output->writeln('Done! Your models are in the models/ folder.');
        return 0;
    }
}