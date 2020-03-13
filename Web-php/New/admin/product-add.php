<?php 
include 'header.php';
$sql1 = "SELECT * FROM category";

$cats = $conn->query($sql1);
$image = '';
//$f ='';
//echo '<pre>';

//print_r($f);

//echo '</pre>';

if (!empty($_FILES['img']['name'])) {
$f = $_FILES['img'];
move_uploaded_file($f['tmp_name'], '../uploads/'.$f['name']);
$image= $f['name'];
}

$image_list = '';
  if (!empty($_FILES['anh_khac']['name'][0])) {
    $fs = $_FILES['anh_khac'];

    for ($i=0; $i < count($fs['name']); $i++) { 
      move_uploaded_file($fs['tmp_name'][$i], '../uploads/'.$fs['name'][$i]);
    }
    $image_list = json_encode($fs['name']);
  }

if(!empty($_POST['name'])) {
  $name= $_POST['name'];
  $price= $_POST['price'];
  $sale_price= $_POST['price_sale'];
  $category_id= $_POST['category_id'];
  $content= $_POST['content'];
$status= $_POST['status'];

  $sql_pro = "INSERT INTO product(name, price, sale_price, image, category_id,content,status,image_list) VALUES(?,?,?,?,?,?,?,?)";
    $stm = $conn->prepare($sql_pro);
    $kq = $stm->execute([$name, $price, $sale_price, $image, $category_id,$content,$status,$image_list]); // thực hiện truy ván, TRUE, FALSE
    if ($kq) {
      header('location: product.php');
    }else{
      print_r($conn->errorInfo());
    }

  }
  
 ?>
      <!-- Default box -->
      <div class="box">
        <div class="box-body">
          <form action="" method="POST" enctype="multipart/form-data">
            <legend>Thêm mới</legend>
          <div class="row">
            <div class="col-md-9">
              <div class="form-group">
              <label for="">Tên sản phẩm</label>
              <input type="text" class="form-control" name="name" placeholder="Input field">
            </div>
              <div class="form-group">
              <label for="">Nội dung mô tả</label>
              <textarea name="content" id="content" class="form-control"></textarea>
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
              <label for="">Gía</label>
              <input type="text" class="form-control" name="price" placeholder="Input field">
            </div>
            <div class="form-group">
              <label for="">Gía sale</label>
              <input type="text" class="form-control" name="price_sale" placeholder="Input field">
            </div>
          <div class="form-group">
                  <label for="">Danh mục sản phẩm</label>
                  <select name="category_id" class="form-control" required>
                    <?php foreach($cats as $cat) { ?>
                    <option value="<?php echo $cat['id'] ?>"><?php echo $cat['name'] ?></option>
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
                <img src="" alt="" id="show_img" width="160">
              </div>
            </div>
           
            

            
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
        <!-- /.box-body -->
      </div>
<?php include 'footer.php' ?>
