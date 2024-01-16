<?php
// Include necessary files
include_once('admin-header.php');
include_once('../controllers/category-Controller.php');
include_once('../models/category-model.php');
include_once('../helpers/session-helper.php');
$categortyController = new categorys;
$categoryModel = new category;
?>

<!-- Rest of your HTML code -->

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>category List <a href="creat-category.php" class="btn btn-primary float-end">Add category</a></h4>
            </div>
<?php 
alertmessage()
?>            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>num</th>
                            <th>name</th>
                            <th>action</th>
                         
                        </tr>
                    </thead>
                    <!-- ... your table headers ... -->
                    <tbody>
                        <?php
                        // Call the fetchUsers method from the controller
                        $categortyController = $categortyController->getAllcategories();
                        $i = 1;
                        foreach ($categortyController as $category) {
                            echo '<tr>';
                            echo '<td>' .$i . '</td>';
                            echo '<td>' . (isset($category->name) ? $category->name : '') . '</td>';
                            echo '<td>
                            <a class="btn btn-success btn-sm" href="edit-category.php?id=' . (isset($category->id) ? $category->id : '') . '">Edit</a>
                            <form action="../controllers/category-controller.php" method="post" style="display:inline;">
                                <input type="hidden" name="id" value="' .  (isset($category->id) ? $category->id : '')  . '">
                                <input type="hidden" name="type" value="delete">
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