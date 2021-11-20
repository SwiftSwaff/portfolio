<?php
ob_start();
include getenv("DOCUMENT_ROOT") . '/router.php';
$pageContent = ob_get_contents();
ob_end_clean();
?>

<html>
    <head>
        <?php include getenv("DOCUMENT_ROOT") . '/components/meta.php'; ?>
        <?php include getenv("DOCUMENT_ROOT") . '/components/imports.php'; ?>
    </head>
    <body>
        <?php include getenv("DOCUMENT_ROOT") . '/components/header.php'; ?>
        <?php echo $pageContent; ?>
        <?php include getenv("DOCUMENT_ROOT") . '/components/footer.php'; ?>
    </body>
</html>