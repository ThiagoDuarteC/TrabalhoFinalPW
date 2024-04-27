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
    <form style="margin: 0 auto; text-align: center;" action="sign_in.php" method="POST">
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