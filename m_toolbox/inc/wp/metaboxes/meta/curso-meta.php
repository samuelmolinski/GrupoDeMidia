<?php global $wpalchemy_media_access; ?>
<div class="my_meta_control">
 
 	<label>URL of Curso</label>
 
	<p>
		<?php $metabox->the_field('cursoURL'); ?>
		<input type="text" name="<?php $metabox->the_name(); ?>" id="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" style="width: 100%; min-width: 400px;"/>
	</p>
 	
	<div class="clear"></div>

</div>