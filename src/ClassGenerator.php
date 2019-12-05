<?php 

class ClassGenerator 
{
    /** @var TableInfo */
    private $tableInfo;
    private $namespace;

    public function __construct(TableInfo $tableInfo, string $namespace = null)
    {
        $this->tableInfo = $tableInfo;
        $this->namespace = $namespace;
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