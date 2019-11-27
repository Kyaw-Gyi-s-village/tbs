<section class="detail-about-items">
<section class="wp-detail-photos"><!-- show item photos -->
	<div class="wp-zoom" style="background-image: url(<?php echo $url_file ?>/pg_admin/item_gallary/<?php echo $data['item_code'].'_id_'.$data['id'].'_0'.'.jpg'?>)">
		<img src="<?php echo $url_file ?>/pg_admin/item_gallary/<?php echo $data['item_code'].'_id_'.$data['id'].'_0'.'.jpg'?>" alt="<?php echo $data['item_name']?>" id="wp-default-photo" style="object-fit: cover">
	</div><!--show main photo-->

	<div class="photo-overlay"><!-- photo overlay -->
		<span id="photo-overlay-close"><i class="far fa-times-circle"></i></span>
		<img src="<?php echo $url_file ?>/pg_admin/item_gallary/<?php echo $data['item_code'].'_id_'.$data['id'].'_0'.'.jpg'?>" alt="<?php echo $data['item_name']?>" id="wp-img-target" style="object-fit: cover">
	</div>
	<div><!--Other photos-->
		<?php for($i=0; $i<$data['photo_qty']; $i++): ?>
		  <img src="<?php echo $url_file ?>/pg_admin/item_gallary/<?php echo $data['item_code'].'_id_'.$data['id'].'_'.$i.'.jpg'?>" alt="<?php echo $data['item_name']?>" class="wp-product-photo" id="wp-photo<?php echo $i+1?>" width="64px" height="64px" style="object-fit: cover">
		<?php endfor; ?>
	</div>
  <a href="#hk-target-about"><div id="wp-detail-about">About product</div></a><!--Item info detail-->
</section><!-- end of show item photos -->

<section class="wp-detail-form"><!-- item info -->
	<form action="<?php echo $url ?>/cart/add/" method="post">
	<input type="hidden" name="id" value="<?php echo $data['id'] ?>">
	<table>
	  <tr>
			<td class="wp-detail-form-left">Name:</td>
			<td id="wp-detail-item-name" class="wp-detail-form-right"><?php echo $data['item_name'] ?></td>
	  </tr>
	  <tr>
			<td class="wp-detail-form-left">Product code:</td>
			<td id="wp-detail-item-code" class="wp-detail-form-right"><?php echo $data['item_code'] ?></td>
	  </tr>
	  <tr>
			<td class="wp-detail-form-left">Unit price:</td>
			<td id="wp-detail-item-unit-price" class="wp-detail-form-right" data-prc="<?php echo $data['price']*(100-$data['discount_percent'])/100?>">
			  <?php if($data['discount_percent']==0): ?>
					<span>
					  <?php echo $data['price'] ?>&nbsp;Ks
					</span>
			  <?php else: ?>
					<span><?php echo $data['price']*(100-$data['discount_percent'])/100?>&nbsp;Ks</span>
					<span id="wp-discount-price"><?php echo $data['price'] ?>&nbsp;Ks</span>
			  <?php endif; ?>
			</td>
	  </tr>
	  <tr>
	    <td class="wp-detail-form-left">Quantity:</td>
			<td class="wp-detail-form-right">
				<div class="quantity" id="button">
					<input type="button" value="-" class="minus">
					<input type="number" step="1" min="1" max="<?php echo $data['stock'] ?>" name="quantity" value="1" class="input-text qty" id="quan">
					<input type="button" value="+" class="plus">
				</div>
			</td>
	  </tr>
	  <tr>
			<td class="wp-detail-form-left">Total price:</td>
			<td id="wp-detail-item-total-price" class="wp-detail-form-right"><span id="hk-amount-js"><?php echo $data['price']*(100-$data['discount_percent'])/100?></span>&nbsp;Ks</td>
	  </tr>
	  <tr>
			<td class="wp-detail-form-left">Remark:</td>
			<td id="wp-detail-remark" class="wp-detail-form-right"><textarea placeholder="Please write your opinion." name="remark"></textarea></td>
	  </tr>
  </table>

  <div class="wp-detail-button" id="hk-target-about">
  	<input type="button" value="Buy Now" class="wp-detail-buynow" data-id="<?php echo $data['id'] ?>">
    <button class="wp-detail-addtocart">Add to cart
			<i class="fas fa-shopping-cart wp-detail-addtocart-icon"></i>
		</button>
	</div>
  </form>
</section>
</section>

<section class="related-bar">
  <?php # the following aside is only show on laptop display ?>
	<aside class="related-wrap"><!-- To display related items -->
	  <h2 id="related-name">Related Items</h2>
	  <section class="related-items">
	  	<div class="related-arrows">
	  		<button id="related-up"><i class="far fa-caret-square-left"></i></button>
	  		<button id="related-down"><i class="far fa-caret-square-right"></i></button>
	  	</div>
	  	<div class="related-photo-box">
	  		<div class="related-photo-border">
			  <?php $related_item = get_same_cat_items($data['category_id']); foreach($related_item as $item): ?>
				  <a href="<?php echo $url ?>/item/detail/<?php echo $item['id'] ?>" class="related-photos">
						<img src="<?php echo $url_file ?>/pg_admin/item_gallary/<?php echo $item['item_code'].'_id_'.$item['id'].'_0'.'.jpg'?>" alt="<?php echo $item['item_name'] ?>" style="object-fit: cover">
						<div class="related-item-info">
							<span id="related-item-name">Item name</span>
							<span id="related-item-price">Item price</span>
						</div>
				  </a>
				<?php endforeach; ?>
			</div>
		</div>
		</section>
	</aside><!-- end of To display related items -->

</section><!-- end of item info -->

<section class="wp-about-product" id="wp-about-product">
	<div class="wp-about-container">
		<div class="wp-about-header">
			<button id="wp-about-left"><i class="fas fa-caret-left"></i></button>
			<span id="wp-zawgyi">Zawgyi</span>
			<span id="wp-unicode" style="display: none;">Unicode</span>
			<button id="wp-about-right"><i class="fas fa-caret-right"></i></button>
		</div>
		<div class="wp-about">
			<span id="wp-about-zawgyi"><?php echo $data['summary_zawgyi'] ?></span>
  		<span id="wp-about-unicode" style="display: none;"><?php echo $data['summary_unicode'] ?></span>
		</div>
	</div>
</section><!-- end of display item info detail -->


<script src="<?php echo $url_file ?>/scripts/item_detail.js"></script>
