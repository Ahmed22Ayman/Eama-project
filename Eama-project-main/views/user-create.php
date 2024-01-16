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
                <form action="../controllers/admin-controller.php" method="post">
                    <input type="hidden" name="type" value="register">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>name</label>
                                <input type="text" name="UsersName" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>email</label>
                                <input type="email" name="UsersEmail" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>password</label>
                                <input type="password" name="UsersPwd" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>confirm password</label>
                                <input type="password" name="pwdRepeat" class="form-control">
                            </div>
                        </div>
                        <!-- <div class="col-md-6">
                            <div class="mb-3">
                                <label>address</label>
                                <input type="text" name="address" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>phone number</label>
                                <input type="text" name="mobile" class="form-control">
                            </div>
                        </div> -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>select role </label>
                                <select name="UsersRole" class="form-select" id="">
                                    <option value="">Select Role</option>
                                    <option value="regular">Regular Customer</option>
                                    <option value="reseller">Reseller</option>
                                    <option value="pharmcy">Phrmacy</option>
                                </select>
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