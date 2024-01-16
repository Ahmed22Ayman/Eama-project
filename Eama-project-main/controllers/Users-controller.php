<?php
require_once '../helpers/session-helper.php';
require_once '../models/User.php';
require_once '../libraries/Database.php';


class Users
{

    private $userModel;

    public function __construct()
    {
        $this->userModel = new User;
    }

    public function register()
    {
        //Process form

        //Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //Init data
        $data = [
            'UsersName' => trim($_POST['UsersName']),
            'UsersEmail' => trim($_POST['UsersEmail']),
            'Usersn' => trim($_POST['Usersn']),
            'UsersPwd' => trim($_POST['UsersPwd']),
            'pwdRepeat' => trim($_POST['pwdRepeat']),
            'UsersRole' => trim($_POST['UsersRole'])
        ];




        //Validate inputs
        if (
            empty($data['UsersName']) || empty($data['UsersEmail']) || empty($data['Usersn']) ||
            empty($data['UsersPwd']) || empty($data['pwdRepeat'])
        ) {
            flash("register", "Please fill out all inputs");
            redirect("../views/Rgeister.php");
        }

        if (!preg_match("/^[a-zA-Z0-9]*$/", $data['Usersn'])) {
            flash("register", "Invalid username");
            redirect("../views/Register.php");
        }

        if (!filter_var($data['UsersEmail'], FILTER_VALIDATE_EMAIL)) {
            flash("register", "Invalid email");
            redirect("../views/Register.php");
        }

        if (strlen($data['UsersPwd']) < 6) {
            flash("register", "Invalid password");
            redirect("../views/Register.php");
        } else if ($data['UsersPwd'] !== $data['pwdRepeat']) {
            flash("register", "Passwords don't match");
            redirect("../views/Register.php");
        }

        // User with the same email or password already exists
        if ($this->userModel->findUserByEmailOrUsername($data['UsersEmail'], $data['Usersn'])) {
            flash("register", "Username or email already taken");
            redirect("../views/Register.php");
        }

        //Passed all validation checks.
        //Now going to hash password
        $data['UsersPwd'] = password_hash($data['UsersPwd'], PASSWORD_DEFAULT);

        //Register User
        if ($this->userModel->register($data)) {
            redirect("../views/user login.php");
            echo "done";
        } else {
            die("Something went wrong");
        }
    }
    public function getUserDetailsById($userid)
    {
       $this->userModel->getUserDetailsById($userid);
    }
    public function login()
    {
        //Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //Init data
        $data = [
            'Usersn/UsersEmail' => trim($_POST['Usersn/UsersEmail']),
            'UsersPwd' => trim($_POST['UsersPwd'])
        ];

        if (empty($data['Usersn/UsersEmail']) || empty($data['UsersPwd'])) {
            flash("login", "Please fill out all inputs");
            header("location: ../views/user login.php");
            exit();
        }

        //Check for user/email
        if ($this->userModel->findUserByEmailOrUsername($data['Usersn/UsersEmail'], $data['Usersn/UsersEmail'])) {
            //User Found
            $loggedInUser = $this->userModel->login($data['Usersn/UsersEmail'], $data['UsersPwd']);
            if ($loggedInUser) {
                //Create session
                session_start();

                $this->createUserSession($loggedInUser);
            } else {
                flash("login", "Password Incorrect");
                redirect("../views/user login.php");
            }
        } else {
            flash("login", "No user found");
            redirect("../views/user login.php");
        }
    }




    public function createUserSession($User)
    {
        $_SESSION['UsersUid'] = $User->UsersUid;
        $_SESSION['UsersName'] = $User->UsersName;
        $_SESSION['UsersEmail'] = $User->UsersEmail;
        $_SESSION['UsersRole'] = $User->UsersRole;
        if ($User->UsersRole === 'A') {
            redirect("../views/admin-db.php");
        } else {
            redirect('../views/Userprofile.php');
        }
    }

    public function logout()
    {
        unset($_SESSION['UsersUid']);
        unset($_SESSION['UsersName']);
        unset($_SESSION['UsersEmail']);
        session_destroy();
        redirect("../views/index.php");
    }
}

$init = new Users;

//Ensure that user is sending a post request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch ($_POST['type']) {
        case 'register':
            $init->register();
            break;
        case 'login':
            $init->login();
            break;
        default:
            redirect("../views/index.php");
    }
} else {
    switch ($_GET['q']) {
        case 'logout':
            $init->logout();
            break;
        default:
            redirect("../views/index.php");
    }
}
