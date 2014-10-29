<?php get_header(); ?>
<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
    <?php $id = get_the_ID(); ?>
    <article id="<?php echo $id; ?>" class="single_post clearfix">
        <?php 
        the_post_thumbnail('grande'); ?>
        <section class="single_texto"><h1 class="single_titulo"><?php the_title(); ?></h1><br><?php
        the_content();
            ?></section>
    </article>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>