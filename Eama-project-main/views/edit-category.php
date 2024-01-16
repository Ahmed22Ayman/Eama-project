<?php
include_once('../helpers/session-helper.php');
include_once('admin-header.php');
include_once('../controllers/category-controller.php');
include_once('../models/category-model.php');
$init = new categorys();
$id = isset($_GET['id']) ? $_GET['id'] : '';
$name = isset($_GET['name']) ? $_GET['name'] : '';
if (!empty($id)) {

    // $userData=$init->userModel->getUserById($userId);
    $categorydata = $init->getUserModel()->getcategoryDetailsById($id);
    // Check if user data is available
    if ($categorydata) {
        $name = $categorydata->name;
       
    } else {
        // Handle the case where user data is not found
        // You may redirect or display an error message here
    }
}
?>


<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Add user
                    <a href="users.php" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>

            <div class="card-body">
                <form action="../controllers/category-controller.php" method="post">
                    <input type="hidden" name="type" value="update">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>name</label>
                                <input type="text" name="name" value="<?php echo $name ?>" class="form-control">
                            </div>
                        </div>
                        <br>
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