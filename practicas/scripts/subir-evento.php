<?php
    require_once 'db.php';

    // Procesar el formulario de nuevo evento
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Título
        if(isset($_POST['title'])) {
            $title = $_POST['title'];
        }

        if(isset($_POST['author'])) {
            $author = $_POST['author'];
        }

        // Portada
        if(isset($_FILES['cover'])) {
            $errors = array();
            $file_name = $_FILES['cover']['name'];
            $file_size = $_FILES['cover']['size'];
            $file_tmp = $_FILES['cover']['tmp_name'];
            $file_type = $_FILES['cover']['type'];
            $file_ext = strtolower(end(explode('.', $_FILES['cover']['name'])));

            $extensions = array('jpeg', 'jpg', 'png');

            if(in_array($file_ext, $extensions) === false) {
                $errors[] = "Extensión no permitida, elige una imagen PNG o JPEG";
            }

            if($file_size > 2097152) {
                $errors[] = "Tamaño de imagen demasiado grande";
            }

            if(empty($errors) === true) {
                move_uploaded_file($file_tmp, "img/" . $file_name);
                $cover = "img/" . $file_name;
            }
        }

        // Imágenes
        $images = array();
        if(isset($_FILES['images'])) {
            $n = count($_FILES['images']['name']);
            for($i = 0; $i < $n; $i++) {
                $errors = array();
                $file_name = $_FILES['images']['name'][$i];
                $file_size = $_FILES['images']['size'][$i];
                $file_tmp = $_FILES['images']['tmp_name'][$i];
                $file_type = $_FILES['images']['type'][$i];
                $file_ext = strtolower(end(explode('.', $_FILES['images']['name'][$i])));
    
                if(in_array($file_ext, $extensions) === false) {
                    $errors[$i] = "Extensión no permitida, elige una imagen PNG o JPEG";
                }
    
                if($file_size > 2097152) {
                    $errors[$i] = "Tamaño de imagen demasiado grande";
                }
    
                if(empty($errors) === true) {
                    move_uploaded_file($file_tmp, "img/" . $file_name);
                    array_push($images, "../img/" . $file_name);
                }
            }
        }

        // Evento
        if(isset($_POST['event'])) {
            $event = $_POST['event'];
        }

        // Subir a la base de datos
        $id = new_event($title, $author, $event, $cover, $images);

        header('Location: /evento/' . $id);
    }
?>