<?php 
include 'header.php';
$sql = "SELECT * FROM orders";

$orders = $conn->query($sql);

 ?>
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
        </div>
        <div class="box-body">
          <table class="table table-hover">
          	<thead>
          		<tr>
          			<th>ID</th>
          			<th>Tên</th>
          			<th>Email</th>
                <th>Phone</th>
          			<th>Mật khẩu</th>
                <th>Địa chỉ</th>
                <th>Level</th>
                <th>Tạo</th>
          		</tr>
          	</thead>
          	<tbody>
            <?php foreach($orders as $ord) { ?>
          		<tr>
          			<td><?php echo $ord['id'] ?></td>
                 <td><?php echo $ord['customer_id'] ?></td>
                <td><?php echo $ord['name'] ?></td>
                <td><?php echo $ord['email'] ?></td>
                <td><?php echo $ord['phone'] ?></td>
               
                <td><?php echo $ord['address'] ?></td>
                <td><?php echo $ord['status'] ?></td>
                <td><?php echo $ord['created'] ?></td>
                
          			<td>
          				<a href="order-view.php?id=<?php echo $ord['id'] ?>" class="btn btn-xs btn-primary">Xem</a>
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