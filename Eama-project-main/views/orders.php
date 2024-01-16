<?php include('admin-header.php'); ?>


<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    user list
                    <a href="user-create.php" class="btn btn-primary float-end">Add user</a>
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-borderedo table-striped">
                    <thead>
                        <tr>
                            <th>order id</th>
                            <th>user</th>
                            <th>address</th>
                            <th>email</th>
                            <th>total price</th>
                            <th>order date</th>
                            <th>payment method</th>
                            <th>status</th>
                            <th>action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>order id</th>
                            <th>user</th>
                            <th>address</th>
                            <th>email</th>
                            <th>total price</th>
                            <th>order date</th>
                            <th>payment method</th>
                            <th>status</th>
                            <td>
                                <a class="btn btn-danger btn-sm" href="user-delete.php">delete</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


<?php include('admin-footer.php'); ?>