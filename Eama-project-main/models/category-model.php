<?php
require_once '../libraries/Database.php';
class category
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function addcategory($data)
    {
        $this->db->query('INSERT INTO category (name)
        VALUES(:name)');
        $this->db->bind(':name', $data['name']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function editcategory($data)
    {
        $this->db->query('UPDATE category set name=:name WHERE id=:id');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':id', $data['id']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getcategoryDetailsById($category_id)
    {
        $this->db->query('SELECT * FROM category WHERE id=:id');
        $this->db->bind(':id', $category_id);
        $row = $this->db->single();
        return $row;
    }

    public function deletecategory($category_id)
    {
        $this->db->query('DELETE FROM category WHERE id = :id');
        $this->db->bind(':id', $category_id);

        return $this->db->execute();
    }
    
    public function deleteProductsByCategory($category_id)
    {
        $this->db->query('DELETE FROM products WHERE pcategory = :category_id');
        $this->db->bind(':category_id', $category_id);
    
        return $this->db->execute();
    }
    
    public function getAllcategories()
    {
        try {
            $this->db->query('SELECT * FROM category');
            return $this->db->resultSet(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }
}
