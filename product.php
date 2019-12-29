<?php
 require_once(dirname(__FILE__) . '/vendor/autoload.php');
 
  //Set Your server key
  Veritrans_Config::$serverKey = "SB-Mid-server-OY0dlPN2pwHUD0dy9b-w6tE9";

  // Uncomment for production environment
  // Veritrans_Config::$isProduction = true;

  // Enable sanitization
  Veritrans_Config::$isSanitized = true;

  // Enable 3D-Secure
  Veritrans_Config::$is3ds = true;

  // Required
  $transaction_details = array(
    'order_id' => rand(),
    'gross_amount' => 40000, // no decimal allowed for creditcard
  );

  // Optional
  $item1_details = array(
    'id' => 'a1',
    'price' => 20000,
    'quantity' => 2,
    'name' => "Denim shirt"
  );

  // Optional
  // $item2_details = array(
  //   'id' => 'a2',
  //   'price' => 150000,
  //   'quantity' => 1,
  //   'name' => "Sweatshirt"
  // );

  // Optional
  // $item_details = array ($item1_details, $item2_details);
  $item_details = array ($item1_details);

  // alamat penagihan
  $billing_address = array(
    'first_name'    => "Kiostr",
    'last_name'     => "",
    'address'       => "Mataram",
    'city'          => "Mataram",
    'postal_code'   => "83112",
    'phone'         => "081234567891",
    'country_code'  => 'IDN'
  );

  // alamat pengirim
  $shipping_address = array(
    'first_name'    => "Muhammad",
    'last_name'     => "Tanwir",
    'address'       => "Lombok Timur",
    'city'          => "Mataram",
    'postal_code'   => "83354",
    'phone'         => "081234567892",
    'country_code'  => 'IDN'
  );

  // detail pelanggan
  $customer_details = array(
    'first_name'    => "Kiostr",
    'last_name'     => "",
    'email'         => "kiostr@gmail.com",
    'phone'         => "081234567891",
    'billing_address'  => $billing_address,
    'shipping_address' => $shipping_address
  );

  // Optional, remove this to display all available payment methods
  // $enable_payments = array('credit_card','cimb_clicks','mandiri_clickpay','echannel','alfamart');
  $enable_payments = array('cimb_clicks','mandiri_clickpay','echannel','alfamart');


  // Fill transaction details
  $transaction = array(
    'enabled_payments' => $enable_payments,
    'transaction_details' => $transaction_details,
    'customer_details' => $customer_details,
    'item_details' => $item_details,
  );

  $snapToken = Veritrans_Snap::getSnapToken($transaction);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>KIOSTR</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet">
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand waves-effect" href="https://www.kodetr.com" target="_blank">
        <strong class="blue-text">KIOSTR</strong>
      </a>

      <!-- Collapse -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Left -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link waves-effect" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" href="ttps://www.kodetr.com" target="_blank">Brands</a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" href="ttps://www.kodetr.com"
              target="_blank">Sale</a>
          </li>
        </ul>

         <!-- Right -->
        <ul class="navbar-nav nav-flex-icons">
          <li class="nav-item">
            <a class="nav-link waves-effect">
              <i class="fas fa-bell"></i>
              <span class="badge red z-depth-1 mr-1"> 2 </span>
            </a>
          </li>
        </ul>

      </div>

    </div>
  </nav>
  <!-- Navbar -->

  <!--Main layout-->
  <main class="mt-5 pt-4">
    <div class="container dark-grey-text mt-5">

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-6 mb-4">

          <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12.jpg" class="img-fluid" alt="">

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-6 mb-4">

          <!--Content-->
          <div class="p-4">
            <div class="mb-3">
              <a href="">
                <span class="badge blue mr-1">New</span>
              </a>
              <a href="">
                <span class="badge red mr-1">Bestseller</span>
              </a>
            </div>

            <p class="lead">
              <span>Rp 120.000</span>
            </p>

            <p class="lead font-weight-bold">Deskripsi</p>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et dolor suscipit libero eos atque quia ipsa
              sint voluptatibus!
              Beatae sit assumenda asperiores iure at maxime atque repellendus maiores quia sapiente.</p>
            
              <button id="pay-button" class="btn btn-primary btn-md my-0 p" type="submit">Buy
                  <i class="fas fa-shopping-Buy ml-1"></i>
              </button>

              <!-- <p> -->
                <?php
                  // echo "Snap Token : ".$snapToken;
                ?>
              <!-- </p> -->

              <p><pre><div id="result-json">JSON Payment:<br></div></pre></p>

          </div>
          <!--Content-->
        </div>
        <!--Grid column-->
      </div>
    </div>
  </main>
  <!--Main layout-->

  <!--Footer-->
  <footer class="page-footer text-center font-small mt-4 wow fadeIn">

    <!--Copyright-->
    <div class="footer-copyright py-3">
      <a href="https://kodetr.com/" target="_blank"> KIOSTR </a>
       © 2019
    </div>
    <!--/.Copyright-->

  </footer>
  <!--/.Footer-->

  <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-sQRKcfPK-sHoyZtf"></script>
    <script type="text/javascript">
      document.getElementById('pay-button').onclick = function(){
        // SnapToken acquired from previous step
        snap.pay('<?=$snapToken?>', {
          // Optional
          onSuccess: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          // Optional
          onPending: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          // Optional
          onError: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          }
        });
      };
    </script>

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();

  </script>
</body>

</html>
