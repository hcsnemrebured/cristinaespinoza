<?php get_header('nonjs'); ?>
<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
    <?php $id = get_the_ID(); ?>
    <article id="<?php echo $id; ?>">
        <?php 
        the_post_thumbnail('grande'); ?>
        <h1><?php the_title(); ?></h1><?php
        the_content();
        ?>
    </article>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>