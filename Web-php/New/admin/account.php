<?php 
include 'header.php';
$sql = "SELECT * FROM account";

$account = $conn->query($sql);

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
            <?php foreach($account as $act) { ?>
          		<tr>
          			<td><?php echo $act['id'] ?></td>
                <td><?php echo $act['name'] ?></td>
                <td><?php echo $act['email'] ?></td>
                <td><?php echo $act['phone'] ?></td>
                <td><?php echo $act['password'] ?></td>
                <td><?php echo $act['address'] ?></td>
                <td><?php echo $act['level'] ?></td>
                <td><?php echo $act['created'] ?></td>
                
          			
          		</tr>
            <?php } ?>
          	</tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
<?php include 'footer.php' ?>