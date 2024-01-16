<?php
include_once '../helpers/session-helper.php';
include('admin-header.php');
include_once('../controllers/category-controller.php');

include_once('../models/category-model.php');

$category_controller = new categorys;
$category_model = new category;
$cates = $category_controller->getAllcategories();
?>


<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Add product
                    <a href="products.php" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <?php flash('addproducts') ?>
                <form action="../controllers/products-controller.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="type" value="addproducts">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>name</label>
                                <input type="text" name="pname" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>price</label>
                                <input type="text" name="pprice" class="form-control">
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
                                <input type="text" name="pquantity" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>companies discount</label>
                                <input type="text" name="comp_discount" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>regular users discount</label>
                                <input type="text" name="regular_discount" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>minimum purchase</label>
                                <input type="text" name="Minimum_Purchase" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>size</label>
                                <input type="text" name="psize" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>brand</label>
                                <input type="text" name="pbrand" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>description</label>
                                <input type="textbox" name="pdescription" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="pimage">image</label>
                                <input type="file" name="pimage" accept=".jpg, .jpeg ,.png" class="form-control">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="mb-3 text-end">
                                <br> <button type="submit" name="submit" class="btn btn-primary">save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>


<?php include('admin-footer.php'); ?>