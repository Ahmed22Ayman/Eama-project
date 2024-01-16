<head>
  <link rel="stylesheet" href="../public/css/cart.css">
</head>
<?php
include '../views/header.php';
include_once('../controllers/admin-controller.php');
include_once('../controllers/cart-controller.php');
include_once('../models/cart-model.php');
include_once('../helpers/session-helper.php');
$cartController = new CartController;
$cartmodel = new Cart();
$usercontroller=new Users;
$userId = $_SESSION['UsersUid'];
$user=$usercontroller->getUserDetailsById($userId);
$useraddress=$user->UserAddress;
$carts = $cartController->displayCart($userId);
$cid = $cartController->getcartid($userId);
$totprice = $cartController->getTotalCartPrice($userId);
?>
<section class="h-100 h-custom" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card">
          <div class="card-body p-4">

            <div class="row">

              <div class="col-lg-7">
                <h5 class="mb-3"><a href="#!" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                <hr>
                <? alertmessage() ?>
                <? flash() ?>
                <div class="d-flex justify-content-between align-items-center mb-4">
                  <div>
                    <p class="mb-1">Shopping cart</p>
                  </div>

                </div>
                <?php if (!empty($carts)) : ?>
                  <?php foreach ($carts as $cart) { ?>
                    <div class="card mb-3 mb-lg-0">
                      <div class="card-body">
                        <div class="d-flex justify-content-between">
                          <div class="d-flex flex-row align-items-center">
                            <div>
                              <img src="<?php echo $cart->pimage ?>" class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                            </div>
                            <div class="ms-3">
                              <label for=""><?php echo $cart->Pname ?></label>

                              <p class="small mb-0"><?php echo $cart->pdescription ?></p>
                              <p class="small mb-0"><?php echo $cart->pbrand ?></p>
                              <h5 class="mb-0"><?php echo     $cart->pprice; ?></h5>

                            </div>
                          </div>
                          <div class="d-flex flex-row align-items-center">
                            <div style="width: 50px;">
                              <form class="form-control" action="../controllers/cart-controller.php" method="POST">
                                <input type="hidden" name="type" value="updateProductQuantity">
                                <input type="hidden" name="id" value="<?php echo $cart->id ?>">
                                <input type="hidden" name="cart_id" value="<?php echo $cart->cart_id ?>">
                                <label for="quantity">quantity</label>
                                <input type="number" name="cquantity" value="<?php echo $cart->quantity ?>" min="1" max="<?php echo $cart->pquantity ?>">
                                <button type="submit" class="btn btn-success btn-sm mr-1 mt-2 " name="submit">update</button>
                              </form>
                            </div>
                            <div style="width: 80px;">
                              <form action="../controllers/cart-controller.php" method="post">
                                <input type="hidden" name="type" value="DeleteCartProduct">
                                <input type="hidden" name="id" value="<?php echo $cart->id ?>">
                                <input type="hidden" name="UsersUid" value="<?php echo $userId ?>">
                                <input type="hidden" name="cart_id" value="<?php echo $cart->cart_id ?>">

                                <button type="submit" name="submit" class="btn btn-danger btn-sm" style="color: #cecece;"><i class="fas fa-trash-alt "></i></button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php } ?>
                <?php else : ?>
                  <p>No items in the cart.</p>

                <?php endif; ?>
              </div>
              <div class="col-lg-5">

                <div class="card bg-primary text-white rounded-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                      <h5 class="mb-0">Address</h5>
                    </div>


                    <form action=class="mt-4">
                    <div class="form-outline form-white mb-4">
    <input type="text" id="typeName" name="UserAddress" class="form-control form-control-lg" siez="17" placeholder="Cardholder's Name" />
    <label class="form-label" for="typeName"><?php echo isset($user->UserAddress) ? $user->UserAddress : ""; ?> </label>
</div>


                      <div class="form-outline form-white mb-4">
                        <select name="payment_method" class="form-select" id="">
                          <option value="">Select payment_method</option>
                          <option value="cash">cash</option>
                          <option value="visa">visa</option>
                        </select> <label class="form-label" for="typeText">payment method</label>
                      </div>

                    </form>

                    <hr class="my-4">

                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Subtotal</p>
                      <p class="mb-2"><?php echo $totprice; ?></p>
                    </div>

                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Shipping</p>
                      <p class="mb-2">$20.00</p>
                    </div>

                    <div class="d-flex justify-content-between mb-4">
                      <p class="mb-2">price after taxs and discount</p>
                      <p class="mb-2"></p>
                    </div>
                    <form action="">
                      <button type="button" class="btn btn-info btn-block btn-lg">
                        <div class="d-flex justify-content-between">
                          <span></span>
                          <span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                        </div>
                      </button>
                    </form>
                  </div>
                </div>

              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>