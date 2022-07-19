<?php
/**
 * Single post partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php // echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content fs-5 fw-light">

		<?php
		the_content();
		understrap_link_pages();
		?>

		<?php if(current_user_can('administrator') && get_post_meta(get_the_ID(), 'contentful_id')): ?>
			<p>(Admins only) Original URL: <a href="https://opennorth.ca/<?php if(is_singular('post')) { echo "blogposts"; } elseif(is_singular('publications')) { echo "publications"; } ?>/<?php echo get_post_meta(get_the_ID(), 'contentful_id', TRUE); ?>_en" target="_blank"><?php echo get_post_meta(get_the_ID(), 'contentful_id', TRUE); ?></a></p>
		<?php endif; ?>

	</div><!-- .entry-content -->

</article><!-- #post-## -->

<?php // if(is_singular('post')):

//	// Schema
//	global $schema;
//	global $fullschema;
//	
//	$schema = array();
//	$fullschema = array();
//	$i = 1;
//	
//	if(have_rows('authors')):
//		while(have_rows('authors')): the_row(); 
//			$authors[] = get_sub_field('author_name'); 
//		endwhile; 
//		$allauthors = implode(', ', $authors);
//	endif;
//
//	if(isset($allauthors) && $allauthors) {
//		$the_author = $allauthors;
//	} else {
//		$the_author = 'Open North';
//	}
//
//	if(get_the_post_thumbnail()) {
//		$image = get_the_post_thumbnail_url();
//	} else {
//		$image = 'https://opennorth.ca/assets/img/logo.svg';
//	}
//	
//	$fullschema[] = array(
//		'@context'    => 'https://schema.org',
//		'@type'       => 'Article',
//		'mainEntityOfPage' => array(
//			'@type' => 'WebPage',
//			'@id' => get_permalink()
//		),
//		'headline' => get_the_title(),
//		'description' => YoastSEO()->meta->for_current_page()->description,
//		'image' => $image,
//		'author' => array(
//			'@type' => 'Person',
//			'name' => $the_author
//		),
//		'publisher' => array(
//			'@type' => 'Organization',
//			"name" => 'OpenNorth',
//			'logo' => array(
//			'@type' => 'ImageObject',
//			'url' => 'https://opennorth.ca/assets/img/logo.svg'
//			)
//		),
//		'datePublished' => get_the_date('Y-m-d')
//	);
//	
//	function generate_blog_schema ($fullschema) {
//	    global $fullschema;
//	    echo '<script type="application/ld+json">'. json_encode($fullschema) .'</script>';
//	}
//	
//	add_action( 'wp_footer', 'generate_blog_schema', 100 );

// endif;
