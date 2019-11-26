<section><!-- Promo Text Part -->
  <header id="item-header">
    <h1>Promo Text</h1>  
  <?php $istext = 0; $promo = get_text(); foreach($promo as $promo_text):?>
	 <button class="hk-edit-js header-button" data-id="<?php echo $promo_text['id'] ?>">Edit Text</button>
   </header>
   <p id="hk-promo-text-js"><?php echo $promo_text['promo_text'] ?></p>
  <?php $istext=1; endforeach; if( $istext!=1 ): ?>
	 <button class="hk-create-text-js">+ Add Text</button>
   </header>
  <?php endif; ?>
</section><!-- end of promo Text Part -->

<section><!--Promo Photo Part-->
  <header id="item-header">
    <h1>Promo Photos</h1>
    <button class="hk-create-photo-js header-button">Add Photo</button>
  </header>
  
  <div class="sn-promo">
    <?php foreach($data as $promo_photo): ?>
  	<div>
  	  <img src="<?php echo $url_file ?>/pg_admin/promo_photos/<?php echo 'pp'.$promo_photo['id'].'.jpg'?>" width="120px" height="120px">
      <div class="sn-item-logo">
        <div class="sn-promo-delete">
    	   <i class="fas fa-search-plus wp-view-photo"></i>
        </div>
        <div class="sn-promo-view">
         <a href="<?php echo $url ?>/pg_admin/promo/delete_photo/<?php echo $promo_photo['id'] ?>"><img src="<?php echo $url_file ?>/pg_admin/icons/delete.png" alt="delete" title="delete"></a>
        </div>
      </div>
  	</div>
    <?php endforeach;?>
  </div>  
</section>

<div class="photo-overlay"><!-- photo overlay -->
  <span id="photo-overlay-close"><i class="far fa-times-circle"></i></span>
  <img src="" id="wp-img-target">
</div>
<!-- Add category, this is overlay -->
<div class="wp-overlay" id="modal" >
  <article class="wp-dialog">
    <header class="wp-overlay-header">
      <span id="wp-overlay-name">Add new Promotion Text</span>
      <span id="wp-overlay-close">&times;</span>
    </header>
    <section><!-- created form -->
      <form action="<?php echo $url ?>/pg_admin/promo/add_text/" method="post">
        <input type="hidden" name="id" id="id">
        <label for="promo_text">Promotion Text</label>
        <textarea rows="3" cols="20" id="promo_text" name="promo_text" placeholder="Something"></textarea>
        <input type="file" name="promo_photo" id="promo_photo">
        <br><br>
        <span id="admin-overlay-button"><input type="submit" value="Add"></span>
      </form>
    </section><!-- end of created form -->
  </article>
</div><!-- End of add category, this is overlay -->
<script src="<?php echo $url_file ?>/pg_admin/scripts/promotion.js"></script>