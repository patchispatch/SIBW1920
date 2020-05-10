<?php
    require 'db.php';

// Page name
    $pagename = "Nuevo evento";

    echo $twig->render('nuevo.html', [
        'pagename' => $pagename,
    ]);
?>