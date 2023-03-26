</div>
<!-- ##### Main Content Wrapper End ##### -->
<!-- ##### Footer Area Start ##### -->
<footer class="footer_area clearfix">
  <div class="container">
    <div class="row align-items-center">
      <!-- Single Widget Area -->
      <div class="col-12 col-lg-4">
        <div class="single_widget_area">
          <!-- Logo -->
          <div class="footer-logo mr-50">
            <a href="index.php"><img src="img/core-img/daas2.png" alt=""></a>
          </div>
        </div>
      </div>
      <!-- Single Widget Area -->
      <div class="col-12 col-lg-8">
        <div class="single_widget_area">
          <!-- Footer Menu -->
          <div class="footer_menu">
            <nav class="navbar navbar-expand-lg justify-content-end">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#footerNavContent" aria-controls="footerNavContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
              <div class="collapse navbar-collapse" id="footerNavContent">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="shop.php">Shop</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="sell.php">Sell</a>
                  </li>
                  <li class="nav-item"><?php $val = ((isset($_SESSION["userid"]) ? "logout" : "login")); ?>
                    <a class="nav-link" href="<?php echo $val; ?>.php"><?php echo $val; ?></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="admin/login.php">Admin</a>
                  </li>
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- ##### Footer Area End ##### -->

<!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script src="js/jquery-searchbox.js"></script>
<!-- Popper js -->
<script src="js/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="js/bootstrap.min.js"></script>
<!-- Plugins js -->
<script src="js/plugins.js"></script>
<!-- Active js -->
<script src="js/active.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script>
  $('.category-select').searchBox({
    elementWidth: '250'
  })

  $('.size-format-select').searchBox({
    elementWidth: '150'
  })

  $('.denomination-select').searchBox({
    elementWidth: '150'
  })

  $('.property-type-select').searchBox({
    elementWidth: '100',
  })

  $('.city-select').searchBox({
    elementWidth: '100',
  })

  $('.state-select').searchBox({
    elementWidth: '100',
  })
</script>

</body>

</html>
