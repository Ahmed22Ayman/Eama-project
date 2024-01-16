<?php
require_once '../libraries/Database.php';
class product
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function addproducts($data, $imagePath)
    {
        $this->db->query('INSERT INTO products (pname, pquantity, pdescription, pbrand, pcategory, pprice, psize, pimage, comp_discount, regular_discount, Minimum_Purchase) 
                          VALUES (:pname, :pquantity, :pdescription, :pbrand, :pcategory, :pprice, :psize, :pimage, :comp_discount, :regular_discount, :Minimum_Purchase)');
        $this->db->bind(':pname', $data['pname']);
        $this->db->bind(':pquantity', $data['pquantity']);
        $this->db->bind(':pdescription', $data['pdescription']);
        $this->db->bind(':pbrand', $data['pbrand']);
        $this->db->bind(':pcategory', $data['pcategory']);
        $this->db->bind(':pprice', $data['pprice']);
        $this->db->bind(':psize', $data['psize']);
        $this->db->bind(':pimage', $imagePath);
        $this->db->bind(':comp_discount', $data['comp_discount']);
        $this->db->bind(':regular_discount', $data['regular_discount']);
        $this->db->bind(':Minimum_Purchase', $data['Minimum_Purchase']);
    
        return $this->db->execute();
    }
    
    //,imagePath$

    public function editProduct($data, $imagePath)
    {
        $this->db->query('UPDATE products SET pname = :name, pquantity = :quantity, pdescription = :description, pbrand = :brand, pcategory = :category, pprice = :price, psize = :size, pimage= :pimage WHERE id = :product_id');
        $this->db->bind(':product_id', $data['product_id']);
        $this->db->bind(':name', $data['pname']);
        $this->db->bind(':quantity', $data['pquantity']);
        $this->db->bind(':description', $data['pdescription']);
        $this->db->bind(':brand', $data['pbrand']);
        $this->db->bind(':category', $data['pcategory']);
        $this->db->bind(':price', $data['pprice']);
        $this->db->bind(':size', $data['psize']);
        $this->db->bind(':pimage', $imagePath);

        return $this->db->execute();
    }
    public function getProductDetailsById($product_id)
    {
        $this->db->query('SELECT * FROM products WHERE id=:id');
        $this->db->bind(':id', $product_id);
        $row = $this->db->single();
        return $row;
    }
    public function removeProductFromCarts($product_id)
    {
        // Delete the product from all carts
        $this->db->query('DELETE FROM cart_product WHERE id = :product_id');
        $this->db->bind(':product_id', $product_id);
        $this->db->execute();
    }
    public function removecategoryProductFromCarts($category_id)
    {
        // Delete the product from all carts
        $this->db->query('DELETE cp
        FROM cart_product cp
        JOIN products p ON cp.id = p.id
        WHERE p.pcategory = :category_id;
        ');
        $this->db->bind(':category_id', $category_id);
        $this->db->execute();
    }
    public function deleteProduct($product_id)
    {
        $this->db->query('DELETE FROM products WHERE id = :id');
        $this->db->bind(':id', $product_id);

        return $this->db->execute();
    }
    public function getAllProducts()
    {
        $this->db->query('SELECT products.*, category.name AS categoryName 
                      FROM products
                      LEFT JOIN category ON products.pcategory = category.id');
        $this->db->execute();

        if ($this->db->rowCount() > 0) {
            return $this->db->resultSet();
        } else {
            // Print SQL errors
            return false;
        }
    }
    

    public function deleteProductsByCategory($category_id)
    {
        $this->db->query('DELETE FROM products WHERE pcategory = :category_id');
        $this->db->bind(':category_id', $category_id);
    
        return $this->db->execute();
    }
    
   
}
