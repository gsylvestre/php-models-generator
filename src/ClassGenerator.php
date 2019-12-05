<?php 

class ClassGenerator 
{
    /** @var TableInfo */
    private $tableInfo;

    public function __construct(TableInfo $tableInfo)
    {
        $this->tableInfo = $tableInfo;
    }

    public function createFile()
    {
        $filename = $this->tableInfo->getClassName() . ".php";
        ob_start();
        include('template.php');
        $content = '<?php' . "\r\n\r\n" . ob_get_contents();
        ob_end_clean();

        file_put_contents("models/".$filename, $content);
    }
}