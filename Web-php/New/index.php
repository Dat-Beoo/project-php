<?php 
    include 'header.php';
   
?>

 <div class="section_container">
        <section>
            <div id="banner_section">
                <div class="flexslider">
                    <ul class="slides">
                        <li> <img src="public/images/banner_1.jpg" />
                           
                        </li>
                        <li> <img src="public/images/banner_2.jpg" />
                            
                        </li>
                        <li> <img src="public/images/banner_3.jpg" /> </li>
                    </ul>
                </div>
                <div class="promo_banner">
                    <div class="home_banner"><a href="#"><img src="public/images/promo_1.jpg"></a></div>
                    <div class="home_banner"><a href="#"><img src="public/images/promo_2.jpg"></a></div>
                    <div class="home_banner"><a href="#"><img src="public/images/promo_3.jpg"></a></div>
                </div>
            </div>
            <!--Banner Ends-->
            <!--Product List Starts-->
            <?php 
            $sql_new = "SELECT * FROM product WHERE status > 0 Order By id DESC LIMIT 10";
            $new_products = $conn->query($sql_new)->fetchAll();
            $new_left = $new_products[0]; // lấy phần tử đầu tiên trong mảng
            unset($new_products[0]); // xóa phần tử ra khỏi mảng
         
         ?>
         <?php 
         $sql_sale = "SELECT * FROM product WHERE sale_price > 0 Order By id DESC LIMIT 10";
         $sale_products = $conn->query($sql_sale)->fetchAll();
         ?>
            <div class="products_list products_slider">
                         <?php echo '<h2 class="sub_title">NEW</h2>'; ?>
                         <ul id="first-carousel" class="first-and-second-carousel jcarousel-skin-tango">
                    
                         <?php foreach($sale_products as $sp) { ?>
                   <li> 
                            <div class="product_info">
                                <a href="product1.php?id=<?php echo $sp['id']  ?>">
                                    <span class="product-image">
                                            <img src="uploads/<?php echo $sp['image'] ?>" alt="">
                                        </span>
                                </a>
                                <h3 class="single-product-name"><a href="product1.php?id=<?php echo $sp['id']  ?>"><?php echo $sp['name'] ?></a></h3>
                                
                                 </div>
                            <div class="price_info">  <a class="price">$<?php echo $sp['price'] ?></a>
                                <button class="price_add" title="" type="button"><span class="pr_price">$<?php echo $sp['sale_price'] ?></span> <a href="xu-ly-gio-hang.php?id=<?php echo $sp['id'] ?>" class="pr_add" type="button">add to cart
                                </a>
                                </button>
                            </div>
                        </li>
 

                        

                        

                    <?php } ?>
                    </ul>
                </div>
            <!--Product List Ends-->
            <!--Product List Starts-->
            
                <!--Product List Ends-->
                <!--Toolbar-->
                
<!--Product List Ends-->
<!--Newsletter_subscribe Starts-->
<div class="subscribe_block">
    <div class="find_us">
        <h3>Find us on</h3>
        <a class="twitter" href="#"></a> <a class="facebook" href="#"></a> <a class="rss" href="#"></a> </div>
    <div class="subscribe_nl">
        <h3>Subscribe to our Newsletter</h3>
        <small>Instant wardrobe updates, new arrivals, fashion news, don’t miss a beat – sign up to our newsletter now.</small>
        <form id="newsletter" method="post" action="#">
            <input type="text" class="input-text" value="Enter your email" title="Enter your email" id="newsletter" name="email">
            <button class="button" title="" type="submit"></button>
        </form>
    </div>
</div>
<!--Newsletter_subscribe Ends-->


<?php 
    include 'footer.php';
?>