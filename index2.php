<?php
    include('session_verify.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form style="margin: 0 auto; text-align: center;" action="sign_up.php" method="POST">
        <label for="email">Nome:</label>
        <br>
        <input type="text" name="name">
        <br>
        <br>
        <label for="email">Sobrenome:</label>
        <br>
        <input type="text" name="last_name">
        <br>
        <br>
        <label for="email">Data de nascimento:</label>
        <br>
        <input type="date" name="date_of_birth">
        <br>
        <br>
        <label for="email">E-mail:</label>
        <br>
        <input type="email" name="email">
        <br>
        <br>
        <label for="password">Password:</label>
        <br>
        <input type="text" name="password">
        <br>
        <br>
        <input type="submit">
    </form>
</body>
</html>