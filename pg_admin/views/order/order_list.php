<header id="item-header">
	<h1>Order List</h1>
	<a href="<?php echo $url ?>/pg_admin/order/new_list" class="new">New</a> 
	<a href="<?php echo $url ?>/pg_admin/order/completed_list" class="new">Complete</a>
</header>

<section><!--Display Orders list-->
  <table class="ky-account-table hk-table-width">
  	<thead>  	
			<tr>
			  <th class="ky-check-tr">Complete</th>
			  <th class="ky-check-tr">Detail</th>
			  <th>Name</th>
			  <th>Phone</th>
			  <th>Address</th>
			  <th>Remark</th>
			  <th>Date</th>			
			</tr>
		</thead>
		<tbody>
			<?php foreach($data as $order):?>
			<tr>
			  <td class="ky-check-tr">
				<?php if($order['status'] == 1): ?>
					<input type="checkbox" class="hk-edit-status-js" data-id="<?php echo $order['id'] ?>" checked="checked">
				<?php else: ?>
					<input type="checkbox" class="hk-edit-status-js" data-id="<?php echo $order['id'] ?>">
				<?php endif; ?>
			  </td>
			  <td class="ky-check-tr">
					<a href="<?php echo $url ?>/pg_admin/order/order_detail/<?php echo $order['id'] ?>"><i class="fas fa-exclamation-circle"></i></a>
			  </td>
			  <td><?php echo $order['name'] ?></td>
			  <td><?php echo $order['phone'] ?></td>
			  <td><?php echo $order['address'] ?></td>
			  <td><?php echo $order['remark'] ?></td>
			  <td><?php echo $order['created_date'] ?></td>				
			</tr>
			<?php endforeach; ?>
		</tbody>
  </table>
</section>

<script src="<?php echo $url_file ?>/pg_admin/scripts/order_list.js"></script>