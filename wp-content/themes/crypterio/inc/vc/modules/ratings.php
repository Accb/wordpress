<?php

add_action('init', 'crypterio_moduleVC_ratings');

function crypterio_moduleVC_ratings()
{
	vc_map(array(
		'name'        => esc_html__('Ratings', 'crypterio'),
		'base'        => 'stm_ratings',
		'icon'        => 'stm_ratings',
		'description' => esc_html__('Text Rating', 'crypterio'),
		'category'    => array(
			esc_html__('Content', 'crypterio'),
		),
		'params'      => array(

			array(
				'type'       => 'textfield',
				'heading'    => esc_html__('Mark', 'crypterio'),
				'param_name' => 'mark',
				'value'      => '',
				'holder'     => 'div'
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__('Max', 'crypterio'),
				'param_name' => 'max',
				'value'      => '',
				'holder'     => 'div'
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__('Title', 'crypterio'),
				'param_name' => 'title',
				'value'      => '',
				'holder'     => 'div'
			),
			vc_map_add_css_animation(),
			array(
				'type'       => 'css_editor',
				'heading'    => esc_html__('Css', 'crypterio'),
				'param_name' => 'css',
				'group'      => esc_html__('Design options', 'crypterio')
			)
		)
	));
}

if (class_exists('WPBakeryShortCode')) {
	class WPBakeryShortCode_Stm_Ratings extends WPBakeryShortCode
	{
	}
}