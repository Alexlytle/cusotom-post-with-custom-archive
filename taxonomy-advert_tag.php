<?php
/**
 * Locations taxonomy archive
 */
get_header();
?>


<?php 


  
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );


    // die();

    echo get_term_parents_list( $term->term_id,  $term->taxonomy);


$the_query = new WP_Query( array(
  'post_type' => 'Adverts',
  'tax_query' => array(
      array (
          'taxonomy' => $term->taxonomy,
          'field' => 'slug',
          'terms' => $term->name,
          'include_children' => true, 
      )
  ),
) );

while ( $the_query->have_posts() ) :
    $the_query->the_post();
    // Show Posts ...

    ?>
    <h1><?php the_title();?></h1>
    <h2><?php the_content();?></h2>

    <?php the_category();?>
    <?php
endwhile;

/* Restore original Post Data 
* NB: Because we are using new WP_Query we aren't stomping on the 
* original $wp_query and it does not need to be reset.
*/
wp_reset_postdata();

?>
<?php get_footer(); ?>