<?php

class galleryPostWidget extends WP_Widget
{ 
    function galleryPostWidget(){
      $widget_ops = array( 'description' => 'Grupo De Midia' );
      $control_ops = array( 'width' => 400, 'height' => 300 );
      parent::WP_Widget( false, $name='ET Grupo De Midia - Galeria', $widget_ops, $control_ops );
    }

  /* Displays the Widget in the front-end */
    function widget( $args, $instance ){


    echo $before_widget;

    if ( $title )
    echo $before_title . $title . $after_title;

    $count = 0; global $mb_galeria;
    $gallery_query = '&post_type=galeria&post_count=6'; ?>
    <h3 class="entry-title main-title">Fotos •••</h3>
    <div class="ngg-widget entry-content">
    <?php query_posts($gallery_query);
    if (have_posts()) : while (have_posts()) : the_post();

      $width = 120;
      $height = 120;
      $titletext = get_the_title();

      $thumbnail = get_thumbnail($width,$height,'portfolio',$titletext,$titletext,true,'Portfolio');
      $thumb = $thumbnail["thumb"]; ?>
      
      
          <a class="fancybox" title="<?php the_title(); ?>" rel="gallery" href="<?php echo($thumbnail['fullpath']); ?>">
            <?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext, $width, $height, 'portfolio'); ?>
          </a>
      
    <?php $count++; endwhile; ?>
    </div>
  <?php endif; 
    echo $after_widget;
  }
  ////////////////////
/*<div class="ngg-widget entry-content">
<a href="http://192.168.0.215/GrupoDeMidia/wp-content/gallery/teste/eye.jpg" title="" class="shutterset_ngg-images-3"><img src="http://192.168.0.215/GrupoDeMidia/wp-content/gallery/teste/thumbs/thumbs_eye.jpg" width="120" height="120" title="eye" alt="eye"></a>
<a href="http://192.168.0.215/GrupoDeMidia/wp-content/gallery/teste/tarj2v.jpg" title="" class="shutterset_ngg-images-3"><img src="http://192.168.0.215/GrupoDeMidia/wp-content/gallery/teste/thumbs/thumbs_tarj2v.jpg" width="120" height="120" title="tarj2v" alt="tarj2v"></a>
<a href="http://192.168.0.215/GrupoDeMidia/wp-content/gallery/teste/inson.jpg" title="" class="shutterset_ngg-images-3"><img src="http://192.168.0.215/GrupoDeMidia/wp-content/gallery/teste/thumbs/thumbs_inson.jpg" width="120" height="120" title="inson" alt="inson"></a>
<a href="http://192.168.0.215/GrupoDeMidia/wp-content/gallery/teste/tarj1.jpg" title="" class="shutterset_ngg-images-3"><img src="http://192.168.0.215/GrupoDeMidia/wp-content/gallery/teste/thumbs/thumbs_tarj1.jpg" width="120" height="120" title="tarj1" alt="tarj1"></a>
<a href="http://192.168.0.215/GrupoDeMidia/wp-content/gallery/teste/gan.jpg" title="" class="shutterset_ngg-images-3"><img src="http://192.168.0.215/GrupoDeMidia/wp-content/gallery/teste/thumbs/thumbs_gan.jpg" width="120" height="120" title="gan" alt="gan"></a>
<a href="http://192.168.0.215/GrupoDeMidia/wp-content/gallery/teste/tarj1v.jpg" title="" class="shutterset_ngg-images-3"><img src="http://192.168.0.215/GrupoDeMidia/wp-content/gallery/teste/thumbs/thumbs_tarj1v.jpg" width="120" height="120" title="tarj1v" alt="tarj1v"></a>
*/
  //////////////////////

  /*Saves the settings. */
    function update( $new_instance, $old_instance ){
    $instance = $old_instance;
    $instance['title'] = strip_tags( $new_instance['title'] );
    $instance['imagePath'] = esc_url( $new_instance['imagePath'] );
    $instance['aboutText'] = current_user_can('unfiltered_html') ? $new_instance['aboutText'] : stripslashes( wp_filter_post_kses( addslashes($new_instance['aboutText']) ) );

    return $instance;
  }

  /*Creates the form for the widget in the back-end. */
  function form( $instance ){
    //Defaults
    $instance = wp_parse_args( (array) $instance, array( 'title'=>'Grupo De Midia', 'imagePath'=>'', 'aboutText'=>'' ) );

    $title = esc_attr( $instance['title'] );
    $imagePath = esc_url( $instance['imagePath'] );
    $aboutText = esc_textarea( $instance['aboutText'] );

    # Title
    echo '<p><label for="' . $this->get_field_id('title') . '">' . 'Title:' . '</label><input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . $title . '" /></p>';
    # Image
    echo '<p><label for="' . $this->get_field_id('imagePath') . '">' . 'Image:' . '</label><textarea cols="20" rows="2" class="widefat" id="' . $this->get_field_id('imagePath') . '" name="' . $this->get_field_name('imagePath') . '" >'. $imagePath .'</textarea></p>';
    # About Text
    echo '<p><label for="' . $this->get_field_id('aboutText') . '">' . 'Text:' . '</label><textarea cols="20" rows="5" class="widefat" id="' . $this->get_field_id('aboutText') . '" name="' . $this->get_field_name('aboutText') . '" >'. $aboutText .'</textarea></p>';
  }

}// end AboutMeWidget class

function galleryPostWidget() {
  register_widget('galleryPostWidget');
}

add_action('widgets_init', 'galleryPostWidget');


class RandomPostWidget extends WP_Widget
{
  function RandomPostWidget()
  {
    $widget_ops = array('classname' => 'RandomPostWidget', 'description' => 'Displays a random post with thumbnail' );
    $this->WP_Widget('RandomPostWidget', 'Random Post and Thumbnail', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
    $title = $instance['title'];
?>
  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
 
    if (!empty($title))
      echo $before_title . $title . $after_title;;
 
    // WIDGET CODE GOES HERE
    echo "<h1>This is my new widget!</h1>";
 
    echo $after_widget;
  }
 
}
//add_action( 'widgets_init', create_function('', 'return register_widget("RandomPostWidget");') );?>