<?php
function getPath($path): string
{
    return str_replace('/', DIRECTORY_SEPARATOR, $path);
}