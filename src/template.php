class <?= $this->tableInfo->getClassName() ?>
{

<?php foreach($this->tableInfo->getProperties() as $prop): ?>
    private $<?= $prop ?>;
<?php endforeach; ?>

<?php for($i = 0; $i < count($this->tableInfo->getProperties()); $i++): ?>
    public function <?= $this->tableInfo->getGetters()[$i] ?>()
    {
        return $this-><?= $this->tableInfo->getProperties()[$i] ?>;
    } 

    public function <?= $this->tableInfo->getSetters()[$i] ?>($<?= $this->tableInfo->getProperties()[$i] ?>)
    {
        $this-><?= $this->tableInfo->getProperties()[$i] ?> = $<?= $this->tableInfo->getProperties()[$i] ?>;
    }

<?php endfor; ?>
}