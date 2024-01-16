<?php
include_once('../helpers/session-helper.php');
include_once('admin-header.php');
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
                    <input type="hidden" name="type" value="addcategory">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>name</label>
                                <input type="text" name="name" class="form-control">
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