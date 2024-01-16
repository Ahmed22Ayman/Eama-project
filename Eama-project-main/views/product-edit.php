<?php
include_once '../helpers/session-helper.php';
include('admin-header.php');
include_once('../models/products-model.php');
include_once('../controllers/products-controller.php');
include_once('../controllers/category-controller.php');

include_once('../models/category-model.php');

$category_controller = new categorys;
$category_model = new category;
$cates = $category_controller->getAllcategories();
$init = new products();
$productId = isset($_GET['id']) ? $_GET['id'] : '';
$pname = isset($_GET['Pname']) ? $_GET['Pname'] : '';
$pquantity = isset($_GET['pquantity']) ? $_GET['pquantity'] : '';
$pdescription = isset($_GET['pdescription']) ? $_GET['pdescription'] : '';
$pbrand = isset($_GET['pbrand']) ? $_GET['pbrand'] : '';
$pcategory = isset($_GET['pcategory']) ? $_GET['pcategory'] : '';
$pprice = isset($_GET['pprice']) ? $_GET['pprice'] : '';
$psize = isset($_GET['psize']) ? $_GET['psize'] : '';
$pimage = isset($_GET['pimage']);


if (!empty($productId)) {
    $productDetails = $init->getproductmodel()->getProductDetailsById($productId); // You need to implement this function
    if ($productDetails) {

        $pname = $productDetails->Pname;
        $pquantity = $productDetails->pquantity;
        $pdescriptio = $productDetails->pdescription;
        $pbrand = $productDetails->pbrand;
        $pcategory = $productDetails->pcategory;
        $pprice = $productDetails->pprice;
        $psize = $productDetails->psize;
        $pimage = $productDetails->pimage;
    }
}
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Edit Product
                    <a href="products.php" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">

                <form action="../controllers/products-controller.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="type" value="editproduct">
                    <!-- Assuming you have the product data, you can pre-fill the form fields -->
                    <input type="hidden" name="id" value="<?php echo $productId ?>">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="pname" class="form-control" value="<?php echo $pname ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Price</label>
                                <input type="text" name="pprice" class="form-control" value="<?php echo $pprice ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>select category </label>
                                <select name="pcategory" class="form-select" id="pcategory">
                                   
                                <?php foreach ($cates as $cats) { ?>
                                        <option value="<?php echo $cats->id ?>"><?php echo $cats->name ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>quantity</label>
                                <input type="text" name="pquantity" class="form-control" value="<?php echo $pquantity ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>size</label>
                                <input type="text" name="psize" class="form-control" value="<?php echo $psize ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>brand</label>
                                <input type="text" name="pbrand" class="form-control" value="<?php echo $pbrand ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>description</label>
                                <input type="text" name="pdescription" class="form-control" value="<?php echo $pdescription ?>">
                            </div>
                        </div>


                        <!-- <div class="col-md-6">
                            <div class="mb-3">
                                <label for="pimage">Image</label>
                                <img width=50px height=50px src=?php echo $pimage?> alt="Product Image">
                            </div>
                        </div> -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="pimage">image</label>
                                <input type="file" name="pimage" accept=".jpg, .jpeg ,.png" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3 text-end">
                                <br> <button type="submit" name="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('admin-footer.php'); ?>