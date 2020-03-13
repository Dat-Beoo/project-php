<?php include 'header.php';

$id = isset($_GET['id']) ? $_GET['id'] : 0;

$pro = $conn->query("SELECT * FROM product WHERE id = $id")->fetch();
 ?>


      <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="product.php">Women</a></li>
        <li class="active"><a href="#">Shirts & Blouses</a></li>
      </ul>
      <!--PRODUCT DETAIL STARTS-->
      <div id="product_detail"> 
        <!--Product Left Starts-->
        <div class="product_leftcol"> <img src="uploads/<?php echo $pro['image'] ?>"> <span class="pr_info">ROLL OVER IMAGE TO ZOOM</span>
          
        </div>
        <!--Product Left Ends--> 
        <!--Product Right Starts-->
        <div class="product_rightcol"> <small class="pr_type"></small>
          <h1><?php echo $pro['name'] ?></h1>
          <p class="short_dc"> <?php echo $pro['content'] ?>
          </p>
          <div class="pr_price"> <big>$<?php echo $pro['sale_price'] ?></big> <small>$<?php echo $pro['price'] ?></small> </div>
          <div class="size_info">
            <div class="size_sel">
              <label>Available Size :</label>
              <select>
                <option>SELECT</option>
                <option>32</option>
              </select>
            </div>
            <div class="color_sel">
              <label>Color :</label>
              <select>
                <option>BEIGE</option>
                <option>CORAL</option>
              </select>
            </div>
          </div>
          <form action="xu-ly-gio-hang.php">
          <div class="qty_info">
            <div class="quantity">
              <input type="hidden" name="id" value="<?php echo $id;?>">
              <label>Quantity :</label>
              <input type="text" class="input-text qty" value="1" maxlength="12" id="qty" name="quantity">
            </div>
          </div>
          <div class="add_to_buttons">
            <button onClick="parent.location='cart.php'" class="add_cart">Add to Cart</button>
            </form>
            </ul>
          </div>
          <div class="product_overview">
            <h4>Quick Overview</h4>
            <ul>
              <li>Long sleeves with single button cuffs.</li>
              <li>Cuffs can be rolled up and secured with button-tabs.</li>
              <li>Standing collar with notched detailing.</li>
              <li>Front button placket.</li>
              <li>Hem is longer in back.</li>
            </ul>
          </div>
          <!--Options-->
          <div class="product_options">
            <h4>Available Options</h4>
            <ul>
            <li>
            <span class="required">*</span>
              <label>Select:</label>
              <select>
                <option>Select</option>
              </select>
            </li>
            <li>
            <span class="required">*</span>
              <label>Radio:</label>
              <div class="input_container">
                <input type="radio" id="option-value-5" value="5" name="option[218]">
                <label for="option-value-5">Small                        (+$13.75) </label>
                <input type="radio" id="option-value-6" value="6" name="option[218]">
                <label for="option-value-6">Medium                        (+$25.50) </label>
                <input type="radio" id="option-value-7" value="7" name="option[218]">
                <label for="option-value-7">Large                        (+$37.25) </label>
              </div>
            </li>
            <li>
           <span class="required">*</span> <label>Checkbox:</label>
              <div class="input_container">
                <input type="checkbox" id="option-value-8" value="8" name="option[223][]">
                <label for="option-value-8">Checkbox 1                        (+$13.75) </label>
                <input type="checkbox" id="option-value-9" value="9" name="option[223][]">
                <label for="option-value-9">Checkbox 2                        (+$25.50) </label>
                <input type="checkbox" id="option-value-10" value="10" name="option[223][]">
                <label for="option-value-10">Checkbox 3                        (+$37.25) </label>
                <input type="checkbox" id="option-value-11" value="11" name="option[223][]">
                <label for="option-value-11">Checkbox 4                        (+$49.00) </label>
              </div>
            </li>
            <li>            
                <div class="txt_frm">
                    <span class="required">*</span> <label>Text:</label>
                    <input type="text" value="test" name="option[208]">     
                    <br class="clear"/>         
                    <span class="required">*</span> <label>Textarea:</label>
                    <textarea rows="3" cols="40" name="option[209]"></textarea>
                </div>
            </li>
            <li>
                <div class="file_upload">
                   <span class="required">*</span> <label>File:</label>
                      <input type="button" class="button" id="button-option-222" value="Upload File">
                      <input type="hidden" value="" name="option[222]">
                    <br class="clear"/>
                 <span class="required">*</span> <label>Date:</label>
                      <input type="text" class="date hasDatepicker" value="2011-02-20" name="option[219]" id="dp1347114619217">
                   <span class="required">*</span> <label>Time:</label>
                      <input type="text" class="time hasDatepicker" value="22:25" name="option[221]" id="dp1347114619219">
                      <br class="clear"/>
                   <span class="required">*</span> <label>Date &amp; Time:</label>
                      <input type="text" class="datetime hasDatepicker" value="2011-02-20 22:25" name="option[220]" id="dp1347114619218">
                 </div>
            </li>

            </ul>
          </div>
        </div>
        <!--Product Right Ends--> 
        
        <!--Tabs-->
