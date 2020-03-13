<?php 
include 'config/connect.php';
include 'config/function.php';
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Leisure Magento Theme</title>
<!--CSS-->
<link rel="stylesheet" href="public/css/styles.css">
<!--Google Webfont -->
<link href='http://fonts.googleapis.com/css?family=Istok+Web' rel='stylesheet' type='text/css'>
<!--Javascript-->
<script type="text/javascript" src="public/js/jquery-1.7.2.min.js" ></script>
<script type="text/javascript" src="public/js/jquery.flexslider.js" ></script>
<script type="text/javascript" src="public/js/jquery.easing.js"></script>
<script type="text/javascript" src="public/js/jquery.jcarousel.js"></script>
<script type="text/javascript" src="public/js/jquery.jtweetsanywhere-1.3.1.min.js" ></script>
<script type="text/javascript" src="public/js/simpletabs_1.3.js"></script>
<script type="text/javascript" src="public/js/form_elements.js" ></script>
<script type="text/javascript" src="public/js/custom.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body>
<div class="wrapper">
    <div class="header_container">
       
        <header>
            <div class="top_bar clear">
               
                <ul class="top_links">
                    <li><a href="my_order.php">My Orders</a></li>
                    <li><a href="login.php">Login/Sigup</a></li>
                    
                </ul>
             
            </div>
            <!--Logo Starts-->
            <h1 class="logo"> <a href="index.php"><img src="public/images/logo.png" /></a> </h1>
            <!--Logo Ends-->
            <!--Responsive NAV-->            <div class="responsive-nav" style="display:none;">
                <select  onchange="if(this.options[this.selectedIndex].value != ''){window.top.location.href=this.options[this.selectedIndex].value}">
                    <option selected="" value="">Navigate...</option>
                    <option value="index.php"> Home</option>
                    <option value="page.php"> -  Listing Page</option>
                    <option value="product1.php">Product Page</option>
                    <option value="cart.php"> -  Shopping Cart</option>
                    <option value="checkout.php"> -  Checkout</option>
                    <option value="contact.php">Contact</option>
                </select>
            </div>
            <!--Responsive NAV-->
            <!--Search Starts-->
            <form class="header_search" action="search">
                <div class="form-search">
                    <input id="search" type="text" name="q" value="" class="input-text" autocomplete="off" placeholder="Search">
                    <button type="button" title="Search" onClick="parent.location='search.php?action=search'"></button>
                </div>
            </form>
            <!--Search Ends-->
        </header>
        <!--Header Ends-->
    </div>
    <?php 
                $cats = $conn->query("SELECT id,name FROM category WHERE parent_id =0")->fetchAll();
             ?>
    <div class="navigation_container">
        <!--Navigation Starts-->
        <nav>
            <ul class="primary_nav">
                <li class="active"><a href="index.php">HOME</a>
                    <!--SUbmenu Starts-->
                    <ul class="sub_menu">
                        <li> <a href="#"></a>
                            
                        </li>
                        <li> <a href="#"></a>
                            <ul>
                                
                            </ul>
                        </li>
                    </ul>
                    <!--SUbmenu Ends-->
                </li>
                 <?php foreach($cats as $cat) : 
                                            $cat_id = $cat['id'];
                                            $catCon = $conn->query("SELECT id,name FROM category WHERE parent_id = $cat_id")->fetchAll();
                                        ?>
                <li>
                                                <a href="product.php?cat-id=<?php echo $cat['id'];?>"><?php echo $cat['name'] ?></a>
                                                <?php if($catCon) : ?>
                                                    <ul class="sub-menu">
                                                         <?php foreach($catCon as $cc) : ?>
                                                        <li><a href="product.php?cat-id=<?php echo $cc['id'];?>" title=""><?php echo $cc['name'] ?></a></li>
                                                         <?php endforeach; ?>
                                                    </ul>

                                                <?php endif; ?>
                                            </li>
                                        <?php endforeach; ?>
                  <li><a href="contact.php">CONTACT</a></li>
                 <li><a href="page.php">ABOUT</a></li>
                <li><a href="#"></a></li>
            </ul>

            <div class="minicart">
               
             <a href="#" class="minicart_link" > <span class="item"><b><?php echo totalQtt() ?></b> ITEM /</span> <span class="price"><b>$<?php echo totalPrice(); ?></b></span> </a>
                 <?php foreach(cart_items() as $cart) : ?>
                <div class="cart_drop">  <span class="darw"></span>
                     <ul>
                        <li><img src="uploads/<?php echo $cart['image'];?>" width="60"><a href="#"><?php echo $cart['name'];?></a> <span class="price">$<?php echo $cart['price'];?></span></li>
                        
                        <div class="cart_bottom">
                            <p class="subtotal_menu">Subtotal:<span>$<?php echo totalPrice(); ?></span></p>
                            <a href="cart.php">Checkout</a> </div>
                        </ul>
                        </div>
                
                 <?php endforeach; ?>
             </div>
            </div>
        </nav>
        
    </div>
    <div class="section_container">
        <!--Mid Section Starts-->
        <section>