<?php
 include '../views/header.php';
include_once '../controllers/Users-controller.php';
$usercontroller=new User;
//$userid=$_SESSION['UsersUid'];
$userdata=$usercontroller->getUserDetailsById($userid);
?>
     <link rel="stylesheet" href="../public/css/checkout.css">
     <div class="iphone">
  <header class="header">
    <h1>Checkout</h1>
  </header>

  <form action="https://httpbin.org/post" class="form" method="POST">
    <div>
      <h2>Address</h2>

      <div class="card">
        <address>
         
        </address>
      </div>
    </div>

    <fieldset>
      <legend>Payment Method</legend>

      <div class="form__radios">
        <div class="form__radio">
          <label for="visa"><svg class="icon">
              <use xlink:href="#icon-visa" />
            </svg>Visa Payment</label>
          <input checked id="visa" name="payment-method" type="radio" />
        </div>

        <div class="form__radio">
          <label for="paypal"><svg class="icon">
              <use xlink:href="#icon-paypal" />
            </svg>PayPal</label>
          <input id="paypal" name="payment-method" type="radio" />
        </div>

        <div class="form__radio">
          <label for="mastercard"><svg class="icon">
              <use xlink:href="#icon-mastercard" />
            </svg>Master Card</label>
          <input id="mastercard" name="payment-method" type="radio" />
        </div>
      </div>
    </fieldset>

    <div>
      <h2>Shopping Bill</h2>

      <table>
        <tbody>
          <tr>
            <td>Shipping fee</td>
            <td align="right">$5.43</td>
          </tr>
          <tr>
            <td>Discount 10%</td>
            <td align="right">-$1.89</td>
          </tr>
          <tr>
            <td>Price Total</td>
            <td align="right">$84.82</td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td>Total</td>
            <td align="right">$88.36</td>
          </tr>
        </tfoot>
      </table>
    </div>

    <div>
      <button class="button button--full" type="submit"><svg class="icon">
          <use xlink:href="#icon-shopping-bag" />
        </svg>Buy Now</button>
    </div>
  </form>
</div>

