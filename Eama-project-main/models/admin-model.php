<?php
require_once '../libraries/Database.php';

class User
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getUserDetailsById($userid)
    {
        $this->db->query('SELECT * FROM users WHERE UsersUid=:id');
        $this->db->bind(':id', $userid);
        $row = $this->db->single();
        return $row;
    }
    //Find user by email or username
    public function findUserByEmailOrUsername($email, $username)
    {
        $this->db->query('SELECT * FROM users WHERE UsersUid = :username OR UsersEmail = :email');
        $this->db->bind(':username', $username);
        $this->db->bind(':email', $email);
        $_SESSION['UsersName'] = $username;
        $row = $this->db->single();

        //Check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }
    public function deleteUser($userId)
{
    $this->db->query('DELETE FROM users WHERE UsersUid = :id');
    $this->db->bind(':id', $userId);

    // Execute
    return $this->db->execute();
}

    public function deletUsercart($UsersUid){
        $this->db->query('DELETE FROM cart WHERE UsersUid = :UsersUid');
        $this->db->bind(':UsersUid', $UsersUid);
        $this->db->execute();
    }
    //Register User
    public function register($data)
    {
        $this->db->query('INSERT INTO users (UsersName, UsersEmail, UsersPwd,UsersRole) 
        VALUES (:name, :email, :password,:role)');
        //Bind values
        $this->db->bind(':name', $data['UsersName']);
        $this->db->bind(':email', $data['UsersEmail']);
        // $this->db->bind(':Uid', $data['UsersUid']);
        $this->db->bind(':password', $data['UsersPwd']);
        $this->db->bind(':role', $data['UsersRole']);


        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            echo "Error:";
            return false;
        }
    }

    //fecth all users 
    public function fetchUsers()
    {
        $this->db->query('SELECT * FROM users');
        $results = $this->db->resultSet();
        return $results;
    }
    // ... (existing code)

   // ... (your existing code)

public function updateUser($data)
{
    $this->db->query('UPDATE users SET UsersName = :name, UsersEmail = :email, UsersRole = :role WHERE UsersUid = :id');
    $this->db->bind(':id', $data['UsersUid']);
    $this->db->bind(':name', $data['UsersName']);
    $this->db->bind(':email', $data['UsersEmail']);
    $this->db->bind(':role', $data['UsersRole']);

    // Execute
    if ($this->db->execute()) {
        return true;
    } else {
        return false;
    }
}
// User model code
public function getUserById($userId)
{
    $this->db->query('SELECT * FROM users WHERE UsersUid = :id');
    $this->db->bind(':id', $userId);
    $row = $this->db->single();

    return $row;
}

// ... (your existing code)

    //Login user
    public function login($nameOrEmail, $password)
    {
        $row = $this->findUserByEmailOrUsername($nameOrEmail, $nameOrEmail);

        if ($row == false) return false;

        $hashedPassword = $row->UsersPwd;
        if (password_verify($password, $hashedPassword)) {
            return $row;
        } else {
            return false;
        }
    }
}
