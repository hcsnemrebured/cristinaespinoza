<?php
/**
 * The template for displaying Category pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header('js'); ?>
<section id="contenido_principal" class="clearfix" >

			<?php if ( have_posts() ) : ?>
			<?php
					// Start the Loop.
					while ( have_posts() ) : the_post();
                    $id = get_the_ID();
                    $titulo = get_the_title();
                    $category = get_the_category($id); ?>
                    <article id="post-<?php echo $id; ?>" class="articulo_index <?php 
                    foreach ($category as $item){
                        echo $item -> slug;
                        echo ' ';
                    } ?>"><a href="<?php the_permalink(); ?>" target="_blank"><?php
                    the_post_thumbnail( 'mediano' );
                    echo '<h3 class="titulo_index" >' . $titulo . '</h3></a></article>';
					endwhile;
					// Previous/next page navigation.
				else :
				endif;
			?>
	</section>
<?php
get_footer(); ?>
