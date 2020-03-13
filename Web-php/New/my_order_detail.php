
<?php include 'header.php'; ?>

<div class="section_container"> 
    <section> 
      <div id="shopping_cart" class="full_page">
        <h1>Orders History</h1>
        
        <div class="cart_table">
          <?php if(isset($_SESSION['cus_login'])) : 
      $cus = $_SESSION['cus_login'];
      $cus_id = $cus['id'];
            $od_id = $_GET['od_id'];
      $sql = "SELECT o.*,SUM(dt.price*dt.quantity) total FROM orders o JOIN order_detail dt ON o.id = dt.order_id WHERE o.customer_id = $cus_id AND o.id = $od_id";
      $od = $conn->query($sql)->fetch();


    ?>
          <form action="xu-ly-gio-hang.php">
          <input type="hidden"  name="action" value="update">
          <table class="data-table cart-table" id="shopping-cart-table" cellpadding="0" cellspacing="0">
            <div class="col2-set">
        <div class="col-1">
           <h4>Thông tin đơn hàng:</h4>
            <thead>
             
            <tr>
                        <th>Id</th>
                        <td><?php echo $od_id; ?></td>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <td><?php echo $od['created'] ?></td>
                    </tr>
                     <tr>
                        <th>Total</th>
                        <td>$<?php echo number_format($od['total']) ?></td>
                    </tr>
                     <tr>
                        <th>Status</th>
                        <td>
                            <?php if($od['status'] == 1) : ?>
                                <div class="buttons-set">
                                            <button  class="button brown_btn" type="submit">Đã Duyệt</button>
                                        </div>
                            <?php else: ?>
                                <div class="buttons-set">
                                            <button  class="button brown_btn" type="submit" style="font-size: 10px;">Chờ Duyệt</button>
                                        </div>
                            <?php endif; ?>
                        </td>
                    </tr>
          
          </thead>
        </div>
   
       <div class="col-2">
        <thead>
        <tr>
                        <th>Name</th>
                        <td><?php echo $od['name'] ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?php echo $od['email'] ?></td>
                    </tr>
                     <tr>
                        <th>Phone</th>
                        <td><?php echo $od['phone'] ?></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td><?php echo $od['address'] ?></td>
                    </tr>
                  </thead>
       </div>
     </div>
   </table>
 </form>

        <?php 
            $sql_dt = "SELECT dt.*,p.name,p.image FROM order_detail dt JOIN product p ON p.id = dt.product_id WHERE dt.order_id=$od_id";

            $products = $conn->query($sql_dt)->fetchAll();
        
         ?>
 <form action="xu-ly-gio-hang.php">
          <input type="hidden"  name="action" value="update">
          <table class="data-table cart-table" id="shopping-cart-table" cellpadding="0" cellspacing="0">
            <div class="col2-set">
  <h4>Chi tiết sản phẩm:</h4>
<thead>
            <tr>
              <th>STT</th>
              <th>Image</th>
              <th>Name</th>
              <th>Price</th>
                    <th>QTY</th>
                    <th>Member</th>
            </tr>
                    
          </thead>

 </div>


           <tbody>
          <?php foreach($products as $key => $pro) { ?>
                <tr>
                    <td><?php echo $key+1; ?></td>
                    <td>
                        <img src="uploads//<?php echo $pro['image'] ?>" alt="" width="60">
                    </td>
                    <td><?php echo $pro['name'] ?></td>
                    <td>$<?php echo $pro['price'] ?></td>
                    <td><?php echo $pro['quantity'] ?></td>
                    <td>$<?php echo $pro['quantity']*$pro['price'] ?></td>
                </tr>
          <?php } ?>
          </tbody>

          </table>
          <?php else: ?>
        <div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <strong>Error login</strong> Vui lòng đăng nhập trước
        </div>
       <?php endif ?>

      </form>
  </div>
</div>
    </section>
    <!--Mid Section Ends--> 
  </div>
    
 <?php include 'footer.php'; ?>             