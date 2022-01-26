<?php 


namespace App\Table;

use App\App;

class Article extends Table{

    protected static $table = 'articles';

    public static function find($id)
    {
        $test = static::$table;
        return self::query("SELECT articles.id, articles.titre, contenu, categories.titre as categorie FROM articles LEFT JOIN categories ON categorie_id = categories.id WHERE articles.id = ?", [$id], true);
    }

    public static function getLast()
    {
        return self::query('SELECT articles.id, articles.titre, contenu, categories.titre as categorie FROM articles LEFT JOIN categories ON categorie_id = categories.id ORDER BY articles.date DESC');
    }

    public function __get($key)
    {
        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }


    public function getUrl()
    {
        return 'index.php?p=post&id=' . $this->id;
    
    }    
    public function getExtrait()
    {
        $html = '<p>' . substr($this->contenu, 0, 150) . '...</p>';
        $html .= '<p><a href="' . $this->getURL() . '">Voir la suite</a></p>';
        return $html;
    }

    public static function lastByCategory($id)
    {
        return self::query('SELECT articles.id, articles.titre, contenu, categories.titre as categorie FROM articles LEFT JOIN categories ON categorie_id = categories.id WHERE categorie_id = ? ORDER BY articles.date DESC', [$id]);

    }


}