<?php
// session_start();

require_once '../models/category-model.php';
require_once '../helpers/session-helper.php';
require_once '../libraries/Database.php';
require_once '../controllers/products-controller.php';
require_once '../models/products-model.php';

class categorys
{

    private $categorymodel;
    private $productModel;
    public function __construct()
    {
        $this->productModel = new product;
        $this->categorymodel = new category;
    }
    public function getUserModel()
    {
        return $this->categorymodel;
    }
    public function addcategory()
    {
        //Process form

        //Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //Init data
        $data = [
            'name' => trim($_POST['name']),

        ];
        if (empty($data['name'])) {
            //   flash("register", "Please fill out all inputs");
            header("location:" . "../views/index.php");
        }
        //Register User
        if ($this->categorymodel->addcategory($data)) {
            //  header("location:" . "../views/users.php");
            redirec_t('../views/category.php', 'category added successfully');
        } else {
            redirec_t('../views/category.php', 'some thing went wrong ');
        }
    }



    public function getAllcategories()
    {
        return $this->categorymodel->getAllcategories();
    }

    // ... (existing code)

    // ... (your existing code)

    public function update()
    {
        //Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //Init data
        $data = [
            'id' => trim($_POST['id']),
            'name' => trim($_POST['name'])

        ];

        // Validate and update the user
        if ($this->categorymodel->editcategory($data)) {
            // Successful update
            redirec_t("../views/category.php?id=" . $data['id'], 'updated done ');
        } else {

            redirec_t("../views/category.php?id=" . $data['id'], 'updated failed ');
        }
    }

    public function delete()
    {
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Get the user ID from the form submission
        $categoryid = trim($_POST['id']);

       $this->productModel->removecategoryProductFromCarts($categoryid);
        $this->productModel->deleteProductsByCategory($categoryid);
        // Perform deletion logic
        if ($this->categorymodel->deletecategory($categoryid)) {
            // Successful deletion
            redirec_t('../views/category.php', 'category deleted ');
        } else {
            // Handle deletion failure
            // flash("delete", "Failed to delete user");
            redirec_t('../views/category.php', 'category not  deleted ');
        }
    }
}

$init = new categorys;

//Ensure that user is sending a post request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch ($_POST['type']) {
        case 'addcategory':
            $init->addcategory();
            break;
        case 'update':
            $init->update();
            break;
        case 'delete':
            $init->delete();
            break;
        default:
            header("location:" . "../views/admin-db.php");
    }
}
