<?php 
include 'header.php';

$id = $_GET['id'];

$sql = "SELECT * FROM product WHERE id= $id";
$pro = $conn->query($sql)->fetch();
$image_list = json_decode($pro['image_list']);

?>

<div class="box-boy">
	<div class="row">
		<div class="col-md-5">
			<img src="../uploads/<?php echo $pro['image'] ?>" alt="" class="img-responsive">

			<div class="row">
			<?php if(is_array($image_list)) {
			 foreach($image_list as $img) { ?>
				<div class="col-md-3">
					<a href="" class="thumbnail">
						<img src="../uploads/<?php echo $img; ?>" alt="">
					</a>
				</div>
			<?php } } ?>
			</div>
		</div>
		<div class="col-md-7">
			<h1><?php echo $pro['name'] ?></h1>
			<h2><?php echo number_format($pro['price']) ?> Đ</h2>
			<div class="content">
				<?php echo $pro['content'] ?>
			</div>

		</div>
	</div>
</div>

<?php 

include 'footer.php'; ?>