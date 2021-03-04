<?php
require __DIR__ . '/bootstrap.php';
if (!isset($_SESSION['login']) || 1 != $_SESSION['login']) {
    header ('Location: ' . URL . 'login.php');
    die;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Private</title>
</head>
<body style="background-image: url('orange.jpg'); background-repeat: no-repeat; background-size: cover;">
    <h1>Hello, <?= $_SESSION['user']['name'] ?> <?= $_SESSION['user']['surname'] ?>!</h1>
    <p>This is your private page. Only you can reach this information!</p>
</body>
</html>