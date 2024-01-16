<?php
require_once '../models/products-model.php';
require_once '../models/category-model.php';
require_once '../helpers/session-helper.php';
class products
{
    private $productModel;
    private $catmodel;
    public function __construct()
    {
        $this->productModel = new product();
        $this->catmodel = new category();
    }

    private function saveImage($file)
    {
        // Check if the file is set and not empty
        if (!isset($file) || empty($file)) {
            // File wasn't inputted in the form

            return false;
        }

        $uploadDir = '../public/img/';
        $imageFileType = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        // Generate a unique name for the image
        $imageName = uniqid('image_') . '.' . $imageFileType;
        $targetPath = $uploadDir . $imageName;

        // Create the category subfolder if it doesn't exist
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755);
        }

        // Move the uploaded file to the destination subfolder
        if (move_uploaded_file($file['tmp_name'], $targetPath))
            return $targetPath;
        else
            return false;
    }

    public function addproducts()
    {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $selectedCategory = $_POST['pcategory'];
        $category = $this->catmodel->getcategoryDetailsById($selectedCategory);
        $data = [
            'pname' => trim($_POST['pname']),
            'pquantity' => trim($_POST['pquantity']),
            'pdescription' => trim($_POST['pdescription']),
            'pbrand' => trim($_POST['pbrand']),
            'pcategory' => trim($_POST['pcategory']), // Replace 'category_property' with the actual property name
            'pprice' => trim($_POST['pprice']),
            'psize' => trim($_POST['psize']),
            'comp_discount' => trim($_POST['comp_discount']),
            'regular_discount' => trim($_POST['regular_discount']),
            'Minimum_Purchase' => trim($_POST['Minimum_Purchase'])
        ];
        if (
            empty($data['pname']) || empty($data['pquantity']) || empty($data['pdescription']) || empty($data['pbrand']) ||
            empty($data['pcategory']) || empty($data['pprice']) || empty($data['psize'])
        ) {
            flash("addproducts", "please fill out all inputs");
            redirect("../views/product-create.php");
        }

        $imagePath = $this->saveImage($_FILES['pimage']);
        if ($this->productModel->addproducts($data, $imagePath)) {
            redirect("../views/product-create.php");
        } else {
            die("something went wrong");
        }
    }
    public function getproductmodel()
    {
        return $this->productModel;
    }
    public function getProductDetailsById($id)
    {
        return $this->productModel->getProductDetailsById($id);
    }
   // products-controller.php

public function editproduct()
{
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $data = [
        'id' => trim($_POST['id']),
        'pname' => trim($_POST['pname']),
        'pquantity' => trim($_POST['pquantity']),
        'pdescription' => trim($_POST['pdescription']),
        'pbrand' => trim($_POST['pbrand']),
        'pcategory' => trim($_POST['pcategory']),
        'pprice' => trim($_POST['pprice']),
        'psize' => trim($_POST['psize']),
    ];

    // Validate and update the product data
    $imagePath = $this->saveImage($_FILES['pimage']);

    // Validate pcategory value
    $categoryModel = new category(); // Assuming Category is your category model
    $allCategories = $categoryModel->getAllcategories();

    if (!in_array($data['pcategory'], array_column($allCategories, 'id'))) {
        flash("editproduct", "Invalid category selected");
        redirect("../views/product-edit.php?id=" . $data['id']);
    }

    if ($this->productModel->editProduct($data, $imagePath)) {
        redirec_t("../views/admin-products.php?id=" . $data['product_id'],"Product updated");
    } else {
        flash("editproduct", "Failed to update product");
        redirect("../views/product-edit.php?id=" . $data['product_id']);
    }
}
// public function editproducts()
// {
//     $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
//     $selectedCategory = $_POST['pcategory'];
//     $category = $this->catmodel->getcategoryDetailsById($selectedCategory);
//     $data = [
//         'pname' => trim($_POST['pname']),
//         'pquantity' => trim($_POST['pquantity']),
//         'pdescription' => trim($_POST['pdescription']),
//         'pbrand' => trim($_POST['pbrand']),
//         'pcategory' => trim($_POST['pcategory']), // Replace 'category_property' with the actual property name
//         'pprice' => trim($_POST['pprice']),
//         'psize' => trim($_POST['psize']),
//     ];
   

//     $imagePath = $this->saveImage($_FILES['pimage']);
//     if ($this->productModel->editProduct($data, $imagePath)) {
//         redirect("../views/product-create.php");
//     } else {
//         die("something went wrong");
//     }
// }

    public function deleteProduct()
    {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $product_id = trim($_POST['id']);
        //delet product form cart first 
        $this->productModel->removeProductFromCarts($product_id);

        // Delete the product
        if ($this->productModel->deleteProduct($product_id)) {
            redirec_t("../views/admin-products.php", "Product deleted successfully");
        } else {
            redirec_t("../views/admin-products.php", "Failed to delete product");
        }
    }

    public function getAllProducts()
    {
        return $this->productModel->getAllProducts();
    }
}

$init = new products;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch ($_POST['type']) {
        case 'addproducts':
            $init->addProducts();
            break;
        case 'editproduct':
            $init->editproduct();
            break;
        case 'deleteproduct':
            $init->deleteProduct();
            break;
    }
}
