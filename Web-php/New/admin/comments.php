<?php 
include 'header.php';
$sql = "SELECT * FROM comments";

$cmt = $conn -> query($sql);

 ?>
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
        </div>
        <div class="box-body">
          <table class="table table-hover">
          	<thead>
          		<tr>
          			<th>ID khách hàng</th>
          			<th>ID sản phẩm</th>
                <th>Tên khách hàng</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Nội dung</th>
                <th>Trạng thái</th>
                <th>Ngày đăng</th>
          		</tr>
          	</thead>
          	<tbody>
            <?php foreach($cmt as $com) { ?>
          		<tr>
                <td><?php echo $com['account_id'] ?></td>
                <td><?php echo $com['product_id'] ?></td>
                <td><?php echo $com['name'] ?></td> 
                <td><?php echo $com['email'] ?></td>
                <td><?php echo $com['phone'] ?></td>
                <td><?php echo $com['content'] ?></td>
                <td><?php echo $com['status'] ?></td>
                <td><?php echo $com['created'] ?></td>
          			<td>
          				<a href="" class="btn btn-xs btn-primary">Duyệt</a>
          				<a href="" class="btn btn-xs btn-danger">Chờ Duyệt</a>
          			</td>
          		</tr>
            <?php } ?>
          	</tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
<?php include 'footer.php' ?>