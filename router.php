<?php
if (!defined('IndexAccessed')) {
    die('Direct access not permitted');
}

$projectRefs = array(
    "countdown" => "countdown.php",
    "trading_game" => "trading_game.php",
);
//this is another comment
// handle overview and project pages differently as projects may have multiple files associated to each
switch ($slug) {
    case "":
        include getenv("DOCUMENT_ROOT") . "/components/hero.php";
        include getenv("DOCUMENT_ROOT") . "/pages/home.php";
        break;
    case "overviews":
        $dirname.= str_ends_with($dirname, ".php") ? "" : ".php";
        if (!include(getenv("DOCUMENT_ROOT") . "/pages/overviews/{$dirname}")) {
            header('HTTP/1.1 404 Not Found');
            include getenv("DOCUMENT_ROOT") . "/404.html";
        }
        break;
    case "projects":
        $page = "";
        if (!$filename) { // default file is same as the project name
            $page = "/pages/projects/{$dirname}/{$dirname}.php";
        }
        else { // referring to different php file within project folder
            $page = "/pages/projects/{$dirname}/{$filename}";
        }

        if (!include(getenv("DOCUMENT_ROOT") . $page)) {
            header('HTTP/1.1 404 Not Found');
            include getenv("DOCUMENT_ROOT") . "/404.html";
        }
        break;
    default:
        header('HTTP/1.1 404 Not Found');
        include getenv("DOCUMENT_ROOT") . "/404.html";
        break;
}
?>