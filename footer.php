<footer>
    <figure id="logofooter" class="logo">
    	<a href="<?php echo home_url(); ?>" >
    		<img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="Alt" >
    	</a>
    </figure>
        <small style="position: absolute; top: 40%; left: 510px;">&copy;<?php echo date("Y"); echo " "; bloginfo('name'); ?></small>
    	<h3 style="position: absolute; top: 40%; left: 715px;">Todos los derechos reservados.<br></h3>
    </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>