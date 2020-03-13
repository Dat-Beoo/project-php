<?php 
include 'header.php';
  $sql = "SELECT * FROM post";
  $posts = $conn->query($sql);
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
                <th>Tên</th>
                <th>ảnh</th>
                <th>Nội Dung</th>
                <th>Trạng thái</th>
                <th>Ngày Tạo</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($posts as $pot) { ?>
              <tr>
                <td><?php echo $pot['id'] ?></td>
                
                <td><?php echo $pot['name'] ?></td>
                <td>
                  <img src="../uploads/<?php echo $pot['image'] ?>" alt="" width="60">
                </td>
                <td><?php echo $pot['content'] ?></td>
               
                <td>
                  <?php if($pot['status'] == 0) { ?>
                    <span class="label label-danger">Duyệt</span>
                  <?php } else if($pot['status'] == 1) { ?>
                    <span class="label label-success">Chưa Duyệt</span>
                  <?php } else{ ?>
                    <span class="label label-danger">Đã Giao Hàng</span>
                  <?php } ?>
                </td>
                
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
<?php include 'footer.php' ?>


