<?
require_once('config.php');
require_once('rb-mysql.php');
try {
    R::setup("mysql:host=$host;dbname=$dbname", $user, $password);
    R::fancyDebug(TRUE); // DEV MODE
} catch (PDOException $e) {
    $_SESSION['errors'] =  $e->getmessage();
    // dev mode
    var_dump($e);
}
