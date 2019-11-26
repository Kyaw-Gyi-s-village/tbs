<header id="item-header">
  <h1>Item List</h1>
  <button class="header-button">+ New Item</button>
</header>

<nav class="item-wrap"><!--categories list-->
  <ul class="category">
    <li><h3>All categories</h3></li>
	<?php $cats = get_all_cats(); foreach($cats as $cat): if($cat['id']==$id):?>
		<li id="active">
      <a href="#item-header"><?php echo ucwords($cat['category_name'])?></a>
    </li>
  <?php else: ?>
    <li>
      <a href="<?php echo $url ?>/pg_admin/item/list/<?php echo $cat['id']?>"><?php echo ucwords($cat['category_name'])?></a>
    </li>
	<?php endif; endforeach;?>
  </ul>
</nav>

<section class="item-cat"><!-- wrap all items -->
  <?php if($id!=""): ?>
    <header class="cat-header">
      <h2><?php $cat=get_one_cat($id); echo strtoupper($cat['category_name']) ?></h2>
      <span title = "items number">(<?php echo count($data) ?>)</span><!-- number of items related by Category name -->
    </header>
    <section>
      <?php foreach($data as $item):?>
        <article class="each-item"><!-- display each item -->
          <header>
            <div class="name-code-price">
              <div class="item-name"><?php echo ucwords($item['item_name']) ?></div>
              <div class="item-code" data-icode="<?php echo $item['item_code'] ?>">[Code: <?php echo $item['item_code'] ?>]</div>
              <div class="price" data-price="<?php echo $item['price'] ?>" data-disper="<?php echo $item['discount_percent'] ?>">Price:
               <!--calcs item price-->
                <?php if($item['discount_percent']==0): ?>
                  <span><?php echo $item['price'] ?>Ks</span>
                <?php else: ?>
                  <span><?php echo $item['price']*(100-$item['discount_percent'])/100?>Ks</span>
                  <span class="dis-price"><?php echo $item['price'] ?>Ks</span>
                <?php endif; ?>
              </div>
            </div>
            <div class="item-edit-popover" data-id="<?php echo $item['id'] ?>">   <!-- fixed -->
              <span id="edit-photo"><a class="hk-edit-photo-js">Edit Photos</a></span>
              <span id="edit-other"><a class="hk-edit-others-js">Edit Others...</a></span>
            </div>
            <div class="item-edit">
              <img src="<?php echo $url_file ?>/pg_admin/icons/edit.png" alt="edit" title="edit">
            </div>
            <div class="item-delete">
              <a href="<?php echo $url ?>/pg_admin/item/del/<?php echo $item['id'] ?>"><img src="<?php echo $url_file ?>/pg_admin/icons/delete.png" alt="delete" title="delete"></a>
            </div>
          </header>
          <section class="item-info-body">
            <div class="item-img">
              <?php for($i=0; $i<$item['photo_qty']; $i++): ?>
                <img src="<?php echo $url_file ?>/pg_admin/item_gallary/<?php echo $item['item_code'].'_id_'.$item['id'].'_'.$i.'.jpg'?>" alt="<?php echo $item['item_name']?>" width="96px" height="96px">
              <?php endfor; ?>
            </div>
            <div class="item-remark">
              <p class="summary_zawgyi"><?php echo $item['summary_zawgyi'] ?></p>
              <p class="summary_unicode"><?php echo $item['summary_unicode'] ?></p>
            </div>
          </section>
        </article><!-- display each item -->
      <?php endforeach; ?>
    </section>
  <?php endif; ?>
</section><!-- end of wrap all items -->

<!-- Add category, this is overlay -->
<div class="wp-overlay" id="modal" >
  <article class="wp-dialog">
    <header class="wp-overlay-header">
      <span id="wp-overlay-name">Add new Promotion Text</span>
      <span id="wp-overlay-close">&times;</span>
    </header>
    <section><!-- created form -->

      <form action="<?php echo $url ?>/pg_admin/item/add/" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" id="hk-item-id-js">
        <label for="item_name">Name:</label>
        <input type="text" id="item_name" name="item_name" placeholder="Item name" required="required">

        <label for="item_code">Item Code:</label>
        <input type="text" id="item_code" name="item_code" placeholder="Item code" required="required">

        <label for="stock">Stock:</label>
        <input type="number" id="stock" name="stock" placeholder="10" required="required">

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" placeholder="0.00" required="required">

        <label for="discount_percent">Discount Percent(0% - 100%):</label>
        <input type="number" id="discount_percent" name="discount_percent" placeholder="0" required="required">

        <label for="summary_zawgyi">Summary_zawgyi:</label>
        <textarea id="summary_zawgyi" name="summary_zawgyi" required="required"></textarea>

        <label for="summary_unicode">Summary_unicode:</label>
        <textarea id="summary_unicode" name="summary_unicode" required="required"></textarea>

        <label for="category_id" id="category-label">Category:</label>
        <select id="category_id" name="category_id">
          <?php $cats = get_all_cats(); foreach( $cats as $cat): ?>
            <option value="<?php echo $cat['id']?>"><?php echo $cat['category_name']?></option>
          <?php endforeach; ?>
        </select>

        <label for="hk-add-photo" id="add-photo">Add photo:</label>
        <div class="photo-frame">
          <div id="photo"></div><!--place item photos-->
          <input type="button" id="hk-remove-photo" value="-">
          <input type="button" id="hk-add-photo" value="+">
        </div>
        <span id="admin-overlay-button"><input type="submit" value="Add Item"></span>
      </form>

    </section><!-- end of created form -->
  </article>
</div><!-- End of add category, this is overlay -->

<script src="<?php echo $url_file ?>/pg_admin/scripts/item_list.js"></script>
