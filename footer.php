<?php
/**
 *  Footer Template
 * @package Book Library
 * @since 1.0
 *  */

if(!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>

</main>
<footer role="contentinfo" class="astra-book-library-footer">
  <div class="astra-book-library-footer-copyright">
    <p>© <?php echo get_bloginfo('name'); ?> - Copyright 2024</p>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>