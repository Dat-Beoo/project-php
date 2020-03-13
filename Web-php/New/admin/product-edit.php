<?php 
include 'header.php';
  $sql1 = "SELECT * FROM category";
  $cats = $conn->query($sql1);
$id = $_GET['id'];

$sql = "SELECT * FROM product WHERE id=$id";

$pro = $conn->query($sql)->fetch();


$image = $pro['image'];
// upload ảnh vào thư mục uploads
   if (!empty($_FILES['img']['name'])) {
    $f = $_FILES['img'];
    move_uploaded_file($f['tmp_name'], '../uploads/'.$f['name']);
    $image= $f['name'];
  }

// lấy dữ liệu trên form
  if (!empty($_POST['name'])) {
    $name= $_POST['name'];
    $price= $_POST['price'];
    $sale_price= $_POST['sale_price'];
    $category_id= $_POST['category_id'];
    $content= $_POST['content'];
    $status= $_POST['status'];

    $sql_pro = "UPDATE product SET name=?,price=?,sale_price=?,image=?,category_id=?,content=?,status=? WHERE id=?";
    $stm = $conn->prepare($sql_pro);
    $kq = $stm->execute([$name, $price, $sale_price, $image, $category_id,$content,$status,$id]); // thực hiện truy ván, TRUE, FALSE
    if ($kq) {
      header('location: product.php');
    }else{
      print_r($conn->errorInfo());
    }

  }
?>

<div class="box">
        <div class="box-body">
          <form action="" method="POST" enctype="multipart/form-data">
            <legend>Form thêm mới</legend>
            <div class="row">
              <div class="col-md-9">
                 <div class="form-group">
                  <label for="">Tên sản phẩm</label>
                  <input type="text" class="form-control" name="name" value="<?= $pro['name'];?>">
                </div>

                <div class="form-group">
                  <label for="">Nội dung mô tả</label>
                  <textarea name="content" id="content" class="form-control"><?= $pro['content'];?></textarea>
                </div>
                <div class="form-group">
              <label for="">Các ảnh khác</label>
              <input type="file" name="anh_khac[]" id="anh_khac" multiple>
              <div id="img_list">
                    
              </div>
            </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                    <label for="">Giá</label>
                    <input type="text" class="form-control" name="price" value="<?= $pro['price'];?>">
                  </div>
                  <div class="form-group">
                    <label for="">Giá sale</label>
                    <input type="text" class="form-control" name="sale_price" value="<?= $pro['sale_price'];?>">
                  </div>
                  <div class="form-group">
                    <label for="">Danh mục sản phẩm</label>
                    <select name="category_id" class="form-control" required>
                      <option value="">Vui lòng chọn</option>
                      <?php foreach($cats as $cat) { 
                        $slt = $cat['id'] == $pro['category_id'] ? 'selected' :'';
                      ?>
                      <option <?=$slt;?> value="<?php echo $cat['id'] ?>"><?php echo $cat['name'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Trạng thái</label>
                    <div class="radio">
                      <label>
                        <input type="radio" name="status" value="0" >
                        Ẩn
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="status" value="1" checke>
                        Hiển thị
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="status" value="2" >
                        Mới nhất
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="status" value="3" >
                        Nổi bật
                      </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="">Ảnh sản phẩm</label>
                    <input type="file" name="img" id="anh">
                  </div>
                  <img src="../uploads/<?= $pro['image'];?>" id="show_img" width="160">
            
              </div>
            </div>
           
            
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
        <!-- /.box-body -->
      </div>
<?php include 'footer.php'; ?>