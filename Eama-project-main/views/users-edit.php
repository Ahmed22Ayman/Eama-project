<?php
 include_once('../controllers/admin-controller.php');
 include_once('../models/admin-model.php');
$init=new Users();
$userId = isset($_GET['id']) ? $_GET['id'] : '';
$userName = isset($_GET['name']) ? $_GET['name'] : '';
$userEmail = isset($_GET['email']) ? $_GET['email'] : '';
$userRole = isset($_GET['role']) ? $_GET['role'] : '';

// Retrieve user details from the database based on the user ID
if (!empty($userId)) {

// $userData=$init->userModel->getUserById($userId);
$userData=$init->getUserModel()->getUserById($userId);
    // Check if user data is available
    if ($userData) {
        $userName = $userData->UsersName;
        $userEmail = $userData->UsersEmail;
        $userRole = $userData->UsersRole;
    } else {
        // Handle the case where user data is not found
        // You may redirect or display an error message here
    }
}
?>


<?php include('admin-header.php'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Edit User
                    <a href="users.php" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="../controllers/admin-controller.php" method="post">
              
                <input type="hidden"  name="type" value="update">

                    <input type="hidden"  name="UsersUid" value="<?php echo $userId; ?>">
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text"  name="UsersName" value="<?php echo $userName; ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" value="<?php echo $userEmail; ?>"  name="UsersEmail" class="form-control">
                            </div>
                        </div>
                        
                      
                       
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Role</label>
                                <select name="UsersRole"  class="form-select">
                                    <option value="regular" <?php echo ($userRole === 'regular') ? 'selected' : ''; ?>>Regular Customer</option>
                                    <option value="reseller" <?php echo ($userRole === 'reseller') ? 'selected' : ''; ?>>Reseller</option>
                                    <option value="pharmacy" <?php echo ($userRole === 'pharmacy') ? 'selected' : ''; ?>>Pharmacy</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 text-end">
                                <br> <button type="submit" name="update" value="update" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php include('admin-footer.php'); ?>
