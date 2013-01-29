<?php
	$footer_sidebars = array('footer-area-1','footer-area-2','footer-area-3');
	$any_widget_area_active = is_active_sidebar( $footer_sidebars[0] ) || is_active_sidebar( $footer_sidebars[1] ) || is_active_sidebar( $footer_sidebars[2] );
?>
		
		</div> <!-- end .container -->
	</div> <!-- end #main-area -->
	<div id="preFooter" class="container clearfix">
		<div id="newsletter" class="container clearfix"><?php insert_cform('Newsletter'); ?></div>
		<div id="twitter">
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script> 
				 
			<!-- <a href="https://twitter.com/grupodemidia" class="twitter-follow-button" data-show-count="true">{l s='Siga'} @{l s='grupodemidia'}</a> -->
			<script src="http://widgets.twimg.com/j/2/widget.js"></script>
			<div class="twitterHeader">
				<img src="<?php bloginfo('template_url'); ?>/images/twitter-layout-bird.png" />
				<div class="title">siga-nos no twitter<a class=''>@grupodemidia</a></div>
			</div>
			<script>
			new TWTR.Widget({
			  version: 2,
			  //type: 'faves',
			  //type: 'search',
			  type: 'profile',
			  rpp: 3,
			  interval: 8000,
			  title: '',
			  subject: '',
			  //search: 'from:passeiorevest',
			  width: 415,
			  height: 170,
			  theme: {
			    shell: {
			      background: 'transparent',
			      color: '#696469'
			    },
			    tweets: {
			      background: 'transparent',
			      color: '#efefef',
			      links: '#dbd5a6'
			    }
			  },
			  features: {
			    scrollbar: false,
			    loop: true,
			    live: true,
			    hashtags: true,
			    timestamp: true,
			    avatars: true,
			    behavior: 'default'
			  }
			}).render().setUser('grupodemidia').start();
			</script>				
		</div>
		<div id="facebook">
			<!-- https://www.facebook.com/photo.php?fbid=270688569658996&set=a.127585053969349.19158.127584683969386&type=1 -->
		    <!-- <script src="https://static.ak.connect.facebook.com/js/api_lib/v0.4/FeatureLoader.js.php/pt_BR" type="text/javascript"></script> -->

		    <!-- <script type="text/javascript">FB.init("270688569658996");</script>
		    <fb:fan profile_id="270688569658996" connections="6" width="415" height="200" css="" stream="false"></fb:fan> -->
		    <fb:like-box href="http://www.facebook.com/GrupoDeMidiaRJ" style="width:100%;" show_faces="true" stream="false" header="true"></fb:like-box>

		</div>
		<?php //d($footer_sidebars); ?>
	</div>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.jqtransform.js"></script>
	<script type="text/javascript">jQuery('#li--4').jqTransform({imgPath:'<?php bloginfo('template_url'); ?>/jqtransformplugin/img/'});</script>
	<footer id="main-footer">
	<?php if ( $any_widget_area_active ) { ?>
		<div id="footer-divider"></div>
	<?php } ?>
		<div class="container">
			<div id="footer-widgets" class="clearfix">
				<?php
					if ( $any_widget_area_active ) {
						foreach ( $footer_sidebars as $key => $footer_sidebar ){
							if ( is_active_sidebar( $footer_sidebar ) ) {
								echo '<div class="footer-widget' . (  2 == $key ? ' last' : '' ) . '">';
								dynamic_sidebar( $footer_sidebar );
								echo '</div> <!-- end .footer-widget -->';
							}
						}
					}
				?>
                
			</div> <!-- end #footer-widgets -->	
            
		</div> <!-- end .container -->
		<?php if ( 'on' == et_get_option( 'lucid_728_enable', 'false' ) ){ ?>
			<div id="bottom-advertisment">
				<div class="container">
					<?php 
						if ( ( $lucid_728_adsense = et_get_option('lucid_728_adsense') ) && '' != $lucid_728_adsense ) echo( $lucid_728_adsense );
						else { ?>
						   <a href="<?php echo esc_url(et_get_option('lucid_728_url')); ?>"><img src="<?php echo esc_url(et_get_option('lucid_728_image')); ?>" /></a>
					<?php } ?>
				</div> <!-- end .container -->
			</div>
		<?php } ?>
	</footer> <!-- end #main-footer -->
	
	<div id="footer-bottom">	
		<div class="container clearfix">
			<?php
				$menuID = 'bottom-menu';
				$footerNav = '';

				if (function_exists('wp_nav_menu')) $footerNav = wp_nav_menu( array( 'theme_location' => 'footer-menu', 'container' => '', 'fallback_cb' => '', 'menu_id' => $menuID, 'menu_class' => 'bottom-nav', 'echo' => false, 'depth' => '1' ) );
				if ($footerNav == '') show_page_menu($menuID);
				else echo($footerNav);
			?>
		</div> <!-- end .container -->	
	</div> <!-- end #footer-bottom -->	
	
	<?php wp_footer(); ?>
</body>
</html>