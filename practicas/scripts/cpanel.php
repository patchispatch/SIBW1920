<?php
    require 'db.php';

// Page name
    $pagename = "Panel de control";

    echo $twig->render('cpanel.html', [
        'pagename' => $pagename,
    ]);
?>