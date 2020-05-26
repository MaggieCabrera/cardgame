<?php
declare(strict_types=1);
function my_autoloader($class) {
    $file = 'classes/' . $class . 'Class.php';
    if(file_exists($file))
        include $file;
}

spl_autoload_register('my_autoloader');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

?>