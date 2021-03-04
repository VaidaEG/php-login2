<?php
require __DIR__ . '/bootstrap.php';

// POST metodo scenarijus
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $users = file_get_contents(__DIR__ . '/users.json');
    $users = json_decode($users, 1);
    $postName = $_POST['name'] ?? '';
    $postPass = $_POST['pass'] ?? '';
    foreach($users as $user) {
        if ($postName == $user['name']) { // <--- turime useri
            if (password_verify($postPass, $user['pass'])) { // <--- viskas ok
                // sugalvojam, kad 1 reiskia prisijungusi vartotoja
                // o 0 reiskia neprisijungusi vartotoja
                $_SESSION['login'] = 1;
                $_SESSION['user'] = $user;
                header('Location: ' . URL . 'private.php');
                die;

            }
        }
    }
    $_SESSION['error_msg'] = 'Password or name is invalid.';
    header('Location: ' . URL . 'login.php');
    die;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login page</h1>
    <!== tikriname ar yra pranesimas -->
    <?php if (isset($_SESSION['error_msg'])) : ?>
        <!-- pranesimas yra, ji atvaizduojame -->
        <h3 style="color: red;"><?= $_SESSION['error_msg'] ?></h3>
        <!-- atvaizdavome, nebereikalingas, istriname -->
        <?php unset($_SESSION['error_msg']) ?>
    <?php endif ?>
    <form action="<?= URL ?>login.php" method="post">
        NAME: <input type="text" name="name">
        PASSWORD: <input type="password" name="pass">
        <button type="submit">LOGIN</button>
    </form>
</body>
</html>