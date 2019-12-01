<header id="item-header">
	<h1>Order Detail</h1>
	<a href="<?php echo $url ?>/pg_admin/order/new_list" class="new">New</a>
	<a href="<?php echo $url ?>/pg_admin/order/completed_list" class="new">Complete</a>
</header>
<section><!--Display User Info-->
  <?php $order = get_order($id) ?>
  <table class="hk-customer-info-table">
		<tr>
		  <td>Name:</td>
		  <td><?php echo $order['name'] ?></td>
		</tr>
		<tr>
		  <td>Phone:</td>
		  <td><?php echo $order['phone'] ?></td>
		</tr>
		<tr>
		  <td>Address:</td>
		  <td><?php echo $order['address'] ?></td>
		</tr>
		<tr>
		  <td>Remark:</td>
		  <td><?php echo $order['remark'] ?></td>
		</tr>
  </table>
</section>

<section><!--Display items list-->
  <table class="ky-account-table">
  	<thead>
  		<tr>
  			<th class="ky-no">No.</th>
			  <th>Image</th>
			  <th>Product Name</th>
			  <th>Remark</th>
			  <th>Quantity</th>
			  <th>Unit Price</th>
			  <th>Price</th>
		   </tr>
  	</thead>

  	<tbody>
	    <?php $count=1; foreach($data as $order_items): ?>
	      <tr>
	      	<td class="ky-no-tr"><?php echo $count++ ?></td>
	      	<td>
			  <img src="<?php echo $url_file ?>/pg_admin/item_gallary/<?php $name = get_item_photo($order_items['item_id']); echo $name['name']  ?>" width="64px" height="64px">
			</td>
			<td><?php echo $order_items['item_name']?></td>
			<td><?php echo $order_items['remark']?></td>
			<td><?php echo $order_items['qty']?></td>
			<td class="ky-no-tr">
				<?php if($order_items['discount_percent']==0): ?>
					<span>
						<?php echo $order_items['price'] ?>Ks
					</span>
				<?php else: ?>
					<span>
						<?php echo $order_items['price']*(100-$order_items['discount_percent'])/100?>Ks
					</span>
				<?php endif; ?>
			</td>
			<td class="ky-no-tr"><?php echo (($order_items['price']*(100-$order_items['discount_percent'])/100)*$order_items['qty'])?>Ks</td>
	      </tr>
	    <?php endforeach; ?>
    </tbody>
   </table>
</section>
