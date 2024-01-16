<?php
require_once '../libraries/Database.php';

class User
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
public function getUserRole($userid){
    $this->db->query('SELECT UsersRole FROM users Where UsersUid=:userid');
    $this->db->bind('userid',$userid);
    $role=$this->db->single();
    return $role;

}

    //Find user by email or username
    public function findUserByEmailOrUsername($email, $username)
    {
        $this->db->query('SELECT * FROM users WHERE UsersName = :username OR UsersEmail = :email');
        $this->db->bind(':username', $username);
        $this->db->bind(':email', $email);
        $row = $this->db->single();
    
        // Check row
        if ($this->db->rowCount() > 0) {
            // Set both username and role in the session
            $_SESSION['UsersName'] = $row->UsersUid;
            $_SESSION['UsersRole'] = $row->UsersRole;
    
            return $row;
        } else {
            return false;
        }
    }
    public function getUserDetailsById($userid)
    {
        $this->db->query('SELECT * FROM products WHERE UsersUid=:id');
        $this->db->bind(':id', $userid);
        $row = $this->db->single();
        return $row;
    }

    //Register User
    public function register($data)
    {
        $this->db->query('INSERT INTO users (UsersName, UsersEmail, Usersn, UsersPwd, UsersRole) 
        VALUES (:name, :email, :Usersn, :password, :role)');
        //Bind values
        $this->db->bind(':name', $data['UsersName']);
        $this->db->bind(':email', $data['UsersEmail']);
        $this->db->bind(':Usersn', $data['Usersn']);
        $this->db->bind(':password', $data['UsersPwd']);
        $this->db->bind(':role', $data['UsersRole']);
    
        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
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
