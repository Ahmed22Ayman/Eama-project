<html>
<link rel="stylesheet" href="../public/css/style.css">

</html>

<?php
if (!isset($_SESSION)) {
    session_start();
}


function flash($name = '', $message = '', $class = 'form-message form-message-red')
{
    if (!empty($name)) {
        if (!empty($message) && empty($_SESSION[$name])) {
            $_SESSION[$name] = $message;
            $_SESSION[$name . '_class'] = $class;
        } else if (empty($message) && !empty($_SESSION[$name])) {
            $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : $class;
            echo '<div class="' . $class . '" >' . $_SESSION[$name] . '</div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name . '_class']);
        }
    }
}
function redirect($location)
{
    header("location: " . $location);
    exit();
}
function alertmessage()
{
    if (isset($_SESSION['status'])) {
        echo '<div class="alert alert-sccuess">
        <h4>' . $_SESSION['status'] . '
        </h4></div>';
        unset($_SESSION['status']);
    }
}
function redirec_t($url, $status)
{
    $_SESSION['status'] = $status;
    header('location:' . $url);
    exit(0);
}