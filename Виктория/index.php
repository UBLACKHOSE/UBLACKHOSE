<?php
session_start();
require_once 'HandF/header.php';
require_once 'db.php';
$db =db::getConnection();

$productList = array();

$result = $db->query("SELECT * FROM
 product ORDER BY `id` DESC LIMIT 10");

$i=0;
while ($row = $result->fetch_assoc()){
    $productList[$i]['id'] = $row['id'];
    $productList[$i]['name'] = $row['name'];
    $productList[$i]['price'] = $row['price'];
    $productList[$i]['img'] = $row['img'];
    $i++;
}

?>




	<!-- letest product section -->
	<section class="top-letest-product-section">
		<div class="container">
			<div class="section-title">
				<h2>Полезные продукты</h2>
			</div>
			<div class="product-slider owl-carousel">
                <?foreach ($productList as $product){?>
				<div class="product-item">
					<div class="pi-pic">
						<img src="./img/product/<?php echo $product['img'];?>.jpg" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>Добавить в корзину</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6><?php echo $product['price'];?>р</h6>
						<p><?php echo $product['name'];?></p>
					</div>
				</div>
                <?}?>
			</div>
		</div>
	</section>
	<!-- letest product section end -->







    <?php
    require_once 'HandF/footer.php';
    ?>
