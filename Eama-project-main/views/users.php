<?php
// Include necessary files
include_once('admin-header.php');
include_once('../controllers/admin-Controller.php');
include_once('../models/admin-model.php');
include_once('../helpers/session-helper.php');
$usersController = new Users;
$usermodel = new User;
?>

<!-- Rest of your HTML code -->

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>User List <a href="user-create.php" class="btn btn-primary float-end">Add User</a></h4>
            </div>
<?php 
alertmessage()
?>            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>email</th>
                            <th>role</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <!-- ... your table headers ... -->
                    <tbody>
                        <?php
                        // Call the fetchUsers method from the controller
                        $users = $usersController->fetchUsers();
                        $i = 1;
                        foreach ($users as $user) {
                            echo '<tr>';
                            echo '<td>' .$i . '</td>';
                            echo '<td>' . (isset($user->UsersName) ? $user->UsersName : '') . '</td>';
                            echo '<td>' . (isset($user->UsersEmail) ? $user->UsersEmail : '') . '</td>';
                            echo '<td>' . (isset($user->UsersRole) ? $user->UsersRole : '') . '</td>';
                            echo '<td>
                            <a class="btn btn-success btn-sm" href="user-edit.php?id=' . (isset($user->UsersUid) ? $user->UsersUid : '') . '">Edit</a>
                            <form action="../controllers/admin-controller.php" method="post" style="display:inline;">
                                <input type="hidden" name="userId" value="' . (isset($user->UsersUid) ? $user->UsersUid : '') . '">
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