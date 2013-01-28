<?php session_start();
/*
Template Name: Contact Page
*/
?>
<?php 
	$et_ptemplate_settings = array();
	$et_ptemplate_settings = maybe_unserialize( get_post_meta($post->ID,'et_ptemplate_settings',true) );
	
	$fullwidth = isset( $et_ptemplate_settings['et_fullwidthpage'] ) ? (bool) $et_ptemplate_settings['et_fullwidthpage'] : false;
	
	$et_regenerate_numbers = isset( $et_ptemplate_settings['et_regenerate_numbers'] ) ? (bool) $et_ptemplate_settings['et_regenerate_numbers'] : false;
		
	$et_error_message = '';
	$et_contact_error = false;
	
	if ( isset($_POST['et_contactform_submit']) ) {
		if ( !isset($_POST['et_contact_captcha']) || empty($_POST['et_contact_captcha']) ) {
			$et_error_message .= '<p>' . esc_html__('Certifique-se de que você digitou o captcha. ','Lucid') . '</p>';
			$et_contact_error = true;
		} else if ( $_POST['et_contact_captcha'] <> ( $_SESSION['et_first_digit'] + $_SESSION['et_second_digit'] ) ) {			
			$et_numbers_string = $et_regenerate_numbers ? esc_html__('números regenerado.','Lucid') : '';
			$et_error_message .= '<p>' . esc_html__('Você digitou o número errado no captcha. ','Lucid') . $et_numbers_string . '</p>';
			
			if ($et_regenerate_numbers) {
				unset( $_SESSION['et_first_digit'] );
				unset( $_SESSION['et_second_digit'] );
			}
			
			$et_contact_error = true;
		} else if ( empty($_POST['et_contact_name']) || empty($_POST['et_contact_email']) || empty($_POST['et_contact_subject']) || empty($_POST['et_contact_message']) ){
			$et_error_message .= '<p>' . esc_html__('Certifique-se de preencher todos os campos. ','Lucid') . '</p>';
			$et_contact_error = true;
		}
		
		if ( !is_email( $_POST['et_contact_email'] ) ) {
			$et_error_message .= '<p>' . esc_html__('E-mail inválido. ','Lucid') . '</p>';
			$et_contact_error = true;
		}
	} else {
		$et_contact_error = true;
		if ( isset($_SESSION['et_first_digit'] ) ) unset( $_SESSION['et_first_digit'] );
		if ( isset($_SESSION['et_second_digit'] ) ) unset( $_SESSION['et_second_digit'] );
	}
	
	if ( !isset($_SESSION['et_first_digit'] ) ) $_SESSION['et_first_digit'] = $et_first_digit = rand(1, 15);
	else $et_first_digit = $_SESSION['et_first_digit'];
	
	if ( !isset($_SESSION['et_second_digit'] ) ) $_SESSION['et_second_digit'] = $et_second_digit = rand(1, 15);
	else $et_second_digit = $_SESSION['et_second_digit'];
	
	if ( !$et_contact_error ) {
		$et_email_to = ( isset($et_ptemplate_settings['et_email_to']) && !empty($et_ptemplate_settings['et_email_to']) ) ? $et_ptemplate_settings['et_email_to'] : get_site_option('admin_email');
				
		$et_site_name = is_multisite() ? $current_site->site_name : get_bloginfo('name');	
		
		$contact_name 	= wp_strip_all_tags( $_POST['et_contact_name'] );
		$contact_email 	= wp_strip_all_tags( $_POST['et_contact_email'] );

		$headers  = 'From: ' . $contact_name . ' <' . $contact_email . '>' . "\r\n";
		$headers .= 'Reply-To: ' . $contact_name . ' <' . $contact_email . '>';

		wp_mail( apply_filters( 'et_contact_page_email_to', $et_email_to ), sprintf( '[%s] ' . wp_strip_all_tags( $_POST['et_contact_subject'] ), $et_site_name ), wp_strip_all_tags( $_POST['et_contact_message'] ), apply_filters( 'et_contact_page_headers', $headers, $contact_name, $contact_email ) );
		
		$et_error_message = '<p>' . esc_html__('Obrigado por nos contactar!','Lucid') . '</p>';
	}
