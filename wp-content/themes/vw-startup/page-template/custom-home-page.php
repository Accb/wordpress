<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<?php do_action( 'vw_startup_before_slider' ); ?>

<section id="slider">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
    <?php $pages = array();
      for ( $count = 1; $count <= 3; $count++ ) {
        $mod = intval( get_theme_mod( 'vw_startup_slider_page' . $count ));
        if ( 'page-none-selected' != $mod ) {
          $pages[] = $mod;
        }
      }
      if( !empty($pages) ) :
        $args = array(
          'post_type' => 'page',
          'post__in' => $pages,
          'orderby' => 'post__in'
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
          $i = 1;
    ?>     
    <div class="carousel-inner" role="listbox">
      <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
          <img src="<?php the_post_thumbnail_url('full'); ?>"/>
          <div class="carousel-caption">
            <div class="inner_carousel">
              <h2><?php the_title(); ?></h2>
              <p><?php the_excerpt(); ?></p>
              <div class="more-btn">              
                <a href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE','vw-startup'); ?></a>
              </div>
            </div>
          </div>
        </div>
      <?php $i++; endwhile; 
      wp_reset_postdata();?>
    </div>
    <?php else : ?>
        <div class="no-postfound"></div>
    <?php endif;
    endif;?>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
    </a>
  </div>  
  <div class="clearfix"></div>
</section> 

<?php do_action( 'vw_startup_after_slider' ); ?>

<section id="services">
  <div class="container">
    <?php if( get_theme_mod('vw_startup_section_title') != ''){ ?>     
      <h3><?php echo esc_html(get_theme_mod('vw_startup_section_title',__('OUR SERVICES','vw-startup'))); ?></h3>
    <?php }?>
    <?php if( get_theme_mod('vw_startup_section_short_text') != ''){ ?>     
      <p><?php echo esc_html(get_theme_mod('vw_startup_section_short_text',__('OUR SERVICES','vw-startup'))); ?></p>
    <?php }?>
    <div class="row">
      <?php 
        $page_query = new WP_Query(array( 'category_name' => esc_html(get_theme_mod('vw_startup_service_category'),'theblog')));?>
        <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
            <div class="col-md-3 col-sm-3">
              <?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?>
              <div class="overlay-box">
                <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
              </div>
            </div>
        <?php endwhile;
        wp_reset_postdata();
      ?>
    </div>
  </div>
</section>

<?php do_action( 'vw_startup_after_about' ); ?>

<div id="content-vw" class="container">
  <?php while ( have_posts() ) : the_post(); ?>
    <?php the_content(); ?>
  <?php endwhile; // end of the loop. ?>
</div>

<?php get_footer(); ?>