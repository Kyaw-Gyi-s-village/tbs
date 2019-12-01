<header class="hk-cat-title">
	<span class="hk-line"></span>
	<h2><?php $title = strstr($pg_title, " | The", true); echo strtoupper($title) ?></h2>
</header>

<section class="wp-category-item"><!-- display items related title -->
	<?php foreach($data as $item): if($item['status']==1): $photos = get_item_photos($item['id']); $photo = $photos[0]['name']?>
		<article class="wp-item-box"><!-- display items where status is 1 and order by items' order number -->
			<a href="<?php echo $url ?>/item/detail/<?php echo $item['id'] ?>">
				<div><!-- display image -->
					<img src="<?php echo $url_file ?>/pg_admin/item_gallary/<?php echo $photo?>" alt="<?php echo $item['item_name']?>" class="hk-id-js" style="object-fit: cover">
					<div class="wp-item-photo">Detail</div><!--to know that it is link-->
				</div><!-- end of display image -->

				<?php if($item['discount_percent']!=0): ?>
					<div class="wp-discount"><p><?php echo $item['discount_percent'] ?>%</p></div><!--discount amount-->
				<?php endif; ?>

				<div class="wp-item-detail"><!-- display item info -->
					<h3 class="wp-item-name" title="Item name"><?php echo $item['item_name']?></h3>
					<div class="wp-item-code" title="Item code"><?php echo $item['item_code']?></div>

					<!--calcs item price-->
					<?php if($item['discount_percent']==0): ?>
						<span class="wp-item-unit-price" title="Price" data-prc="<?php echo $item['price']*(100-$item['discount_percent'])/100 ?>">
							<?php echo number_format($item['price']) ?>Ks
						</span>
					<?php else: ?>
						<span class="wp-item-unit-price" title="Price" data-prc="<?php echo $item['price']*(100-$item['discount_percent'])/100 ?>">
							<?php echo number_format($item['price']*(100-$item['discount_percent'])/100) ?>Ks
						</span>
						<span class="wp-item-discount-price" title="Price">
							<?php echo number_format($item['price']) ?>Ks
						</span>
					<?php endif; ?>
				</div><!-- end of display item info -->
			</a>

				<div class="wp-item-button"><!-- button group -->
					<button class="wp-buynow" data-id="<?php echo $item['id'] ?>">Buy now</button>
					<button class="wp-addtocart" data-id="<?php echo $item['id'] ?>">
						<i class="fas fa-cart-plus"><span class="wp-tooltip">Add to cart</span></i>
					</button>
				</div><!-- end of button group -->
		</article><!-- end ofdisplay items where status is 1 and order by items' order number -->
	<?php endif; endforeach; ?>
</section><!-- end of display items related title -->

<script src="<?php echo $url_file ?>/scripts/add_to_cart.js"></script>
<script src="<?php echo $url_file ?>/scripts/item.js"></script>
