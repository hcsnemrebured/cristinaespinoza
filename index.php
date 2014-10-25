<?php get_header(); ?>
<section id="contenido_principal" class="clearfix" >
<?php 
// The Query
$query = new WP_Query('post_type=post&posts_perpage=9&orderby=rand');

// The Loop
if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();
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
	}
} else {
	// no posts found
}
/* Restore original Post Data */
wp_reset_postdata();
?>
</section>
<?php get_footer(); ?>