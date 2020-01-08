<?php
/**
 * The Template for displaying course archives, including the course page template.
 *
 * Override this template by copying it to your_theme/sensei/archive-course.php
 *
 * @author      Automattic
 * @package     Sensei
 * @category    Templates
 * @version     2.0.0
 */
?>

<?php get_sensei_header(); ?>
	<div class="IB-hero">
        <div class="container">
          <div class="IB-hero-text">
            <h1 >ACADEMY</h1>
          </div>
        </div>
     </div>
     <?php?>

	<?php if ( have_posts() ) : ?>
	
		<?php sensei_load_template( 'loop-course.php' ); ?>
		</div>
	<?php else : ?>

		<p><?php esc_html_e( 'No courses found that match your selection.', 'sensei-lms' ); ?></p>

	<?php endif; // End If Statement ?>

	<?php

		/**
		 * This action runs after including the course archive loop. This hook fires within the archive-course.php
		 * It fires even if the current archive has no posts.
		 *
		 * @since 1.9.0
		 */
		do_action( 'sensei_archive_after_course_loop' );

	?>

<?php get_sensei_footer(); ?>
