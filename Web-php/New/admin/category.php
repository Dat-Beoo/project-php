<?php 
include 'header.php';
$sql = "SELECT c.id, c.name, c.status, COUNT(p.id) as 'total_product' FROM category c
JOIN product p ON p.category_id = c.id GROUP BY c.id";

$cats = $conn->query($sql);

 ?>
      
      <div class="box">
        <div class="box-header with-border">
        </div>
        <div class="box-body">
          <table class="table table-hover">
          	<thead>
          		<tr>
          			<th>ID</th>
          			<th>Tên danh mục</th>
          			<th>Trạng thái</th>
                <th>Tổng sản phẩm</th>
          			<th></th>
          		</tr>
          	</thead>
          	<tbody>
            <?php foreach($cats as $cat) { ?>
          		<tr>
          			<td><?php echo $cat['id'] ?></td>
                <td><?php echo $cat['name'] ?></td>
                <td><?php echo $cat['status'] ?></td>
              <td><?php echo $cat['total_product'] ?></td>
          			<td>
          				<a href="" class="btn btn-xs btn-primary">Sửa</a>
          				<a href="" class="btn btn-xs btn-danger">Xóa</a>
          			</td>
          		</tr>
            <?php } ?>
          	</tbody>
          </table>
        </div>
      </div>
<?php include 'footer.php' ?>