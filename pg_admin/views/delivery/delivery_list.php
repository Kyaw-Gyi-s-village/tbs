<header id="item-header">
  <h1>Delivery</h1>
  <button class="hk-create-js header-button">+ &nbsp;Add</button>
</header>

<section><!--show delivery list-->
  <table class="ky-account-table">
  	<thead>
			<tr>
			  <th class="ky-no">No.</th>
			  <th>Name</th>
			  <th>States and Regions</th>
			  <th>Price</th>
			  <th>Lead Time</th>
			  <th>Edit</th>
			  <th>Delete</th>
			</tr>
		</thead>

		<tbody>
			<?php $count=1; foreach($data as $deli): ?>
			<tr>
			  <td class="ky-no"><?php echo $count++ ?></td>
			  <td id="hk-name-js"><?php echo $deli['name'] ?></td>
			  <td id="hk-sandr-js"><?php echo $deli['states_and_regions'] ?></td>
			  <td id="hk-price-js"><?php echo $deli['price'] ?></td>
			  <td id="hk-ltime-js"><?php echo $deli['lead_time'] ?></td>
			  <td>
			  	<div class="item-edit">
						<a class="hk-edit-js" data-id="<?php echo $deli['id'] ?>">
							<img src="<?php echo $url_file ?>/pg_admin/icons/edit.png" alt="edit" title="edit">
						</a>
					</div>
			  </td>
			  <td class="ky-delete-tr">
			  	<div class="item-delete">
						<a href="<?php echo $url ?>/pg_admin/delivery/del/<?php echo $deli['id'] ?>">
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
      <span id="wp-overlay-name">Add new Promotion Text</span>
      <span id="wp-overlay-close">&times;</span>
    </header>
    <section><!-- created form -->
      <form action="<?php echo $url ?>/pg_admin/delivery/add/" method="post">
      	<input type="hidden" name="id" id="id">
      	
        <label for="tandcname">Town or City Name:</label>
			  <input type="text" id="tandcname" name="name" placeholder="Town or City Name" required="required">

			  <label for="sandrname">States or Regions Name:</label>
			  <input type="text" id="sandrname" name="states_and_regions" placeholder="States or Regions Name" required="required">

			  <label for="price">Price:</label>
			  <input type="number" id="price" name="price" placeholder="0.0" required="required">

			  <label for="time">Lead Time:</label>
			  <input type="number" id="time" name="lead_time" placeholder="0" required="required">

			  <br><br>
			  <span id="admin-overlay-button"><input type="submit" value="Add"></span>
      </form>
    </section><!-- end of created form -->
  </article>
</div><!-- End of add category, this is overlay -->
<script src="<?php echo $url_file ?>/pg_admin/scripts/delivery_list.js"></script>