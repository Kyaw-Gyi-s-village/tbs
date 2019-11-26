<?php
  include('pg_admin/confs/url.php');
  $cart = 0;
  if(isset($_SESSION['cart']))
  {
    foreach($_SESSION['cart'] as $qty)
    $cart += $qty;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo ucwords($pg_title); ?></title>
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <![endif]-->

  <link rel="stylesheet" type="text/css" href="<?php echo $url_file ?>/css/reset.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $url_file ?>/css/conf.css">
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>

  <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">

  <script src="<?php echo $url_file ?>/scripts/jquery.js"></script>
  <script type="text/javascript">
    var web_url="<?php echo $url ?>";
    var web_url_file="<?php echo $url_file ?>";
  </script>
</head>
<body>
  <a href="<?php echo $url ?>" id="scroll" style="display: none;"><span></span></a>
  <div class="contact"><!-- phone no. area -->
      <span class="line"><a href="tel:09899950008">09 899950008</a></span>
      <span><a href="tel:09784020212">09 784020212</a></span>
  </div>
  <header id="pg_header"><!-- all page's main header -->
    <div id="logo"><!-- For page logo -->
      <a href="<?php echo $url ?>/">
        <span class='pg-title-wrap'>
          <span class="pg-name">
            The <b>BEST</b> Shop
          </span>
          <span class="pg-sub-title">
            Online Shopping
          </span>
        </span>
      </a>
    </div>

    <div id="cart"><!-- For cart -->
      <a href="<?php echo $url ?>/cart/list/">
        <i class='fas fa-shopping-cart' style='font-size:20px;color: #000;'></i>              <!-- fixed -->
        <span id="hk-cart-qty-js"><?php echo $cart?></span>
      </a>
    </div>

    <nav><!-- For menu -->
      <div class="menu-ani" id="menu-img" style="cursor: pointer;">                           <!-- fixed -->
        <span class="menu-lines"></span>
        <span class="menu-lines"></span>
        <span class="menu-lines"></span>
      </div>
      <ul id="menu">
        <li>
          <a href="<?php echo $url ?>/">Home</a>
        </li>
        <li>
          <a href="<?php echo $url ?>/general/delivery/">Delivery</a>
        </li>
        <li>
          <a href="<?php echo $url ?>/general/contact/">Contact us</a>
        </li>
        <li>
          <a href="<?php echo $url ?>/general/about/">About us</a>
        </li>
        <li id="category-list">
          <a>Categories <span id="arrow">&raquo;</span></a>
          <ul id="category">
            <?php $cats = get_all_cats(); foreach($cats as $cat):?>
            <li>
              <a href="<?php echo $url ?>/item/item_same_cat_list/<?php echo $cat['id']?>"><?php echo ucwords($cat['category_name'])?></a>
            </li>
            <?php endforeach; ?>
          </ul>
        </li>
      </ul>
    </nav>
  </header><!-- end of all page's main header -->

  <section><!-- main content -->
    <?php include($view_file) ?>
  </section><!-- end of main content -->

  <footer id="mian-footer"><!-- all page's main footer -->
    <div class="footer-top">
      <div>
        <ul>
          <li class="ft-related-head">About Us</li>
          <li><a href="https://www.facebook.com/sea.trading.14" target="_black">Facebook</a></li>
          <li><a href="https://maps.app.goo.gl/EXGDp" target="_black">Location</a></li>
        </ul>

        <ul>
          <li class="ft-related-head">Contact Us</li>
          <li><a href="tel:09899950008">09 899950008</a></li>
          <li><a href="tel:09784020212">09 784020212</a></li>
          <li><a href="mailto:fuwunlu1996@gmail.com">Email</a></li>
        </ul>

        <ul>
          <li class="ft-related-head">Delivery</li>
          <li><a href="<?php echo $url ?>/general/delivery/">States & Regions</a></li>
          <li><a href="<?php echo $url ?>/general/delivery/">Yangon</a></li>
        </ul>
      </div>
      <p>No.104 U Aye 4th St, Hlaing(16)Qtr, Yangon</p>
    </div><!-- end of footer-top -->
    <div class="footer-bottom">
      &copy;2018 <a href="#"></a>
    </div><!-- end of footer-bottom -->
  </footer><!-- end of all page's main footer -->

  <div class="wp-overlay" id="modal" >
    <div class="wp-category-dialog">
      <div class="wp-overlay-header">
        <span id="wp-overlay-name">Buy now</span>
        <span id="wp-overlay-close">&times;</span>
      </div>
      <form action="<?php echo $url ?>/order/submit_from_buy_now/" method="post">
        <div class="wp-overlay-item">
          <img src="" id="wp-overlay-item-photo">
          <div class="wp-overlay-item-detail">
            <div id="wp-dialog-item-name">Item Name Item</div>
            <div><span id="wp-dialog-item-unit-price">Price</span>&nbsp; Ks</div>
            <div class="quantity" id="button">
              <input type="button" value="-" class="minus">
              <input type="number" step="1" min="1" max="1000" name="qty" value="1" class="input-text qty" id="quan">
              <input type="button" value="+" class="plus">
            </div>
          </div>
        </div>

        <div class="wp-overlay-form" >
            <input type="hidden" id="hk-id-js" name="id">
            <table>
              <tr>
                <td><input type="text" name="name" placeholder="Name" required></td>
              </tr>
              <tr>
                <td><input type="text" name="phone" placeholder="Phone number" required></td>
              </tr>
              <tr>
                <td class="wp-overlay-form-tarea">
                  <textarea rows="3" cols="20" name="address" placeholder="Address" required></textarea>
                </td>
              </tr>
              <tr>
                <td class="wp-overlay-form-tarea">
                  <textarea rows="3" cols="20" name="remark" placeholder="Remark"></textarea>
                </td>
              </tr>
            </table>
            <div id="wp-overlay-buy"><input type="submit" value="Buy"></div>
        </div>
      </form>
    </div>
  </div>

  <script src="<?php echo $url_file ?>/scripts/index.js"></script>

</body>
</html>
