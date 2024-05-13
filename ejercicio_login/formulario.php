<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ejemplo validación de formulario</title>
</head>

<body>
    <?php
    $errors = [];
    $nombre = "";
    $password = "";
    $email = "";
    $image = "";

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $image_name = $_FILES['fileToUpload']['name'];
        $image_size = $_FILES['fileToUpload']['size'];
        $image_temp = $_FILES['fileToUpload']['tmp_name'];
        $image_type = $_FILES['fileToUpload']['type'];

        function filter($data){
            if ($data !== null) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
            }
            return $data;
        }        

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

        $allowed_image_types = ['image/jpeg', 'image/jpg', 'image/png'];

        if (empty($errors)) {
            $nombre = filter($_POST['nombre']);
            $password = filter($_POST['password']);
            $email = filter($_POST['email']);
            $image = $image_name;

            if(in_array($mime_type, $allowed_image_types) == false) {
                $errors[] = "Elige un imágen de jpeg o png";
            }

            $upload_max_size = 2 * 1024 * 1024; //2MB

            if($image_size > $upload_max_size) {
                $errors[] = "El imágen no puede ser más de 2MB";
            }

            if (empty($errors)) {
                // Move the uploaded image to a designated folder
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
                if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
                    // Store the data in a text file
                    $data = [
                        'nombre' => $_POST['nombre'],
                        'password' => $_POST['password'],
                        'email' => $_POST['email'],
                        'image' => $_FILES['fileToUpload']['name']
                    ];
                    $data_string = json_encode($data);
                    file_put_contents('user_data.txt', $data_string);
        
                    echo "El archivo se ha subido correctamente.";
                } else {
                    $errors[] = "Hubo un error al subir el archivo.";
                }
            }
        }
    }
    ?>
    <?php if(!empty($errors)): ?>
        <ul>
            <?php foreach($errors as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <?php if(isset($_POST['submit']) && empty($errors)): ?>
        <h2><u>Has enviado los siguientes datos</u></h2>
        <p>Nombre: <?= htmlspecialchars($nombre) ?></p>
        <p>Password: <?= htmlspecialchars($password) ?></p>
        <p>Email: <?= htmlspecialchars($email) ?></p>
        <p>You may log in now.</p>
        <p><a href="login.php">Log In</a></p>
    <?php endif; ?>

    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <div>
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" maxlength="50" value="<?= htmlspecialchars($nombre) ?>">
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" maxlength="50" value="<?= htmlspecialchars($password) ?>">
        </div>
        
        <div>
            <label for="email">Email</label>
            <input type="text" id="email" name="email" value="<?= htmlspecialchars($email) ?>">
        </div>

        <div>
            <label for="image">Imágen</label>
            <input type="file" name="fileToUpload" id="fileToUpload">
        </div>

        <button type="submit" name="submit" value="enviar">Enviar</button>
    </form>
</body>
</html>
