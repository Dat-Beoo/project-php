<?php 
include 'header.php';
$sql = "SELECT * FROM customer";

$customer = $conn->query($sql);

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
                <th>Gender</th>
          			<th>Birthday</th>
                <th>Passworld</th>
                <th>Phone</th>
                <th>Address</th>
          		</tr>
          	</thead>
          	<tbody>
            <?php foreach($customer as $cus) { ?>
          		<tr>
          			<td><?php echo $cus['id'] ?></td>
                <td><?php echo $cus['name'] ?></td>
                <td><?php echo $cus['email'] ?></td>
                <td><?php echo $cus['gender'] ?></td>
                <td><?php echo $cus['birthday'] ?></td>
                <td><?php echo $cus['password'] ?></td>
                <td><?php echo $cus['phone'] ?></td>
                <td><?php echo $cus['address'] ?></td>
                
          			<td>
          				
          			</td>
          		</tr>
            <?php } ?>
          	</tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
<?php include 'footer.php' ?>