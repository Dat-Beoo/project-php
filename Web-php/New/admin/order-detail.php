<?php 
include 'header.php';
$sql = "SELECT * FROM order_detail";
$oder = $conn -> query($sql);
 ?>
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
        </div>
        <div class="box-body">
          <table class="table table-hover">
          	<thead>
          		<tr>  
                <th>Mã đơn hàng</th>
          			<th>Mã sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá tiền</th>
          		</tr>
          	</thead>
          	<tbody>
            <?php foreach($oder as $oda) { ?>
          		<tr>
                <td><?php echo $oda['order_id'] ?></td>
          			<td><?php echo $oda['product_id'] ?></td>
                <td><?php echo $oda['quantity'] ?></td>
                <td><?php echo $oda['price'] ?></td>               
          			<td>
          				<a href="" class="btn btn-xs btn-primary">Sửa</a>
          				<a href="" class="btn btn-xs btn-danger">Xóa</a>
          			</td>
          		</tr>
            <?php } ?>
          	</tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
<?php include 'footer.php' ?>