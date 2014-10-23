<?php
// Load jQuery
	if ( !function_exists( 'core_mods' ) ) {
		function core_mods() {
			if ( !is_admin() ) {
				wp_deregister_script( 'jquery' );
				wp_register_script( 'jquery', ( "//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" ), false);
				wp_enqueue_script( 'jquery' );
			}
		}
		add_action( 'wp_enqueue_scripts', 'core_mods' );
	}

//Add support for WordPress 3.0's custom menus
add_action( 'init', 'register_my_menu' );
 
//Register area for custom menu
function register_my_menu() {
    register_nav_menu( 'primary-menu', __( 'Primary Menu' ) );
    register_nav_menu( 'secondary-menu', __( 'Secondary Menu' ) );
}

// Enable post thumbnails
add_theme_support('post-thumbnails');
set_post_thumbnail_size(150, false);
add_image_size('mediano', 640, false);
add_image_size('grande', 1200, false);
add_image_size('pequenho', 300, false);

//Some simple code for our widget-enabled sidebar
if ( function_exists('register_sidebar') )
    register_sidebar();

//Code for custom background support
add_custom_background();

//Enable post and comments RSS feed links to head
add_theme_support( 'automatic-feed-links' );

//this function will be called in the next section
function advanced_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
 
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
   <div class="comment-author vcard">
     <?php echo get_avatar($comment,$size='90',$default='<path_to_url>' ); ?>
     <small class="comment-date"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></small>     
     <div class="comment-meta"<a href="<?php the_author_meta( 'user_url'); ?>"><?php printf(__('%s'), get_comment_author_link()) ?></a> dice:<?php edit_comment_link(__('(Edit)'),'  ','') ?></div>
     </div>
     <div class="clear"></div>
 
     <?php /*if ($comment->comment_approved == '0') : ?>
       <em><?php _e('Your comment is awaiting moderation.') ?></em>
       <br />
     <?php endif; */?>
 
     <div class="comment-text">	
         <?php comment_text() ?>
         <div class="reply">
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'login_text' => "Responder"))) ?>
       <?php delete_comment_link(get_comment_ID()); ?>
   </div>
     </div>
   <div class="clear"></div>
<?php }

function delete_comment_link($id) {
  if (current_user_can('edit_post')) {
    echo '- <a href="'.admin_url("comment.php?action=cdc&c=$id").'"> Eliminar</a> ';
    echo '- <a href="'.admin_url("comment.php?action=cdc&dt=spam&c=$id").'"> Spam</a>';
  }
}

//Tags Populares
function top_tags() {
        $tags = get_tags();
        if (empty($tags))
                return;
        $counts = $tag_links = array();
        foreach ( (array) $tags as $tag ) {
                $counts[$tag->name] = $tag->count;
                $tag_links[$tag->name] = get_tag_link( $tag->term_id );
        }
        asort($counts);
        $counts = array_reverse( $counts, true );
        $i = 0;
        foreach ( $counts as $tag => $count ) {
                $i++;
                $tag_link = clean_url($tag_links[$tag]);
                $tag = str_replace(' ', '&nbsp;', wp_specialchars( $tag ));
                if($i < 5){
                        print "<li class='tagssingle'><a href=\"$tag_link\">$tag</a></li>";
                }
        }
}

function tag_name() {
$i = 1;
$posttags = get_the_tags();
$contador = count($posttags);
if ($posttags) {
  foreach($posttags as $tag) {
    echo $tag->name;
	if ($contador-$i != 0){
		echo ', ';
		$i = $i + 1;
	} 
  }
}
}

function new_excerpt_more( $more ) {
	return 'Continuar leyendo...';
}
add_filter('excerpt_more', 'new_excerpt_more');

?>