<div class="simpleTabs">
            <ul class="simpleTabsNavigation">
              <li><a href="#">Tab 1</a></li>
              <li><a href="#">Tab 2</a></li>
              <li><a href="#">Other tab</a></li>
            </ul>
            <div class="simpleTabsContent">
              <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec turpis. Fusce aliquet lorem vitae est. In hac habitasse platea dictumst. Phasellus iaculis facilisis pede. Fusce vulputate elit non magna. Nunc commodo rhoncus dolor. Integer auctor. Aliquam tincidunt purus id mauris. Vivamus eros. Vestibulum velit libero, dapibus ac, consectetuer dignissim, adipiscing sed, libero. Ut mi metus, tempor eget, aliquet sit amet, euismod ut, est. Sed nec leo eu lacus laoreet venenatis. Praesent massa sem, facilisis quis, mollis non, consequat et, sapien. Vestibulum dui sapien, sollicitudin ut, hendrerit id, cursus sed, eros. Aliquam eu purus. Proin iaculis. Vestibulum elementum metus sed ipsum. Integer facilisis. Donec aliquam ligula eu neque. Etiam urna. </p>
              <p> Cras pretium fringilla nibh. Duis posuere. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Pellentesque semper. Ut quis arcu. Integer ac nulla. Ut auctor. Pellentesque scelerisque nisl in tortor. Integer eget purus. Ut volutpat, neque eu tincidunt tincidunt, justo tortor pretium elit, vitae varius mauris arcu a lectus. Phasellus bibendum pretium urna. Donec non quam in augue molestie congue. Aenean metus diam, volutpat vitae, tristique id, porttitor a, elit. Cras bibendum, augue non pulvinar aliquam, est nulla posuere nunc, gravida gravida magna leo nec arcu. Donec arcu mi, pellentesque quis, placerat quis, egestas id, leo. Morbi urna est, convallis eget, tristique at, egestas a, lectus.</p>
            </div>
            <div class="simpleTabsContent">
              <div>
                <div>
                  <div>
                    <div>
                      <p>Proin ullamcorper bibendum tellus. Donec vel ipsum sit amet mi convallis lacinia. Maecenas non nunc bibendum orci commodo aliquam. Integer vel justo. Sed vestibulum semper mi. Vestibulum tincidunt leo at augue. Morbi ut justo. Sed cursus, lorem nec lobortis blandit, urna nisl rhoncus erat, id vulputate dui sem sed erat. Sed velit diam, pretium in, hendrerit non, eleifend ut, nisi. Nullam at risus. Donec vitae tellus ut tellus dictum adipiscing. Sed nisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam condimentum, odio at rhoncus cursus, dolor lacus malesuada est, in pulvinar arcu justo ultricies justo. Ut sagittis luctus dui. </p>
                      <p> Maecenas fringilla diam fermentum ante. Vivamus tempor, sem vitae semper aliquam, arcu nunc pretium quam, vitae auctor sapien dolor ut lorem. Integer eros. Sed pulvinar mi eu tortor. Pellentesque faucibus neque eu erat. Nullam pulvinar, urna vitae elementum malesuada, tortor lectus consequat nulla, in pharetra augue lacus et odio. Donec enim nulla, lacinia sed, interdum non, laoreet ut, nisi. Quisque posuere, purus id pretium luctus, dui ligula porttitor neque, vitae consequat sem arcu posuere metus. Duis dictum convallis ipsum. Nulla mi. </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="simpleTabsContent">
              <p> Vestibulum sit amet arcu a leo dignissim lobortis. Quisque augue neque, adipiscing id, condimentum eu, congue at, pede. Vivamus rhoncus. Aliquam pulvinar justo et ligula. Pellentesque ligula elit, placerat vel, luctus ac, facilisis et, enim. Nulla malesuada venenatis metus. Etiam pellentesque tincidunt diam. Ut et pede. Cras ante. Maecenas sagittis mi vulputate neque. Aenean dignissim justo non lectus. Nulla facilisi. Maecenas enim lorem, lacinia non, bibendum at, varius consectetuer, ipsum. Fusce ut lacus in nulla rutrum pellentesque. Nunc velit. Vestibulum eleifend porta risus. Cras congue volutpat leo. Nam nec mi quis libero placerat ultrices. Nulla massa velit, scelerisque sed, rutrum in, sollicitudin nec, mi. Pellentesque imperdiet laoreet sapien. </p>
            </div>
          </div>
          <!--Tabs-->        
        
      </div>
      <!--PRODUCT DETAIL ENDS--> 
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
                            <div class="price_info"><a class="price">$<?php echo $sp['price'] ?></a>
                                <button class="price_add" title="" type="button"><span class="pr_price">$<?php echo $sp['sale_price'] ?></span> <a href="xu-ly-gio-hang.php?id=<?php echo $sp['id'] ?>" class="pr_add" type="button">add to cart
                                </a>
                                </button>
                            </div>
                        </li>
 

                        

                        

                    <?php } ?>
                    </ul>
                </div>
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
      

<?php include 'footer.php'; ?>