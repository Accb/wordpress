<?php
$atts = vc_map_get_attributes($this->getShortcode(), $atts);
extract($atts);

wp_enqueue_style('stm_roadmap_wave', get_template_directory_uri() . '/assets/css/shared/vc/stm_roadmap_wave.css', array(), CRYPTERIO_THEME_VERSION);

$roadmap = vc_param_group_parse_atts( $atts['roadmap'] );

if(!empty($roadmap)):
    $roadmap = array_splice($roadmap, -7, 7);
    $top = $bottom = array();
    $done = 0;
    foreach($roadmap as $key => $road) {
		if ( $key & 1 ) {
			$bottom[] = $road;
		} else {
			$top[] = $road;
		}

		if(!empty($road['done']) and $road['done'] == 'yes') $done = $key;
    }

    if(wp_is_mobile()) {
        $top = array_splice($roadmap, 0, 4);
        $bottom = array_splice($roadmap, -7, 3);
    }

    $done = $done * 152;

    $done = "style='width:{$done}px'";
?>

<div class="stm_wave_roadmap">

    <?php if(!empty($top)): ?>
        <div class="stm_wave_roadmap__road stm_wave_roadmap__road_top">
            <?php foreach($top as $top_road): ?>
				<?php crypterio_create_wave_road($top_road); ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <div class="stm_wave_roadmap__wave">
        <div class="unfilled">
            <svg xmlns="http://www.w3.org/2000/svg" width="1046" height="46" viewBox="0 0 1046 46">
                <path class="cls-1" d="M1454,4315h-0.02c-16.93.01-28.95,9.97-37.98,19s-24.24,21-42,21-32.97-11.97-42-21-21.06-19-38-19-28.97,9.97-38,19-24.24,21-42,21-32.97-11.97-42-21-21.06-19-38-19-28.97,9.97-38,19-24.24,21-42,21-32.97-11.97-42-21-21.06-19-38-19-28.97,9.97-38,19-24.236,21-42,21-32.97-11.97-42-21-21.06-19-38-19-28.97,9.97-38,19-24.236,21-42,21-32.97-11.97-42-21-21.06-19-38-19-28.97,9.97-38,19-24.236,21-42,21-32.97-11.97-42-21-21.06-19-38-19-28.97,9.97-38,19-24.216,20.98-41.965,21H414a3,3,0,0,1,0-6c16.964,0,27.059-9.06,37-19s25.015-21,43-21,33.059,11.06,43,21,20.036,19,37,19,27.059-9.06,37-19,25.015-21,43-21,33.059,11.06,43,21,20.036,19,37,19,27.059-9.06,37-19,25.015-21,43-21,33.059,11.06,43,21,20.036,19,37,19,27.059-9.06,37-19,25.015-21,43-21,33.06,11.06,43,21,20.04,19,37,19,27.06-9.06,37-19,25.01-21,43-21,33.06,11.06,43,21,20.04,19,37,19,27.06-9.06,37-19,25.01-21,43-21,33.06,11.06,43,21,20.04,19,37,19,27.06-9.06,37-19,25.01-21,43-21h0A3,3,0,0,1,1454,4315Z" transform="translate(-411 -4309)"/>
            </svg>
        </div>
        <div class="filled" <?php echo sanitize_text_field($done); ?>>
            <svg  xmlns="http://www.w3.org/2000/svg" width="1046" height="46" viewBox="0 0 1046 46">
                <defs>
                    <linearGradient id="stm_roadmap_fill" x1="0%" y1="0%" x2="100%" y2="0%">
                        <stop offset="0%"   stop-color="#1c7bf7"/>
                        <stop offset="100%" stop-color="#5dfad0"/>
                    </linearGradient>
                </defs>
                <path fill="url(#stm_roadmap_fill)" class="cls-1" d="M1454,4315h-0.02c-16.93.01-28.95,9.97-37.98,19s-24.24,21-42,21-32.97-11.97-42-21-21.06-19-38-19-28.97,9.97-38,19-24.24,21-42,21-32.97-11.97-42-21-21.06-19-38-19-28.97,9.97-38,19-24.24,21-42,21-32.97-11.97-42-21-21.06-19-38-19-28.97,9.97-38,19-24.236,21-42,21-32.97-11.97-42-21-21.06-19-38-19-28.97,9.97-38,19-24.236,21-42,21-32.97-11.97-42-21-21.06-19-38-19-28.97,9.97-38,19-24.236,21-42,21-32.97-11.97-42-21-21.06-19-38-19-28.97,9.97-38,19-24.216,20.98-41.965,21H414a3,3,0,0,1,0-6c16.964,0,27.059-9.06,37-19s25.015-21,43-21,33.059,11.06,43,21,20.036,19,37,19,27.059-9.06,37-19,25.015-21,43-21,33.059,11.06,43,21,20.036,19,37,19,27.059-9.06,37-19,25.015-21,43-21,33.059,11.06,43,21,20.036,19,37,19,27.059-9.06,37-19,25.015-21,43-21,33.06,11.06,43,21,20.04,19,37,19,27.06-9.06,37-19,25.01-21,43-21,33.06,11.06,43,21,20.04,19,37,19,27.06-9.06,37-19,25.01-21,43-21,33.06,11.06,43,21,20.04,19,37,19,27.06-9.06,37-19,25.01-21,43-21h0A3,3,0,0,1,1454,4315Z" transform="translate(-411 -4309)"/>
            </svg>
        </div>
    </div>

	<?php if(!empty($bottom)): ?>
        <div class="stm_wave_roadmap__road stm_wave_roadmap__road_bottom">
			<?php foreach($bottom as $bottom_road): ?>
                <?php crypterio_create_wave_road($bottom_road); ?>
			<?php endforeach; ?>
        </div>
	<?php endif; ?>


</div>

<?php endif; ?>