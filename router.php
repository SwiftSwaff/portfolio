<?php
if (!defined('IndexAccessed')) {
    die('Direct access not permitted');
}

$projectRefs = array(
    "countdown" => "countdown.php",
);

switch ($slug) {
    case "":
        include getenv("DOCUMENT_ROOT") . "/components/hero.php";
        include getenv("DOCUMENT_ROOT") . "/pages/home.php";
        break;
    case "overview":
        findNestedRoute("overviews", $filename);
        break;
    case "projects":
        findNestedRoute("projects", $filename);
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
            if ($slug == "projects") {
                include getenv("DOCUMENT_ROOT") . "/pages/{$slug}/{$name}/{$file}";
            }
            else if ($slug == "overviews") {
                include getenv("DOCUMENT_ROOT") . "/pages/{$slug}/{$file}";
            }
            
            return;
        }
    }
    header('HTTP/1.1 404 Not Found');
    include getenv("DOCUMENT_ROOT") . "/404.html";
}
?>