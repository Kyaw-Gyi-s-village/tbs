<?php 
  include('confs/url.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pg_title ?></title>
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <![endif]-->
	 <link rel="stylesheet" type="text/css" href="<?php echo $url_file ?>/css/reset.css">
   <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
   <link rel="stylesheet" type="text/css" href="<?php echo $url_file ?>/pg_admin/css/style.css">

   <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">

	 <script src="<?php echo $url_file ?>/scripts/jquery.js"></script>
   <script type="text/javascript">
      var web_url="<?php echo $url ?>";
    </script>
</head>
<body>
	<header id="pg_header">
    <div id="logo">
      <a href="<?php echo $url ?>/pg_admin/">
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
		<div><a href="<?php echo $url ?>/pg_admin/login_check/logout/" class="new">Log Out</a></div>
  </header>

  <nav id="main-nav">
    <ul>
		  <li class="<?php echo ($controller == "promo")? "active" : ""; ?>"><a href="<?php echo $url ?>/pg_admin/promo/">Manage Promo</a></li>
		  <li class="<?php echo ($controller == "category")? "active" : ""; ?>"><a href="<?php echo $url ?>/pg_admin/category/">Manage Categories</a></li>
		  <li class="<?php echo ($controller == "item")? "active" : ""; ?>"><a href="<?php echo $url ?>/pg_admin/item/">Manage Items</a></li>
		  <li class="<?php echo ($controller == "order")? "active" : ""; ?>"><a href="<?php echo $url ?>/pg_admin/order/">Manage Order</a></li>
		  <li class="<?php echo ($controller == "delivery")? "active" : ""; ?>"><a href="<?php echo $url ?>/pg_admin/delivery/">Manage Delivery</a></li>
		  <li class="<?php echo ($controller == "login")? "active" : ""; ?>"><a href="<?php echo $url ?>/pg_admin/login/show">Manage Account</a></li>
    </ul>
  </nav>

  <section>
  	<?php include($view_file) ?>
  </section>
  <footer id="pg_footer">&copy;2019</footer>
</body>
</html>