<?
require_once('config.php');
require_once('rb.php');
try {
    // R::setup("mysql:host=$host;dbname=$dbname", $user, $password);
    R::setup( 'sqlite:platform.db' );
    R::fancyDebug(FALSE); // DEV MODE = TRUE
} catch (PDOException $e) {
    $_SESSION['errors'] =  $e->getmessage();
    // dev mode
    // var_dump($e);
}
