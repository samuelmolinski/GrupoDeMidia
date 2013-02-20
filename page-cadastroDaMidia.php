<?php

/*
Template Name: Cadastro da Midia
*/

	d($_POST);
	d($_FILEs);
	//d(get_defined_vars());

	//create user 
	
	$user_data = array(
        'ID' => '',
        'user_pass' => $_POST['cf3_field_9'],
        'user_login' => $_POST['cf3_field_5'],
        'user_nicename' => $_POST['cf3_field_1'],
        'user_url' => '',
        'user_email' => $_POST['cf3_field_6'],
        'display_name' => $_POST['cf3_field_1'],
        'nickname' => $_POST['cf3_field_1'],
        'first_name' => $_POST['cf3_field_1'],
        'last_name' => $_POST['cf3_field_2'],
        'description' => $_POST['cf3_field_2'],
        'user_registered' => $_POST['cf3_field_7'],
        'role' => get_option('default_role') // Use default role or another role, e.g. 'editor'
    );
    
    $user_id = wp_insert_user( $user_data );


get_header(); ?>

<div id="content-area" class="clearfix">
	<div id="left-area">
		<?php //get_template_part('includes/breadcrumbs', 'page'); ?>
		<h1 class="title"><?php the_title(); ?></h1>
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('entry clearfix'); ?>>
				<?php 
					$thumb = '';
					$width = apply_filters('et_blog_image_width',630);
					$height = apply_filters('et_blog_image_height',210);
					$classtext = '';
					$titletext = get_the_title();
					$thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext,false,'Singleimage');
					$thumb = $thumbnail["thumb"];
				?>
				<?php if ( '' != $thumb && 'on' == et_get_option('lucid_page_thumbnails') ) { ?>
					<div class="post-thumbnail">
						<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext, $width, $height, $classtext); ?>
					</div> 	<!-- end .post-thumbnail -->
				<?php } ?>
				
				<div class="post_content clearfix">
					
					<?php the_content(); ?>
					<?php wp_link_pages(array('before' => '<p><strong>'.esc_attr__('Pages','Lucid').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
					<?php edit_post_link(esc_attr__('Editar está página','Lucid')); ?>

				</div> 	<!-- end .post_content -->
			</article> <!-- end .entry -->
		<?php endwhile; // end of the loop. ?>
	</div> <!-- end #left-area -->

	<?php get_sidebar(); ?>
</div> 	<!-- end #content-area -->
	
<?php get_footer('cadastro'); ?>