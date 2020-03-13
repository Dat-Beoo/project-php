<?php 
include 'header.php';
  $sql = "SELECT * FROM product";
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
          			<th></th>
          		</tr>
          	</thead>
          	<tbody>
          		<tr ng-repeat="p in products | filter:search" ng-dblclick="show_pro(p)">
          			<td>{{p.id}}</td>
                <td>
                  <img ng-src="../uploads/{{p.image}}" alt="" width="60">
                </td>
                <td>{{p.name}}</td>
                <td>{{p.price | currency:"":0}} VND</td>
                <td>{{p.category_id}}</td>
          			<td>
          				<a href="" class="btn btn-xs btn-primary">Sửa</a>
          				<a href="" class="btn btn-xs btn-danger">Xóa</a>
          			</td>
          		</tr>
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