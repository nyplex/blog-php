<?php 

namespace App;

use PDO;

class Config {

    private $name;
    private $user;
    private $password;
    private $path;
    private $pdo;

    public function __construct($name, $user = 'root', $password = 'root', $path = 'localhost')
    {
        $this->name = $name;
        $this->user = $user;
        $this->password = $password;
        $this->path = $path;
    }

    private function getPDO()
    {
        if($this->pdo === null) {
            $pdo = new PDO("mysql:dbname=blog;host=localhost", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }

    public function query($query, $class, $one = false)
    {
        $req = $this->getPDO()->query($query);
        $req->setFetchMode(PDO::FETCH_CLASS, $class);
        if($one){
            $data = $req->fetch();
        }else{
            $data = $req->fetchAll();
        }
        return $data;
    }

    public function prepare($query, $values, $class, $one = false)
    {
        $req = $this->getPDO()->prepare($query);
        $req->execute($values);
        $req->setFetchMode(PDO::FETCH_CLASS, $class);
        if($one){
            $data = $req->fetch();
        }else{
            $data = $req->fetchAll();
        }
        return $data;
    }



}