?>

<?php get_header(); ?>

<div id="content-area" class="clearfix<?php if ( $fullwidth ) echo ' fullwidth'; ?>">
	<div id="left-area">
		<!--<?php get_template_part('includes/breadcrumbs', 'page'); ?> -->
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
					
					<div id="et-contact" class="responsive">

						<div id="et-contact-message"><?php echo($et_error_message); ?> </div>
						
						<?php if ( $et_contact_error ) { ?>
							<form action="<?php echo(get_permalink($post->ID)); ?>" method="post" id="et_contact_form">
								<div id="et_contact_left">
									<p class="clearfix">
										<label for="et_contact_name" class="et_contact_form_label"><?php esc_html_e('Nome','Lucid'); ?></label>
										<input type="text" name="et_contact_name" value="<?php if ( isset($_POST['et_contact_name']) ) echo esc_attr($_POST['et_contact_name']); else esc_attr_e('Nome','Lucid'); ?>" id="et_contact_name" class="input" />
									</p>
									
									<p class="clearfix">
										<label for="et_contact_email" class="et_contact_form_label"><?php esc_html_e('E-mail','Lucid'); ?></label>
										<input type="text" name="et_contact_email" value="<?php if ( isset($_POST['et_contact_email']) ) echo esc_attr($_POST['et_contact_email']); else esc_attr_e('E-mail','Lucid'); ?>" id="et_contact_email" class="input" />
									</p>
									
									<p class="clearfix">
										<label for="et_contact_subject" class="et_contact_form_label"><?php esc_html_e('Assuto','Lucid'); ?></label>
										<input type="text" name="et_contact_subject" value="<?php if ( isset($_POST['et_contact_subject']) ) echo esc_attr($_POST['et_contact_subject']); else esc_attr_e('Assunto','Lucid'); ?>" id="et_contact_subject" class="input" />
									</p>
								</div> <!-- #et_contact_left -->
								
								<div id="et_contact_right">
									<p class="clearfix">
										<?php 
											esc_html_e('Captcha: ','Lucid');	
											echo '<br/>';
											echo esc_attr($et_first_digit) . ' + ' . esc_attr($et_second_digit) . ' = ';
										?>
										<input type="text" name="et_contact_captcha" value="<?php if ( isset($_POST['et_contact_captcha']) ) echo esc_attr($_POST['et_contact_captcha']); ?>" id="et_contact_captcha" class="input" size="2" />
									</p>
								</div> <!-- #et_contact_right -->
								
								<div class="clear"></div>
								
								<p class="clearfix">
									<label for="et_contact_message" class="et_contact_form_label"><?php esc_html_e('Mensagem','Lucid'); ?></label>
									<textarea class="input" id="et_contact_message" name="et_contact_message"><?php if ( isset($_POST['et_contact_message']) ) echo esc_textarea($_POST['et_contact_message']); else echo esc_textarea( __('Mensagem','Lucid') ); ?></textarea>
								</p>
									
								<input type="hidden" name="et_contactform_submit" value="et_contact_proccess" />
								
								<input type="reset" id="et_contact_reset" value="<?php esc_attr_e('Limpar','Lucid'); ?>" />
								<input class="et_contact_submit" type="submit" value="<?php esc_attr_e('Enviar','Lucid'); ?>" id="et_contact_submit" />
							</form>
						<?php } ?>
					</div> <!-- end #et-contact -->
					
					<?php wp_link_pages(array('before' => '<p><strong>'.esc_attr__('Pages','Lucid').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
					<?php edit_post_link(esc_attr__('Editar está página','Lucid')); ?>
				</div> 	<!-- end .post_content -->
			</article> <!-- end .entry -->
		<?php endwhile; // end of the loop. ?>
	</div> <!-- end #left-area -->
	
	<?php if ( ! $fullwidth ) get_sidebar(); ?>
</div> 	<!-- end #content-area -->
	
<?php get_footer(); ?>