<?php
namespace App\models;

class CycleModel extends model
{
    protected $table;
    public function __construct()
    {
        $this->table = 'classe';
    }
    public function getClasseByCycle(string $cycle){
        $sql = "SELECT classe.nom, classe.anee, classe.id
        FROM $this->table
        JOIN typecycle ON classe.idTypeCycle = typecycle.id where typecycle.nom LIKE '$cycle'";
        return $this->myQuerry($sql);
    }
}