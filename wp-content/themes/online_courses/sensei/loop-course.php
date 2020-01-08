

<?php
/**
 * The Template for outputting Lists of any Sensei content type.
 *
 * This template expects the global wp_query to setup and ready for the loop
 *
 * @author      Automattic
 * @package     Sensei
 * @category    Templates
 * @version     1.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * This runs before the the course loop items in the loop.php template. It runs
 * only only for the course post type. This loop will not run if the current wp_query
 * has no posts.
 *
 * @since 1.9.0
 */
	do_action( 'sensei_loop_course_before' );
?>

<?php
	do_action( 'sensei_loop_course_inside_before' );
	$category_output   = get_the_term_list( get_the_ID(), 'course-category', '', ', ', '' );
?>
			          
<div class="box IS-container">
	<div class="container ">
		<div class="row">

			<div class="col-md-2 IS-list">
				<div class="row">
					<p>Cursos</p>					
					<?php
					 	echo do_shortcode( '[sensei_course_categories]');
					 		 
					 ?> 					 
				</div>
			</div>
			<div class="col-md-1"> 

			</div>
			<div class="col-md-9">
					<p class = "IS-title">Cursos en línea para todos</p>
		        	<div class="row">
		        		
		        		<?php   
		        		/* Loop through all courses*/
						while ( have_posts() ) { ?>
		        			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"  >
									<?php the_post(); ?>
									<?php sensei_load_template_part( 'content', 'course' );?>
		        			</div>
		        		<?php
						}
						?>
		        	</div>
	          	<?php
				/**
				 * This runs after the post type items in the loop.php template. It runs
				 * only for the specified post type
				 *
				 * @since 1.9.0
				 */
				do_action( 'sensei_loop_course_inside_after' );
				?>
			</div>	<!--end col-9-->
			
			
		</div><!--end row-->
	</div><!-- end container -->
</div><!-- end box -->


	
<?php
/**
 * This runs after the post type items in the loop.php template. It runs
 * only for the specified post type
 *
 * @since 1.9.0
 */
do_action( 'sensei_loop_course_after' );
?>

