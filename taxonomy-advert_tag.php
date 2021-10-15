<?php
/**
 * Locations taxonomy archive
 */
get_header();
?>


<?php 
$taxonomy     = 'advert_tag';
$orderby      = 'name'; 
$show_count   = false;
$pad_counts   = false;
$hierarchical = true;
$title        = '';
$args = array(
    'taxonomy'     => $taxonomy,
    'orderby'      => $orderby,
    'show_count'   => $show_count,
    'pad_counts'   => $pad_counts,
    'hierarchical' => $hierarchical,
    'title_li'     => $title
  );
  
  
    

  

    // die();

    ?>
    <h2 style="margin: 0;">Bread Crumb</h2>
    <?php
    $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
    echo get_term_parents_list( $term->term_id,  $term->taxonomy);


    $terms = get_terms([
        'taxonomy' => $term->taxonomy,
        'hide_empty' => false,
        // 'order'=>'asc'
    ]);
    
    
    ?>
    <h2 style="margin: 0;">Menu</h2>
    <?php
   wp_list_categories( $args );
    ?>

<div class="">
<?php

?>

</div>

    
<?php
$the_query = new WP_Query( array(
  'post_type' => 'Adverts',
  'tax_query' => array(
      array (
          'taxonomy' => $term->taxonomy,
          'field' => 'slug',
          'terms' => $term->name,
          'include_children' => false, 
      )
  ),
) 
);

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
