<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo validación de formulario</title>
    <style>
        body{
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        div {
            margin-top: 10px;
        }

        label{
            display: block;
        }

        input[type="radio"] + label, input[type="checkbox"] + label {
            display: inline;

        }
        button {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <?php
    $errors = [];
    function filter($data, $image_name, $image_size, $image_temp, $image_type){

        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $errors = [];
        if(empty($_POST['nombre']) || preg_match("/[0-9]/", $_POST['nombre']) ){
            $errors[] = "El nombre no puede estar vacío y no puede contener números.";
        }
        if(empty($_POST['password']) || strlen($_POST['password']) < 4){
            $errors[] = "El password es obligatorio y debe tener más de 4 carácteres.";
        }
        if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $errors[] = "El formato del email no es válido.";
        }
        if(empty($image_name)){
            $errors[] = "Por favor elige un imágen";
        }

        $file_info = new finfo(FILEINFO_MIME_TYPE);
        $mime_type = $file_info->file($image_temp);
        }

        $allowed_image_types = ['image/jpeg', 'image/jpg', 'image/png'];

        //var_dump($errors);

        if(empty($errors)){
            $nombre = filter($_POST['nombre']);
            $password = filter($_POST['password']);
            $email = filter($_POST['email']);
            $image = filter($_POST['image']);
        }

        if(in_array($mime_type, $allowed_image_types) == false) {
            echo "Elige un imágen de jpeg o png";
        }

        $upload_max_size = 2 * 1024 * 1024; //2MB

        if($image_size > $upload_max_size) {
            echo "El imágen no puede ser más de 2MB";
        }
    }

    
    ?>
    <ul>
        <?php if(isset($errors)){
            foreach($errors as $error){
                echo "<li>$error</li>";
            }
        }
        ?>
    </ul>
    <?php if(isset($_POST['submit'])): ?>
    <h2><u>Has enviado los siguentes datos</u></h2>
        <p>Nombre: <?php isset($nombre) ? print $nombre : "" ?></p>
        <p>Password: <?php isset($password) ? print $password : "" ?></p>
        <p>Email: <?php isset($email) ? print $email : "" ?></p>
    <?php endif;?>
    
    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" maxlength="50">
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" maxlength="50">
        </div>
        
        <div>
            <label for="email">Email</label>
            <input type="text" id="email" name="email">
        </div>

        <div>
            <label for="image">Imágen</label>
            <input type="file" name="fileToUpload" id="fileToUpload">
        </div>

        <button type="submit" name="submit" value="enviar">Enviar</button>
    </form>
</body>
</html>