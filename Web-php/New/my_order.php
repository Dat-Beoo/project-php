
<?php include 'header.php'; ?>

<div class="section_container"> 
    <section> 
      <div id="shopping_cart" class="full_page">
        <h1>Orders History</h1>
        
        <div class="cart_table">
        	<?php if(isset($_SESSION['cus_login'])) : 
			$cus = $_SESSION['cus_login'];
			$cus_id = $cus['id'];

			$sql = "SELECT o.*,SUM(dt.price*dt.quantity) total FROM orders o JOIN order_detail dt ON o.id = dt.order_id WHERE o.customer_id = $cus_id GROUP By o.id";
			$orsers = $conn->query($sql)->fetchAll();


		?>
          <form action="xu-ly-gio-hang.php">
          <input type="hidden"  name="action" value="update">
          <table class="data-table cart-table" id="shopping-cart-table" cellpadding="0" cellspacing="0">
            <thead>
        		<tr>
        			<th>STT</th>
        			<th>Date</th>
        			<th>Total</th>
        			<th>Status</th>
        			<th></th>
        		</tr>
        	
        	</thead>
           <tbody>
        	<?php foreach($orsers as $k => $od) { ?>
        		<tr>
        			<td><?php echo $k+1; ?></td>
        			<td><?php echo $od['created'] ?></td>
        			<td><?php echo number_format($od['total']) ?></td>
        			<td>
        				<?php if($od['status'] == 1) : ?>
        					<div class="buttons-set">
                                            <button  class="button brown_btn" type="submit">Đã Duyệt</button>
                                        </div>
        				<?php else: ?>
							<div class="buttons-set">
                                            <button  class="button brown_btn" type="submit" style="font-size: 10px; border: none;">Chờ Duyệt</button>
                                        </div>
        				<?php endif; ?>
        			</td>
        			<td>
        				<div class="buttons-set">
                                            <button  class="button brown_btn" type="submit"><a href="my_order_detail.php?od_id=<?php echo $od['id'];?>" class="btn btn-xs btn-primary" style="color: white;">Detail</a></button>
                                        </div>
        				
        			</td>
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