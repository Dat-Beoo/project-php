<?php 
    include 'header.php';
    //$carts = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
     ?>
      
        
  <div class="section_container"> 
    <!--Mid Section Starts-->
    <section> 
      <!--CART STARTS-->
      <div id="shopping_cart" class="full_page">
        <h1>Shopping Cart</h1>
        
        <div class="cart_table">
          <form action="xu-ly-gio-hang.php">
          <input type="hidden"  name="action" value="update">
          <table class="data-table cart-table" id="shopping-cart-table" cellpadding="0" cellspacing="0">
            <tr>
              <th colspan="2">Product</th>
              <th class="align_center" width="6%"></th>
              <th class="align_center" width="12%">Price</th>
              <th class="align_center" width="10%">QTY</th>
             
              <th class="align_center" width="6%">Remove</th>
            </tr>
            <?php foreach(cart_items() as $cart) : ?>
            <tr>
              <td width="10%"><input type="hidden" name="id_update[]" value="<?php echo $cart['id'];?>"><a href="product1.php"><img alt="" src="uploads/<?php echo $cart['image'];?>" class="floatleft"></a></td>
              <td class="align_left" width="44%"><a class="pr_name" href="#"><?php echo $cart['name'];?></a></td>
              <td class="align_center"><a href="#" class="edit">Edit</a></td>
              <td class="align_center vline"><span class="price">$<?php echo $cart['price'];?></span></td>
              <td class="align_center vline"><input class="qty_box" maxlength="12" type="text" value="<?php echo $cart['quantity'];?>" name="qtt_update[]"></td>
              
              <td class="align_center"><a href="xu-ly-gio-hang.php?id=<?php echo $cart['id'] ?>&action=remove">X</a></td>
            </tr>
            <?php endforeach; ?>

          </table>
          <div class="totals">
            <table id="totals-table">
                <tr>
                  <td width="60%" colspan="1" class="align_left" ><strong>Total:</strong></td>
                  <td class="align_right" style=""><strong><span class="price">$<?php echo totalPrice(); ?></span></strong></td>
                </tr>
                               
            </table>
          </div>
        </div>
        <div class="action_buttonbar">
          <button type="button" title="" class="continue" onClick="parent.location='product.php'">Continue Shopping</button>

          <button style="float: right"  class="button" ><span>Update Shopping Cart </span></button>

          <button class="button clear-cart" ><a href="xu-ly-gio-hang.php?action=clear" style="color: white;">Clear Shopping Cart</a></button>
          <button type="button"  onClick="parent.location='checkout.php'" title="" class="checkout">Orders</button>

        </div>
      </form>
      
    </div>
    
      <!--CART ENDS--> 
      
      <div class="checkout_tax">
      	<div class="shipping_tax">
        	<h4>Estimate Shipping and Tax</h4>
            <p>Enter your destination to get a shipping estimate.</p>
            <label>Country</label><select><option>Canada</option></select><label>Postal code</label><input type="text">
            <br class="clear"/>
            <label>State</label><select><option>Vancouver</option></select>
            <button type="button" title="" class="brown_btn">Get a Quote</button>
        </div>
        <div class="checkout_discount">
        	<h4>Discount codes</h4>
            <p>Enter your coupon code if you have one.</p>
            <input type="text">
            <button type="button" title="" class="brown_btn">Apply Coupon</button>
        </div>
      </div>
      
      
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
    </section>
    <!--Mid Section Ends--> 
  </div>
  <?php 
    include 'footer.php';
?>