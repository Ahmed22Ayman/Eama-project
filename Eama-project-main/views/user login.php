<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user Login</title>
    <!-- <link rel="stylesheet" href="user\assets\css\header.css">
    <link rel="stylesheet" href="user\assets\css\footer.css"> -->
    <link rel="stylesheet" href="../public/css/user login.css">
    <!-- <link rel="stylesheet" href="../public/css/style.css"> -->
    <!-- <script src="user\assets\js\user login.js"></script> -->
</head>

<body>
<?php include 'header.php';
    include_once '../helpers/session-helper.php';
    ?>
        <?php flash('login') ?>

</html>
<div class="container">
    <b>
        <h2> User Login</h2>
    </b>
    <form action="../controllers/Users-controller.php" method="post">
    <input type="hidden" name="type" value="login">

        <input type="text" id="Usersn/UsersEmail" name="Usersn/UsersEmail" placeholder="Username / Email" required>
        <input type="password" id="UsersPwd" name="UsersPwd" placeholder="Enter your password" required>

        <b> <button type="submit">Login </button></b> <br><br>

        <div id="error" class="error"></div>
    </form>
</div>
<?php include 'footer.php'; ?>

</body>

</html>