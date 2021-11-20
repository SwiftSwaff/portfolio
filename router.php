<?php
$projectRefs = array(
    "countdown" => "countdown.php",
    "pokeapi"   => "pokeapi.php"
);

$path = ltrim($_SERVER['REQUEST_URI'], '/');
$elements = explode('/', $path);

$page = strtolower($elements[0]);
$param = isset($elements[1]) ? strtolower($elements[1]) : null;
switch ($page) {
    case "":
        include getenv("DOCUMENT_ROOT") . "/components/hero.php";
        include getenv("DOCUMENT_ROOT") . "/pages/home.php";
        break;
    case "overview":
        findNestedRoute("overviews", $param);
        break;
    case "projects":
        findNestedRoute("projects", $param);
        break;   
    default:
        header('HTTP/1.1 404 Not Found');
        include getenv("DOCUMENT_ROOT") . "/404.html";
        break;
}

function findNestedRoute($slug, $param) {
    global $projectRefs;
    foreach ($projectRefs as $name => $file) {
        if ($param == $name) {
            include getenv("DOCUMENT_ROOT") . "/pages/{$slug}/{$file}";
            return;
        }
    }
    header('HTTP/1.1 404 Not Found');
    include getenv("DOCUMENT_ROOT") . "/404.html";
}
?>