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
    extract($args);
    $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? 'Grupo De Midia - Gallery' : esc_html( $instance['title'] ) );
    $imagePath = empty( $instance['imagePath'] ) ? '' : esc_url( $instance['imagePath'] );
    $aboutText = empty( $instance['aboutText'] ) ? '' : $instance['aboutText'];

    echo $before_widget;

    if ( $title )
      echo $before_title . $title . $after_title; ?>
    <div class="clearfix">
      <img src="<?php echo et_new_thumb_resize( et_multisite_thumbnail($imagePath), 74, 74, '', true ); ?>" id="about-image" alt="" />
      <?php echo( $aboutText )?>
    </div> <!-- end about me section -->
  <?php
    echo $after_widget;
  }

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