<?
function getPath($path)
{
    return str_replace('/', DIRECTORY_SEPARATOR, $path);
}
// Connect to database
require(realpath(dirname(__FILE__) . getPath('/../database/connect.php')));
require(realpath(dirname(__FILE__) . getPath('/../utils/constants.php')));
