<?php 
include 'header.php';
  $sql = "SELECT * FROM product Order By id DESC";
  $product = $conn->query($sql);
?>
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <input class="form-control" ng-model="search" placeholder="Input search">
        </div>
        <div class="box-body">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Danh mục</th>
                <th>Trạng thái</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($product as $pro) { ?>
                <td><?php echo $pro['id'] ?></td>
                <td>
                  <img src="../uploads/<?php echo $pro['image'] ?>" alt="" width="60">
                </td>
                <td><?php echo $pro['name'] ?></td>
                <td><?php echo $pro['price'] ?> VND</td>
                <td><?php echo $pro['category_id'] ?></td>
                <td>
                  <?php if($pro['status'] == 0) { ?>
                    <span class="label label-danger">Ẩn</span>
                  <?php } else if($pro['status'] == 1) { ?>
                    <span class="label label-success">Hiển thị</span>
                  <?php } else if($pro['status'] == 2) { ?>
                    <span class="label label-success">Mới nhất</span>
                  <?php } else{ ?>
                    <span class="label label-danger">Ẩn</span>
                  <?php } ?>
                </td>
                <td>
                  <a href="product-view.php?id=<?php echo $pro['id'] ?>" class="btn btn-xs btn-danger">Xem</a>
                  <a href="product-edit.php?id=<?php echo $pro['id'] ?>" class="btn btn-xs btn-primary">Sửa</a>
                  <a href="product-delete.php?id=<?php echo $pro['id'] ?>" class="btn btn-xs btn-danger" onclick="return confirm('bạn có chắc là muố xóa không ?')">Xóa</a>
                </td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
<?php include 'footer.php' ?>


<div class="modal fade" id="modal-pro">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">{{view.name}}</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>