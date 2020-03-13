<?php 
include 'header.php';
$sql = "SELECT * FROM banner";

$banner = $conn->query($sql);

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
          			<th>Anh</th>
                <th>Đặt hàng</th>
          			<th>Trạng thái</th>
                <th>Tạo</th>
                
          		</tr>
          	</thead>
          	<tbody>
            <?php foreach($banner as $bn) { ?>
          		<tr>
          			<td><?php echo $bn['id'] ?></td>
                <td><?php echo $bn['name'] ?></td>
                <td><?php echo $bn['image'] ?></td>
               
                <td><?php echo $bn['ordering'] ?></td>
                <td><?php echo $bn['status'] ?></td>
                <td><?php echo $bn['created'] ?></td>
                
                
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