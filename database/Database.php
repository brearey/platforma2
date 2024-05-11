<?

class Database
{
    function connect()
    {
        try {
            require('config.php');
            R::setup("mysql:host=$host;dbname=$dbname", $user, $password);
            R::fancyDebug(TRUE); // DEV MODE
        } catch (PDOException $e) {
            $_SESSION['errors'] =  $e->getmessage();
            // dev mode
            var_dump($e);
        }
    }
}
