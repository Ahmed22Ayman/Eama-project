

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="user\assets\css\header.css">
    <link rel="stylesheet" href="user\assets\css\footer.css"> -->
    <link rel="stylesheet" href="../public/css/register.css">
    <script src="../public/js/register.js"></script>
    <title> User Sign Up </title>
    <script src="https://kit.fontawesome.com/a98ac1f71c.js" crossorigin="anonymous"></script>
</head>

<body>

    <?php include 'header.php';
    include_once '../helpers/session-helper.php';
    ?>
        <?php flash('register') ?>

    <div class="container">

        <h1>Sign Up Now</h1>
        <form action='../controllers/Users-controller.php' method='post' enctype="multipart/form-data">
        <input type="hidden" name="type" value="register">


            <input type="text" id="UsersName" name="UsersName" placeholder="Enter your Full Name" size="15" required>
            <input type="email" id="UsersEmail" placeholder="Enter your email" name="UsersEmail" required>
            <input type="text" id="Usersn" placeholder="Enter your Username" name="Usersn" required>
            <input type="password" name="UsersPwd" id="UsersPwd" placeholder="Enter your Password" required>
            <input type="password" name="pwdRepeat" id="pwdRepeat" placeholder="Confirm your Password" required>
            <div class="role">
                <label for="role">Role:</label>
            </div>
            <select id="role" name="UsersRole" required>
                <option value="">Select Role</option>
                <option value="company">Company</option>
                <option value="pharmacy">Pharmacy</option>
                <option value="user">User</option>
            
            </select>





            <b> <button type="submit">Sign Up </button></b> <br><br>
            <div class="account">
                <div class="aa">
                    Already have an account? <a href="user login.php"><b>Login</b>
                </div>
                </p>
            </div>

    </div>

    </form>
    <?php

    //grap data from user if form was submitted 

    // if ($_SERVER["REQUEST_METHOD"] == "POST") { //check if form was submitted
    //     $firstname = htmlspecialchars($_POST["firstname"]);
    //     $lastname = htmlspecialchars($_POST["lastname"]);
    //     $phone = htmlspecialchars($_POST["phone"]);
    //     $email = htmlspecialchars($_POST["email"]);
    //     $psw = htmlspecialchars($_POST["psw"]);
    //     $pswconfirmt = htmlspecialchars($_POST["pswconfirmt"]);

    //     //insert it to database 
    //     $sql = "insert into user(firstname,lastname,phone,email,password,confirmpassword) 
	// values('$firstname','$lastname','$phone','$email','$psw','$pswconfirmt')";
    //     $result = mysqli_query($conn, $sql);

    //     //redirect the user back to index.php 
    //     if ($result) {
    //         header("Location:index.php");
    //     }
    // }


    ?>


    <?php include 'footer.php'; ?>
</body>

</html>