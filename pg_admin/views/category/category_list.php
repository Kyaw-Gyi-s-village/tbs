<header id="item-header">
  <h1>Category List</h1>
  <button class="wp-buynow header-button">+&nbsp; Add</button>
</header>

<section class="hk-cat-wrap"><!-- Display all categories -->
	<button class="header-button hk-edit-list-js" title="edit list">edit</button>
	<button class="header-button hk-done-list-js" title="">done</button>
  <ul id="sortable">
		<?php foreach($data as $cat): ?>
		<li class="hk-sortable-list" data-id="<?php echo $cat['id'] ?>">
		  <?php if ($cat['status'] == 1): ?>
			<input type="checkbox" class="hk-edit-status-js" data-id="<?php echo $cat['id'] ?>" checked="checked">
		  <?php else: ?>
			<input type="checkbox" class="hk-edit-status-js" data-id="<?php echo $cat['id'] ?>">
		  <?php endif; ?>
		  <div class="hk-cat-name-js"><?php echo ucwords($cat['category_name'])?></div>
		  <div class="item-edit">
			  <a class="hk-edit-js" data-id="<?php echo $cat['id'] ?>">
			  	<img src="<?php echo $url_file ?>/pg_admin/icons/edit.png" alt="edit" title="edit">
			  </a>
		  </div>
		  <div class="item-delete"> 
			  <a href="<?php echo $url ?>/pg_admin/category/del/<?php echo $cat['id'] ?>">
			  	<img src="<?php echo $url_file ?>/pg_admin/icons/delete.png" alt="delete" title="delete">
			  </a>
			</div>
		</li>
		<?php endforeach; ?>
  </ul>
</section>

<!-- Add category, this is overlay -->
<div class="wp-overlay" id="modal" >
	<article class="wp-dialog">
		<header class="wp-overlay-header">
			<span id="wp-overlay-name">Add new Category name</span>
			<span id="wp-overlay-close">&times;</span>
		</header>
		<section><!-- created form -->
			<form action="<?php echo $url ?>/pg_admin/category/add/" method="post">
				<input type="hidden" name="id" id="id">
				<label for="category_name">Name:</label>
				<input type="text" id="category_name" name="category_name" placholder="Category name" required="required">
				<br><br>
				<span id="admin-overlay-button"><input type="submit" id="hk-form-button-js" value="Add"></span>
			</form>
		</section><!-- end of created form -->
	</article>
</div><!-- End of add category, this is overlay -->

<script src="<?php echo $url_file ?>/pg_admin/scripts/jquery.ui.core.js"></script>
<script src="<?php echo $url_file ?>/pg_admin/scripts/jquery.ui.widget.js"></script>
<script src="<?php echo $url_file ?>/pg_admin/scripts/jquery.ui.mouse.js"></script>
<script src="<?php echo $url_file ?>/pg_admin/scripts/jquery.ui.sortable.js"></script>

<script src="<?php echo $url_file ?>/pg_admin/scripts/category_list.js"></script>