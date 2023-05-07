<?php 

require_once("libraries/database.php");


class Model
{
    // protected pour que les Class enfant puissent l'utiliser
protected $pdo;

public function __construct()
{
    $this->pdo=connectDataBase();
}
}

