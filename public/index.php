<?php

use App\Autoloader;
use App\Config;
require '../vendor/autoload.php';
require '../app/Autoloader.php';
Autoloader::register();

if(isset($_GET['p'])) {
    $p = $_GET['p'];
}else{
    $p = 'home';
}

ob_start();

if($p === 'home') {
    require '../pages/home.php';
}else if ($p === 'post'){
    require '../pages/single.php';
}else if($p === 'categorie'){
    require '../pages/categorie.php';
}
$content = ob_get_clean();

require '../pages/templates/default.php';

?>