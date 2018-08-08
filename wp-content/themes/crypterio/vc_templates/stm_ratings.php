<?php
$atts = vc_map_get_attributes($this->getShortcode(), $atts);
extract($atts);

wp_enqueue_style('stm_ratings', get_template_directory_uri() . '/assets/css/shared/vc/stm_ratings.css', array(), CRYPTERIO_THEME_VERSION);
?>

<div class="stm_rating_text">
    <div class="stm_rating_text__inner">
        <div class="stm_rating_text__image"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/tmp/rating.png'); ?>" /></div>
        <div class="stm_rating_text__image stm_rating_text__image_last"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/tmp/rating.png'); ?>" /></div>
        <div class="stm_rating_text__mark">
            <?php if(!empty($mark)): ?>
                <strong><?php echo esc_attr($mark); ?></strong>
            <?php endif; ?>
			<?php if(!empty($max)): ?>
                /<?php echo esc_attr($max); ?>
			<?php endif; ?>
        </div>

        <?php if(!empty($title)): ?>
            <div class="stm_rating_text__title">
                <?php echo esc_attr($title); ?>
            </div>
        <?php endif; ?>
    </div>

</div>