<?php
include '../views/header.php';
include_once('../controllers/products-controller.php');
include_once('../models/products-model.php');
include_once('../helpers/session-helper.php');
$productController = new products;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - Beauty Products</title>
    <link rel="stylesheet" href="../public/css/products.css">
    <script src="../public/js/products.js"></script>
</head>


<body>
    <div id="menubody" onclick="favorites(event.target)">
        <?php $products = $productController->getAllProducts(); ?>
        <?php if (!empty($products)) : ?>
            <?php foreach ($products as $product) : ?>

                <div class="menu_items">
                    <img src="<?php echo $product->pimage ?>" width="100%" height="100%">
                </div>
                <label for=""><?php echo $product->Pname ?></label><br>
                
              <br>  
                <form action="../controllers/cart-controller.php" method="post">
                    <input type="hidden" name="type" value="addtocart">
                    <input type="hidden" name="UsersUid" value="<?php echo $_SESSION['UsersUid'];?>">
                    <input type="hidden" name="id" value="<?php echo $product->id;?>">

                    <button type="submit" name="submit">add to cart</button>
                </form>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No products available.</p>
        <?php endif; ?>
        <br>
        <?php alertmessage();?>
        <script src="../public/js/products.js"></script>





</body>


</html>
<?php // include '../views/footer.php'; ?>
