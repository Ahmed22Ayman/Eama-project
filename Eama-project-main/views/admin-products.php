<?php
// Include necessary files
include_once('admin-header.php');
include_once('../controllers/products-Controller.php');
include_once('../models/products-model.php');
include_once('../helpers/session-helper.php');
$product_controller = new products;
$product_model = new product;

?>

<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    products list
                    <a href="product-create.php" class="btn btn-primary float-end">Add product</a>
                </h4>
            </div>
            <div class="card-body">
               

                <table class="table table-borderedo table-striped">
                    <thead>
                        <tr>
                            <!-- <th>image</th> -->
                            <th>num</th>
                            <th>name</th>
                            <th>quantity</th>
                            <th>description</th>
                            <th>brand</th>
                            <th>category</th>
                            <th>price</th>
                            <th>size</th>
                            <th>copmanies discount</th>
                            <th>regular discount</th>
                            <th>minimum purchase</th>
                            <th>image</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody> 
                         <?php
                        // Call the fetchUsers method from the controller
                        $products = $product_controller->getAllProducts();
                        $i = 1;
                        foreach ($products as $product) {
                            echo '<tr>';
                            echo '<td>' .$i . '</td>';
                            echo '<td>' . (isset($product->Pname) ? $product->Pname : '') . '</td>';
                            echo '<td>' . (isset($product->pquantity) ? $product->pquantity : '') . '</td>';
                            echo '<td>' . (isset($product->pdescription) ? $product->pdescription : '') . '</td>';
                            echo '<td>' . (isset($product->pbrand) ? $product->pbrand : '') . '</td>';
                            echo '<td>' . (isset($product->categoryName) ? $product->categoryName :'') . '</td>';
                            echo '<td>' . (isset($product->pprice) ? $product->pprice : '') . '</td>';
                            echo '<td>' . (isset($product->psize) ? $product->psize : '') . '</td>';
                            echo '<td>' . (isset($product->Minimum_Purchase) ? $product->Minimum_Purchase : '') . '</td>';
                            echo '<td>' . (isset($product->regular_discount) ? $product->regular_discount : '') . '</td>';
                            echo '<td>' . (isset($product->comp_discount) ? $product->comp_discount : '') . '</td>';

                            echo '<td><img width=50px height=50px src="' . $product->pimage . '" alt="Product Image"></td>';

                            echo '<td>
                            <a class="btn btn-success btn-sm" href="product-edit.php?id=' . (isset($product->id) ? $product->id : '') . '">Edit</a>
                            <form action="../controllers/products-controller.php" method="post" style="display:inline;">
                                <input type="hidden" name="id" value="' . (isset($product->id) ? $product->id : '') . '">
                                <input type="hidden" name="type" value="deleteproduct">
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure you want to delete this user?\')">Delete</button>
                            </form>
                          </td>';
                            echo '</tr>';
                       $i++;
                     }


                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


<?php include('admin-footer.php'); ?>