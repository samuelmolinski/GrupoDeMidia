<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<?php if (et_get_option('lucid_integration_single_top') <> '' && et_get_option('lucid_integrate_singletop_enable') == 'on') echo (et_get_option('lucid_integration_single_top')); ?>
	<?php 
		if(isset($_GET['event'])){

			$id = $_GET['event'];
			$event = new fsEvent($id);
		}
	 ?>
	<h1 class="title"><?php echo $event->subject; ?></h1>

	<article id="post-<?php the_ID(); ?>" <?php post_class('entry clearfix event'); ?>>
		<?php
			global $wp_embed;
			$thumb = '';
			$et_full_post = get_post_meta( $post->ID, '_et_full_post', true );
			$width = apply_filters('et_blog_image_width',630);
				if ( 'on' == $et_full_post ) $width = apply_filters( 'et_single_fullwidth_image_width', 960 );
			$height = apply_filters('et_blog_image_height',250);
			$classtext = '';
			$titletext = get_the_title();
			$thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext,false,'Singleimage');
			$thumb = $thumbnail["thumb"];
			
			$et_video_url = get_post_meta( $post->ID, '_et_lucid_video_url', true );

		?>
		<?php if ( '' != $thumb && 'on' == et_get_option('lucid_thumbnails') ) { ?>
			<div class="post-thumbnail">
				<?php
					d($thumb);
					d($thumbnail["use_timthumb"]);
					print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext, $width, $height, $classtext);					
				?>
			</div> 	<!-- end .post-thumbnail -->
		<?php } ?>
		
		<div class="post_content clearfix">
			
			<?php 				
				if(($event->location)){
					echo "<h4>Local :{$event->location}</h4>";
				} 

				if(($event->date_admin_from && $event->date_admin_to) && ($event->date_admin_from != $event->date_admin_to)){
					echo "<h4>Data: {$event->date_admin_from} - {$event->date_admin_to}</h4>";
				} elseif ($event->date_admin_from) {
					echo "<h4>Data: {$event->date_admin_from}</h4>";
				}	

				if($event->time_admin_from && $event->time_admin_to) {
					echo "<h4>Horas: {$event->time_admin_from} - {$event->time_admin_to}</h4>";
				} elseif ($event->time_admin_from) {
					echo "<h4>Horas:{$event->time_admin_from}</h4>";
				}
				
				echo ('<div class="description" >'.wpautop($event->description).'</div>');
				//the_content(); 
				//d($event);
			?>	

			
			<?php wp_link_pages(array('before' => '<p><strong>'.esc_attr__('Pages','Lucid').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			<?php edit_post_link(esc_attr__('Editar está página','Lucid')); ?>

		</div> 	<!-- end .post_content -->

	</article> <!-- end .entry -->
	
	<?php if (et_get_option('lucid_integration_single_bottom') <> '' && et_get_option('lucid_integrate_singlebottom_enable') == 'on') echo(et_get_option('lucid_integration_single_bottom')); ?>
		
	<?php 
		if ( et_get_option('lucid_468_enable') == 'on' ){
			if ( et_get_option('lucid_468_adsense') <> '' ) echo( et_get_option('lucid_468_adsense') );
			else { ?>
			   <a href="<?php echo esc_url(et_get_option('lucid_468_url')); ?>"><img src="<?php echo esc_url(et_get_option('lucid_468_image')); ?>" alt="468 ad" class="foursixeight" /></a>
	<?php 	}    
		}
	?>
	
	<?php 
		if ( 'on' == et_get_option('lucid_show_postcomments') ) comments_template('', true);
	?>
<?php endwhile; // end of the loop. ?>