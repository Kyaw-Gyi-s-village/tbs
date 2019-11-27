<section class="ky-table-container"><!--show items in the cart-->
  <table class="ky-table ky-cart-table">
  	<caption class="ky-deli-cap">Shopping Cart<i class="ky-truk fas fa-shopping-cart"></i></caption>
		<thead>
	  	<tr>
			  <th>Image</th>
			  <th>Product Name</th>
			  <th>Item code</th>
			  <th>Quantity</th>
			  <th>Unit Price</th>
			  <th>Total(Ks)</th>
			  <th>Remark</th>
			  <th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php
			  $total = 0; $total_price=0; $count=0;
			  foreach($_SESSION['cart'] as $id => $qty):
				$item = get_one_item($id);
			?>
				<tr>
				  <td>
				  	<img src="<?php echo $url_file ?>/pg_admin/item_gallary/<?php echo $item['item_code'].'_id_'.$item['id'].'_0'.'.jpg'?>" alt="<?php echo $item['item_name']?>" width="64px" height="64px" class="hk-item-img-table">
				  </td>
				  <td><?php echo $item['item_name']?></td>
				  <td><?php echo $item['item_code']?></td>
				  <td>
				  	<div class="quantity" id="button" data-id="<?php echo $item['id'] ?>">
					  	<input type="button" value="-" class="minus">
							<input type="number" step="1" min="1" max="<?php echo $item['stock'] ?>" name="quantity" value="<?php echo $qty ?>" class="input-text qty">
							<input type="button" value="+" class="plus">
						</div>
				  </td>
				  <td class="hk-price-js" data-prc="<?php echo $item['price']*(100-$item['discount_percent'])/100?>">
						<?php if($item['discount_percent']==0): ?>
						<span>
							<?php echo number_format($item['price']) ?>Ks
						</span>
						<?php else: ?>
						<span>
							<?php echo number_format($item['price']*(100-$item['discount_percent'])/100) ?>Ks
						</span>
						<?php endif; ?>
				  </td>
				  <td>
				  	<span class="hk-total-price-js hk-total-price-js<?php echo $count++?>">
				  		<?php
					  		echo number_format(($item['price']*(100-$item['discount_percent'])/100)*$qty);
					  		$total_price+=(($item['price']*(100-$item['discount_percent'])/100)*$qty)
					  	?>
				  	</span>Ks
				  </td>
				  <td>
				    <?php
					  $remarkstr="";
					  if(isset($_SESSION['remark']))
					  {
						foreach($_SESSION['remark'] as $remark_id => $remark)
						{
						  if($remark_id == $id)
							$remarkstr = $remark;
						}
					  }
				    ?>
				    <textarea name="remark" class="hk-remark-txt-js" data-id="<?php echo $item['id'] ?>"><?php if($remarkstr!="") echo $remarkstr; ?></textarea>
				  </td>
				  <td>
				  	<a href="<?php echo $url ?>/cart/delete_order/<?php echo $item['id']?>">
					  <img src="<?php echo $url_file ?>/icons/dust_bin_close.png" class="dust_bin">
					</a>
				  </td>
				</tr>
			<?php endforeach;?>
		</tbody>
  </table>
</section>

<div class="hk-price-container">
	<span>Total : </span><span id="hk-total-amount-js"><?php echo number_format($total_price) ?></span> Ks
</div>

<section class="cart-form-container">
	<h3 id="cart-form-header">Your Informations</h3>
  <form action="<?php echo $url ?>/order/submit_from_cart/" method="post" class="cart-form">

  	<input type="text" name="name" class="cart-form-input" placeholder="Name" required="required">
  		<span class="cart-form-border"></span>

  	<input type="number" name="phone" class="cart-form-input" placeholder="Phone" required="required">
  		<span class="cart-form-border"></span>

  	<textarea class="cart-form-tarea cart-form-input" name="address" placeholder="Address" required="required"></textarea>
  		<span class="cart-form-border"></span>

  	<textarea class="cart-form-tarea cart-form-input" name="remark" placeholder="Remark"></textarea>
  		<span class="cart-form-border"></span>

  	<input type="submit" value="Buy" class="cart-form-buy">
  </form>
</section>
<script src="<?php echo $url_file ?>/scripts/add_to_cart.js"></script>
<script src="<?php echo $url_file ?>/scripts/cart_list.js"></script>
