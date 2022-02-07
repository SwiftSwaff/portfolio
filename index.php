<?php
define('IndexAccessed', true);

// break URI up into segments for router & components
$path = ltrim($_SERVER['REQUEST_URI'], '/');
$segments = explode('/', $path);

$slug = strtolower($segments[0]);
$dirname = isset($segments[1]) ? strtolower($segments[1]) : null;
$filename = isset($segments[2]) ? strtolower($segments[2]) : null;

$class = "";
if ($slug == "projects") {
    $class = "class='{$dirname}'";
}
// start buffer
ob_start();
include getenv("DOCUMENT_ROOT") . '/router.php';
$content = ob_get_contents();
ob_end_clean();
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <?php include getenv("DOCUMENT_ROOT") . '/components/meta.php'; ?>
        <?php include getenv("DOCUMENT_ROOT") . '/components/imports.php'; ?>
    </head>
    <body <?php echo $class ?>>
        <?php if ($slug != "projects") { include getenv("DOCUMENT_ROOT") . '/components/header.php'; } ?>
        <?php echo $content; ?>
        <?php if ($slug != "projects") { include getenv("DOCUMENT_ROOT") . '/components/footer.php'; } ?>
    </body>
</html>