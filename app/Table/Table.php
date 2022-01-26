<?php 

namespace App\Table;

use App\App;

class Table {

    protected static $table = 'table';

    public static function all()
    {
        $test = static::$table;
        return App::getDatabase()->query("SELECT * FROM $test", get_called_class());
    }

    public function __get($key)
    {
        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }

    public static function find($id)
    {
        $test = static::$table;
        return static::query("SELECT * FROM $test WHERE id = ?", [$id], true);
    }

    public static function query($query, $values = null, $one = false)
    {
        if($values){
            return App::getDatabase()->prepare($query, $values, get_called_class(), $one);
        }else{
            return App::getDatabase()->query($query, get_called_class(), $one);            
        }

    }


}