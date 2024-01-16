<?php
// session_start();

require_once '../models/admin-model.php';
require_once '../helpers/session-helper.php';
require_once '../libraries/Database.php';


class Users
{

    private $userModel;

    public function __construct()
    {
        $this->userModel = new User;
    }
    public function getUserModel()
    {
        return $this->userModel;
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
            'UsersPwd' => trim($_POST['UsersPwd']),
            'pwdRepeat' => trim($_POST['pwdRepeat']),
            'UsersRole' => trim($_POST['UsersRole'])
        ];



        if (
            empty($data['UsersName']) || empty($data['UsersEmail'])  ||
            empty($data['UsersPwd']) || empty($data['pwdRepeat'])
        ) {
            //   flash("register", "Please fill out all inputs");
            header("location:" . "../views/index.php");
        }

        // if (!preg_match("/^[a-zA-Z0-9]*$/", $data['UsersUid'])) {
        //     flash("register", "Invalid username");
        //     redirect("admin-db.php");
        // }

        if (!filter_var($data['UsersEmail'], FILTER_VALIDATE_EMAIL)) {
            //  flash("register", "Invalid email");
            header("location:" . "../views/index.php");
        }

        if (strlen($data['UsersPwd']) < 6) {
            //  flash("register", "Invalid password");
            header("location:" . "../views/index.php");
        } else if ($data['UsersPwd'] !== $data['pwdRepeat']) {
            //  flash("register", "Passwords don't match");
            header("location:" . "../views/index.php");
        }

        // User with the same email or password already exists
        if ($this->userModel->findUserByEmailOrUsername($data['UsersEmail'], $data['UsersName'])) {
            //  flash("register", "Username or email already taken");
            header("location:" . "../views/index.php");
        }

        //Passed all validation checks.
        //Now going to hash password
        $data['UsersPwd'] = password_hash($data['UsersPwd'], PASSWORD_DEFAULT);

        //Register User
        if ($this->userModel->register($data)) {
            //  header("location:" . "../views/users.php");
            redirec_t('../views/users.php', 'user added successfully');
        } else {
            redirec_t('../views/users.php', 'some thing went wrong ');
        }
    }


    public function createUserSession($user)
    {
        $_SESSION['UsersId'] = $user->usersId;
        $_SESSION['UsersName'] = $user->usersName;
        $_SESSION['UsersEmail'] = $user->usersEmail;
        header("location:" . "../views/index.php");
    }


    public function fetchUsers()
    {
        return $this->userModel->fetchUsers();
    }

    // ... (existing code)

    // ... (your existing code)

    public function update()
    {
        //Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //Init data
        $data = [
            'UsersUid' => trim($_POST['UsersUid']),
            'UsersName' => trim($_POST['UsersName']),
            'UsersEmail' => trim($_POST['UsersEmail']),
            'UsersRole' => trim($_POST['UsersRole']),
        ];

        // Validate and update the user
        if ($this->userModel->updateUser($data)) {
            // Successful update
            header("location: ../views/user-edit.php?id=" . $data['UsersUid']);
        } else {
            // Handle update failure
            // flash("update", "Failed to update user");
            header("location: ../views/user-edit.php?id=" . $data['UsersUid']);
        }
    }
    public function getUserDetailsById($userid)
    {
       $this->userModel->getUserDetailsById($userid);
    }
    public function delete()
    {
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Get the user ID from the form submission
        $userId = trim($_POST['userId']);
        //delete cart first 
        $this->userModel->deletUsercart($userId);
        // Perform deletion logic
        if ($this->userModel->deleteUser($userId)) {
            // Successful deletion
            redirec_t('../views/users.php', 'user deleted ');
        } else {
            // Handle deletion failure
            // flash("delete", "Failed to delete user");
            redirec_t('../views/users.php', 'user not  deleted ');
        }
    }

    public function logout()
    {
        unset($_SESSION['UsersId']);
        unset($_SESSION['UsersName']);
        unset($_SESSION['UsersEmail']);
        session_destroy();
        redirec_t("../views/index.php", '');
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
        case 'update':
            $init->update();
            break;
        case 'delete':
            $init->delete();
            break;
        case 'logout';
            $init->logout();
        default:
            header("location:" . "../views/admin-db.php");
    }
}
