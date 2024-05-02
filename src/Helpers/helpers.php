<?php

require_once __DIR__ . "/../../vendor/autoload.php";

use MiniRest\Template\View;

function dd(mixed $value, mixed ...$values): void
{
    var_dump($value, ...$values);
    die();
}
function view($viewPath, $data = [])
{
    $view = new View($viewPath, $data);
    echo $view->render();
}
