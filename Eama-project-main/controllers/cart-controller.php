<?php
require_once '../models/cart-model.php';
require_once '../helpers/session-helper.php';
class CartController
{
    private $cart;
    protected $db;

    public function __construct()
    {
        $this->cart = new Cart();
        $this->db = new Database();
    }


    public function getCartModel()
    {
        return $this->cart;
    }

    public function displayCart($userId)
    {
        return $this->cart->getCartProductsByUserId($userId);
    }


    public function getcartid($data)
    {

        $this->cart->getCartId($data);
    }



    public function addcart()
    {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data = [
            'UsersUid' => trim($_POST['UsersUid']),
            'id' => trim($_POST['id'])
        ];
        $userId = $data['UsersUid'];
        $productId = trim($_POST['id']);


        // Check if the user has a cart
        if ($cartData = $this->cart->checkcart($userId)) {
            if ($this->cart->productExistInCart($productId)) {
                redirec_t('../views/products.php', 'The selected product already exist.');
            } else {
                if ($this->cart->addProductToCart($cartData->cart_id, $productId, 1)) {
                    redirec_t('../views/products.php', 'Added to cart.');
                } else {
                    redirec_t('../views/products.php', 'Something went wrong while adding the product to cart.');
                }
            }
        } else {
            // User does not have a cart, create a new cart and add the product
            $cartId = $this->cart->addcart($data);
            sleep(1); // Check if the cart creation was successful
            if ($cartId) {



                if ($this->cart->addProductToCart($cartId, $productId, 1)) {
                    redirec_t('../views/products.php', 'Added to cart.');
                } else {
                    redirec_t('../views/products.php', 'Something went wrong while adding the product to cart.');
                }
            } else {
                redirec_t('../views/products.php', 'Something went wrong while creating a new cart.');
            }
        }
    }


    public function DeleteCartProduct()
    {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data = [
            'cart_id' => trim($_POST['cart_id']), // assuming you have the cart_id
            'id' => trim($_POST['id']), // assuming you have the product_id
        ];

        if ($this->cart->DeleteCartProduct($data['cart_id'], $data['id'])) {
            redirec_t('../views/cart.php', 'Product removed from cart.');
        } else {
            redirec_t('../views/cart.php', 'Failed to remove product from cart.');
        }
    }

    // public function addcart()
    // {
    //     $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    //     // Init data
    //     $data = [
    //         'UsersUid' => trim($_POST['UsersUid']),
    //         'id' => trim($_POST['id'])
    //     ];
    //     $userId = $data['UsersUid'];

    //     if ($this->cart->checkcart($userId)) {
    //         redirec_t('../views/products.php', 'You already have a cart.');
    //     } else {
    //         // return $this->AddProductToCart($data);
    //         if ($this->cart->addcart($data)) {
    //             redirec_t('../views/products.php', 'Added to cart.');
    //         } else {
    //             redirec_t('../views/products.php', 'Something went wrong.');
    //         }
    //     }
    // }
    // cart-controller.php

    public function updateProductQuantity()
{
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    // Init data
    $data = [
        'cart_id' => trim($_POST['cart_id']),
        'id' => trim($_POST['id']),
        'cquantity' => trim($_POST['cquantity']),
        // Add other form fields if needed
    ];

    // Update the quantity first
    $this->cart->updateProductQuantity($data);

    // Check if the new quantity is greater than or equal to the old quantity
    $newquantity = $_POST['cquantity'];
    $oldquanitity = $this->cart->checkquantity($data['id']);

    if ($newquantity >= $oldquanitity) {
        redirec_t('../views/cart.php', 'Quantity updated ');
        // Optionally, you can redirect or send a response as needed.
    } else {
        redirec_t('../views/cart.php', 'Insufficient quantity ');
        flash('Insufficient quantity');
    }
}

    public function getTotalCartPrice($userId)
    {
        // Check if the user has a cart
        if ($cartData = $this->cart->checkcart($userId)) {
            $cartId = $cartData->cart_id;
            $totalPrice = $this->cart->getTotalCartPrice($cartId);
            echo "Total Cart Price: $totalPrice"; // Add this line
            return $totalPrice;
        } else {
            echo "User does not have a cart.";
            return 0;
        }
    }
}
$init = new CartController;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch ($_POST['type']) {
        case 'addtocart':
            $init->addcart();
            break;
        case 'DeleteCartProduct';
            $init->DeleteCartProduct();
            break;
        case 'updateProductQuantity':
            $init->updateProductQuantity();
            break;
    }
}
