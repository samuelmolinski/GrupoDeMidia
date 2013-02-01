<article id="post-<?php the_ID(); ?>" <?php post_class('entry clearfix'); ?>>
	<?php 
		$index_postinfo = et_get_option('lucid_postinfo1');
		
		$thumb = '';
		$width = apply_filters('et_blog_image_width',170);
		$height = apply_filters('et_blog_image_height',125);
		$classtext = '';
		$titletext = get_the_title();
		$thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext,false,'Blogimage');
		$thumb = $thumbnail["thumb"];
		
		?>	
	<?php if ( 'on' == et_get_option('lucid_thumbnails_index','on') && '' != $thumb ){ ?>
		
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext, $width, $height, $classtext); ?>
				<span class="overlay"></span>
			</a>	
		</div> 	<!-- end .post-thumbnail -->
	<?php } ?>
	<div class="post_content clearfix">
		<h3 class="et_pt_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<?php 
			if ( $index_postinfo ){
				
				et_postinfo_meta( $index_postinfo, et_get_option('lucid_date_format'), esc_html__('0 comentário','Lucid'), esc_html__('1 comentário','Lucid'), '% ' . esc_html__('comentários','Lucid') );
			} 
		?>
		<?php
			if ( '' == et_get_option('lucid_blog_style') ) the_content('');
			else echo '<p>' . truncate_post(130,false) . '</p>';
		?>
		<a href="<?php the_permalink(); ?>" class="more"><?php esc_html_e( 'Saiba mais', 'Lucid' ); ?></a>
	</div> <!-- end .post_content -->
</article> <!-- end .entry -->