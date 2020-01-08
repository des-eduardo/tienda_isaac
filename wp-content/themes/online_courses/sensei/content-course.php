<?php
use Sensei_WC;
use Sensei_WC_Utils;
use Sensei_WC_Subscriptions;
use Sensei_WC_Paid_Courses\Sensei_WC_Paid_Courses;
 
/**
 * Content-course.php template file
 *
 * responsible for content on archive like pages. Only shows the course excerpt.
 *
 * For single course content please see single-course.php
 *
 * @author      Automattic
 * @package     Sensei
 * @category    Templates
 * @version     1.12.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<!-- Hero section  -->
      

<!-- end hero section -->

</style>
<li <?php post_class( Sensei_Course::get_course_loop_content_class() ); ?>  style=" display: inline-block;   ">

	<?php
	/**
	 * This action runs before the sensei course content. It runs inside the sensei
	 * content-course.php template.
	 *
	 * @since 1.9
	 *
	 * @param integer $course_id
	 */
	do_action( 'sensei_course_content_before', get_the_ID() );
	$product_ids = Sensei_WC::get_course_product_ids( get_the_ID());
	$price_p = 0;
	if ( ! $product_ids ) {
			return;
		}
	foreach ( $product_ids as $product_id ) {
			$product = Sensei_WC::get_product_object( $product_id );
			$price_p = wp_kses_post( $product->get_price_html() ) ;		
		}
	?>

	<div class="course-content ">
		<div class="entry ">
				<?php 
					$category_output   = get_the_term_list( get_the_ID(), 'course-category', '', ', ', '' );
				?>	
				<div class="box-part">	                        
				    <div class="image-course " style="background-image: url(<?php echo wp_kses_post( get_the_post_thumbnail_url() ); ?>);">
	    				<p class = "name_category">
	    					<?php echo sprintf( esc_html__( ' %s', 'sensei-lms' ), wp_kses_post( $category_output ) ); /*category*/ ?>   			
	    				</p>
	    			</div>
				    
					<div class="title_course">
						<h5 ><?php echo wp_kses_post( get_the_title() ); ?></h5>
					</div>
				    
					<div class="text_course">
						<p class="no-margin"><?php echo wp_kses_post( get_the_excerpt() ); ?></p>
					</div>
					<div class = "duration">
						<p>Duración: <span><?php 
						$duration = get_post_custom(get_the_ID(), 'duracion', TRUE); 		
						echo $duration["duracion"][0]. '&nbsp; <span style="color:#333333;">|</span> &nbsp; '.Sensei()->course->course_lesson_count( get_the_ID() ). " Videos";
						

						?></span>
							
						</p>
					</div>
				    <div class="btn-pay" >
				    	<a href="<?php echo wp_kses_post( get_the_permalink() ); ?>" class="btn btn-primary "> <?php echo $price_p." mxn "; ?></a>
				    </div>
					
			
				     
				</div>
			<!--
	    		<div class="row">          	
	                <div class="card" style="width: 280px;">
						<div class="card-body">
						    <h5 class="card-title"><?php echo wp_kses_post( get_the_title() ); ?></h5>
						    <p class="card-text"><?php echo wp_kses_post( get_the_excerpt() ); ?></p>
						    <a href="<?php echo wp_kses_post( get_the_permalink() ); ?>" class="btn btn-primary">Go somewhere</a>
						    <?php echo 
							( "Videos".'&nbsp;'.Sensei()->course->course_lesson_count( get_the_ID() ) );   ?>
						</div>
					</div>
	       		</div>
	       	-->


			<?php
			/**
			 * Fires just after the course content in the content-course.php file.
			 *
			 * @since 1.9
			 *
			 * @param integer $course_id
			 *
			 * @hooked  Sensei()->course->the_course_free_lesson_preview - 20
			 */
			do_action( 'sensei_course_content_inside_after', get_the_ID() );
			?>

		</div> <!-- div .entry -->
	</div> <!-- div .course-content -->

	<?php
	/**
	 * Fires after the course block in the content-course.php file.
	 *
	 * @since 1.9
	 *
	 * @param integer $course_id
	 *
	 * @hooked  Sensei()->course->the_course_free_lesson_preview - 20
	 */
	do_action( 'sensei_course_content_after', get_the_ID() );
	?>


</li>

