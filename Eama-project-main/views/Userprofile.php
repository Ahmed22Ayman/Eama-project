<?php include 'header.php';
include_once '../helpers/session-helper.php';
include_once '../models/User.php';
?>


<h1 id="index-text">Welcome, <?php if (isset($_SESSION['UsersUid'])) {
                                    echo explode(" ", $_SESSION['UsersName'])[0];
                                } else {
                                    echo 'Guest';
                                }
                                ?> </h1>
<a href="../controllers/Users-controller.php?q=logout">
    <li>Logout</li>
</a>
<?php include 'footer.php'; ?>