<header id="item-header">
	<h1>Manage Accounts</h1>
	<button class="hk-create-js header-button">+ &nbsp;New</button>
</header>
<section ><!--admin accounts list-->
	<table class="ky-account-table">
		<thead>
			<tr>
				<th class="ky-check-tr"><input type="checkbox"  disabled="disabled"/></th>
				<th class="ky-no">No.</th>	
				<th>Username</th>
				<th>Delete</th>		
		  </tr>
		</thead>	  
	  <tbody>
		  <?php $count=1; foreach($data as $order):?>
		  <tr>
				<td class="ky-check-tr">
					<?php if($order['permission'] == 1): ?>
						<input type="checkbox" class="hk-edit-per-js" data-id="<?php echo $order['id'] ?>" checked="checked">
					<?php else: ?>
						<input type="checkbox" class="hk-edit-per-js" data-id="<?php echo $order['id'] ?>">
					<?php endif; ?>
				</td>
				<td class="ky-no-tr">
					<?php echo $count++; ?>
				</td>
				<td><?php echo $order['username'] ?></td>
				<td class="ky-delete-tr">
					<div class="item-delete">
						<a href="<?php echo $url ?>/pg_admin/login/remove/<?php echo $order['id'] ?>">
							<img src="<?php echo $url_file ?>/pg_admin/icons/delete.png" alt="delete" title="delete">
						</a>
					</div>
				</td>
		  </tr>
		  <?php endforeach; ?>
	  </tbody>
	</table>
</section>

<!-- Add category, this is overlay -->
<div class="wp-overlay" id="modal" >
	<article class="wp-dialog">
		<header class="wp-overlay-header">
			<span id="wp-overlay-name">Create Account</span>
			<span id="wp-overlay-close">&times;</span>
		</header>
		<section><!-- created form -->
			<form action="<?php echo $url ?>/pg_admin/login/add/" method="post">
				<label for="username">Username:</label>
				<input type="text" id="username" name="username" required="required">
				<label for="password">Password:</label>
				<input type="password" id="password" name="password" required="required">
				<br><br>
				<span id="admin-overlay-button"><input type="submit" value="Create"></span>
			</form>
		</section><!-- end of created form -->
	</article>
</div><!-- End of add category, this is overlay -->
<script src="<?php echo $url_file ?>/pg_admin/scripts/account_list.js"></script>