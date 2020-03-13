<?php include 'header.php' ?>

            <!--SIDE NAV STARTS-->
            <div id="side_nav">
                <div class="sideNavCategories">
                    <h1>LEISURE</h1>
                    <ul class="category departments">
                        <li class="header">Departments</li>
                        <li class="menu_cont"><a href="#">Sweaters</a>
                          <ul class="side_sub_menu">
                              <li><a href="#">Crew clothing</a></li>
                              <li><a href="#">Figleaves Tee Boutique</a></li>                                                                                             
                            </ul>
                        </li>
                        <li><a href="#">Knit Tops & Tees</a></li>
                        <li class="menu_cont"><a href="#">Shirts & Blouses</a>
                          <ul class="side_sub_menu">
                              <li><a href="#">Crew clothing</a></li>
                              <li><a href="#">Figleaves Tee Boutique</a></li>
                              <li><a href="#">Joules</a></li>
                              <li><a href="#">Lei clothing</a></li>                                                                                                
                            </ul>
                        </li>
                        <li><a href="#">Jackets</a></li>
                        <li><a href="#">Pants</a></li>
                        <li><a href="#">Jeans</a></li>
                        <li><a href="#">Dresses</a></li>
                        <li><a href="#">Skirts</a></li>
                        <li><a href="#">No Iron Collection</a></li>
                    </ul>
                    <ul class="category collection">
                        <li class="header">Collection</li>
                        <li><a href="#">All Brands</a></li>
                        <li><a href="#">Citizens of Humanity</a></li>
                        <li><a href="#">Crew Clothing</a></li>
                        <li><a href="#">Boutique</a></li>
                        <li><a href="#">Summer</a></li>
                        <li><a href="#">Mudd & Water</a></li>
                    </ul>
                    <ul class="category price">
                        <li class="header">Price</li>
                        <li><a href="#">$50 to $100</a></li>
                        <li><a href="#">$100 to $200</a></li>
                        <li><a href="#">$200 to $500</a></li>
                    </ul>
                </div>
            </div>
            <!--SIDE NAV ENDS-->
            <!--MAIN CONTENT STARTS-->
            <div id="main_content">
                <div class="category_banner"> <img src="public/images/promo_cat_banner.jpg"/> </div>
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="product.php">Women</a></li>
                    <li class="active"><a href="#">Shirts & Blouses</a></li>
                </ul>
                <?php 
                    $cat_id = isset($_GET['cat-id']) ? $_GET['cat-id'] : 0;
                    $sql = "SELECT * FROM product WHERE category_id IN(SELECT id FROM category WHERE parent_id = $cat_id OR id = $cat_id) Order By id DESC";
                    $products = $conn->query($sql)->fetchAll();
                 ?>
                
                <div class="products_list products_slider">
                    <?php foreach($products as $pro) : ?>
                    <ul>
                        <li> <a class="product_image"><img src="uploads/<?php echo $pro['image'];?>" alt=""></a>
                            <div class="product_info">
                                <h3><a href="product1.php?id=<?php echo $pro['id']  ?>"><?php echo $pro['name'];?></a></h3>
                                </div>
                            <div class="price_info"> <?php if($pro['sale_price'] > 0) : ?>
                                <p class="price">
                                        <a class="price">$<?php echo $pro['price'] ?></a>
                                    </p>
                                    <p class="pr_price">
                                            <button class="price_add" title="" type="button"><span class="pr_price">$<?php echo $pro['sale_price'] ?></span>
                                          </p>
                                       <?php else: ?>       
                                       <p class="price">
                                            <button class="price_add" title="" type="button"><span class="price">$<?php echo $pro['price'] ?></span>
                                             </p>
                                       <?php  endif; ?> 
                                       <a href="xu-ly-gio-hang.php?id=<?php echo $pro['id'] ?>" class="pr_add" type="button">add to cart
                                </a>
                                </button>
                            </div>
                        </li>
                        
                       
                    </ul>
                    <?php endforeach; ?>
                </div>
                
               
            </div>
            <!--MAIN CONTENT ENDS-->
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
        
<?php include 'footer.php' ?>