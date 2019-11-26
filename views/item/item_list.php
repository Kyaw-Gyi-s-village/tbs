<section id="promo"><!-- Promo area -->
	<!-- promo text -->
	<article id="promo-text"><?php $promo_text = get_promo_text(); echo $promo_text['promo_text'] ?></article>

	<article class="slideshow-wrapper"><!-- promo Banner -->
		<div id="slideshow">
			<?php $pnum = 1; $promo_photos = get_promo_photos(); foreach( $promo_photos as $promo_photo): ?>
				<img src="<?php echo $url_file ?>/pg_admin/promo_photos/pp<?php echo $promo_photo['id']?>.jpg" id="slide<?php echo $pnum++ ?>"style="object-fit: cover">
			<?php endforeach; ?>
		</div>
		<div class="circle-wrapper">
			<?php for($i=1; $i<$pnum; $i++): ?>
				<div id="circle<?php echo $i ?>" class="circle"></div>
			<?php endfor; ?>
		</div>
		<div class="slide-button">
			<i class="fas fa-chevron-circle-left prev"></i>
			<i class="fas fa-chevron-circle-right next"></i>
		</div>
	</article><!-- end ofpromo Banner -->
</section><!-- end of promo area -->

<section><!-- Display all item each category -->
	<?php $cats = get_all_cats(); foreach($cats as $cat): if($cat['status'] == 1): ?>
		<article data-current_slide="0"><!-- display items in each category order by categories' order number-->
			<header class="wp-category-top">
				<span class="hk-line"></span>
				<a href="<?php echo $url ?>/item/item_same_cat_list/<?php echo $cat['id']?>"><h2 class="wp-category-name"><?php echo strtoupper($cat['category_name']) ?></h2></a>
				<div class="wp-category-button"><!-- button group -->
					<button class="wp-left"><i class="fas fa-angle-left wp-category-left-button"></i></button>
	  			<button class="wp-right"><i class="fas fa-angle-right wp-category-right-button"></i></button>
				</div><!-- end of button group -->
			</header>

			<section class="wp-category-item"><!-- display items related title -->
				<?php $data = get_all_items(); $item_num=0; foreach($data as $item): if( $item['category_id']===$cat['id'] && $item['status']==1 ): ?>
					<article class="wp-item-box hk-item-<?php echo $item_num++?>"><!-- display items where status is 1 and order by items' order number -->
						<a href="<?php echo $url ?>/item/detail/<?php echo $item['id'] ?>">
							<div><!-- display image -->
								<img src="<?php echo $url_file ?>/pg_admin/item_gallary/<?php echo $item['item_code'].'_id_'.$item['id'].'_0'.'.jpg'?>" class="hk-id-js" style="object-fit: cover">
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
									<span class="wp-item-unit-price" data-prc="<?php echo $item['price']*(100-$item['discount_percent'])/100 ?>" title="Price">
										<?php echo $item['price'] ?>Ks
									</span>
								<?php else: ?>
									<span class="wp-item-unit-price" data-prc="<?php echo $item['price']*(100-$item['discount_percent'])/100 ?>" title="Price">
										<?php echo number_format($item['price']*(100-$item['discount_percent'])/100)?>Ks
									</span>
									<span class="wp-item-discount-price" title="Price">
										<?php echo number_format($item['price']) ?>Ks
									</span>
								<?php endif; ?>
							</div><!-- end of display item info -->
						</a>

						<div class="wp-item-button"><!-- button group -->
							<button class="wp-buynow" data-id="<?php echo $item['id'] ?>" >Buy now</button>
							<button class="wp-addtocart" data-id="<?php echo $item['id'] ?>">
								<i class="fas fa-cart-plus"><span class="wp-tooltip">Add to cart</span></i>
							</button>
							<span id="wp-addtocart-clone"><i class="fas fa-plus-circle"></i></span>
						</div><!-- end of button group -->
					</article><!-- end ofdisplay items where status is 1 and order by items' order number -->
				<?php endif; endforeach; ?>
			</section><!-- end of display items related title -->
		</article><!-- end of display items in each category order by categories' order number-->
	<?php endif; endforeach; ?>
</section><!-- end of display all item each category -->
<script src="<?php echo $url_file ?>/scripts/add_to_cart.js"></script>
<script src="<?php echo $url_file ?>/scripts/item.js"></script>
<script src="<?php echo $url_file ?>/scripts/item_list.js"></script>
