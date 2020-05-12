<?php
    session_start();
    require_once 'db.php';

    // Save user data
    if(isset($_POST['username']) && check_user($_POST['username'], $_POST['passwd'])) {
        $_SESSION['username'] = $_POST['username'];
    }
    else {
       print_r("Todo mal");
    }

    if(isset($_POST['role'])) {
        switch($_POST['role']) {
            case 0:
                $role = 'admin';
            break;
            
            case 1:
                $role = 'gest';
            break;

            case 2:
                $role = 'mod';
            break;

            case 3:
                $role = 'regular';
            break;
        }
        $_SESSION['role'] = $role;
    }

    //header('Location: principal');
?>