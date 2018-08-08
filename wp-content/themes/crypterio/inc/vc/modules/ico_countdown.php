<?php

add_action('init', 'crypterio_moduleVC_ico_countdown');

function crypterio_moduleVC_ico_countdown()
{

	vc_map(array(
		'name'     => __('ICO Countdown', 'crypterio'),
		'base'     => 'stm_ico_countdown',
		'category' => __('STM', 'crypterio'),
		'params'   => array(
			array(
				'type'       => 'textfield',
				'heading'    => __('Title', 'crypterio'),
				'param_name' => 'title',
			),
			array(
				'type'       => 'dropdown',
				'heading'    => __('Get ICO data automatically from Contract', 'crypterio'),
				'param_name' => 'by_contract',
				'value'      => array(
					esc_html__('Custom', 'crypterio') => 'custom',
					esc_html__('Contract', 'crypterio') => 'contract'
				),
				'std' => 'custom'
			),
			array(
				'type'       => 'textfield',
				'heading'    => __('ICO Contract address', 'crypterio'),
				'param_name' => 'contract',
				'dependency' => array(
					'element' => 'by_contract',
					'value'   => 'contract',
				),
			),
			array(
				'type'       => 'stm_countdown_vc',
				'heading'    => __('Count to date', 'crypterio'),
				'param_name' => 'countdown',
				'holder'     => 'div',
			),
			array(
				'type'       => 'stm_countdown_vc',
				'heading'    => __('Softcap end date', 'crypterio'),
				'param_name' => 'softcap_countdown',
				'holder'     => 'div',
				'dependency' => array(
					'element' => 'by_contract',
					'value'   => 'custom',
				),
			),
			array(
				'type'       => 'attach_image',
				'heading'    => esc_html__('Background Image', 'crypterio'),
				'param_name' => 'ico_bg_image',
			),
			array(
				'type'       => 'vc_link',
				'heading'    => esc_html__('Token Buy Button', 'crypterio'),
				'param_name' => 'link',
			),
			array(
				'type'       => 'vc_link',
				'heading'    => esc_html__('Whitepaper link', 'crypterio'),
				'param_name' => 'wp_link',
				'dependency' => array(
					'element' => 'by_contract',
					'value'   => 'custom',
				),
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__('Sale tokens price (number format)', 'crypterio'),
				'param_name' => 'price_num',
				'dependency' => array(
					'element' => 'by_contract',
					'value'   => 'custom',
				),
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__('Sale tokens price 1', 'crypterio'),
				'param_name' => 'price_1',
				'dependency' => array(
					'element' => 'by_contract',
					'value'   => 'custom',
				),
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__('Sale tokens price label 1', 'crypterio'),
				'param_name' => 'price_label_1',
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__('Sale tokens price 2', 'crypterio'),
				'param_name' => 'price_2',
				'dependency' => array(
					'element' => 'by_contract',
					'value'   => 'custom',
				),
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__('Sale tokens price label 2', 'crypterio'),
				'param_name' => 'price_label_2',
				'dependency' => array(
					'element' => 'by_contract',
					'value'   => 'custom',
				),
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__('Softcap price (number format)', 'crypterio'),
				'param_name' => 'softcap',
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__('Softcap label', 'crypterio'),
				'param_name' => 'softcap_label',
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__('Softcap label 2', 'crypterio'),
				'param_name' => 'softcap_label_2',
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__('Hardcap price (number format)', 'crypterio'),
				'param_name' => 'hardcap',
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__('Hardcap label', 'crypterio'),
				'param_name' => 'hardcap_label',
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__('Hardcap label 2', 'crypterio'),
				'param_name' => 'hardcap_label_2',
			),
			array(
				'type'       => 'attach_images',
				'heading'    => esc_html__('Payments', 'crypterio'),
				'param_name' => 'payments'
			),
			array(
				'type'        => 'exploded_textarea_safe',
				'heading'     => __('Custom links', 'js_composer'),
				'param_name'  => 'custom_links',
				'description' => __('Enter links for each payment (Note: divide links with linebreaks (Enter)).', 'js_composer'),
				'dependency'  => array(
					'element' => 'onclick',
					'value'   => array('payments'),
				),
			),
			/*Custom Popup*/
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__('Show popup', 'crypterio'),
				'param_name' => 'show_popup',
				'value'      => array(
					esc_html__('Hide', 'crypterio') => 'hide',
					esc_html__('Show', 'crypterio') => 'show',
				),
				'group'      => __('Popup', 'crypterio'),
				'std'        => 'hide',
				'dependency' => array(
					'element' => 'by_contract',
					'value'   => 'custom',
				),
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__('Popup Title', 'crypterio'),
				'param_name' => 'popup_title',
				'group'      => __('Popup', 'crypterio'),
				'dependency' => array(
					'element' => 'show_popup',
					'value'   => array('show'),
				),
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__('Contract address', 'crypterio'),
				'param_name' => 'popup_address',
				'group'      => __('Popup', 'crypterio'),
				'dependency' => array(
					'element' => 'show_popup',
					'value'   => array('show'),
				),
			),
			array(
				'type'       => 'textarea',
				'heading'    => esc_html__('Popup description', 'crypterio'),
				'param_name' => 'popup_desc',
				'group'      => __('Popup', 'crypterio'),
				'dependency' => array(
					'element' => 'show_popup',
					'value'   => array('show'),
				),
			),
			array(
				'type'       => 'vc_link',
				'heading'    => esc_html__('Popup link', 'crypterio'),
				'param_name' => 'popup_link',
				'group'      => __('Popup', 'crypterio'),
				'dependency' => array(
					'element' => 'show_popup',
					'value'   => array('show'),
				),
			),
			/*Whitepaper Popup*/
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__('Popup Title', 'crypterio'),
				'param_name' => 'popup_title_contract',
				'group'      => __('Popup', 'crypterio'),
				'dependency' => array(
					'element' => 'by_contract',
					'value'   => 'contract',
				),
			),
			array(
				'type'       => 'textarea',
				'heading'    => esc_html__('Popup Subtitle', 'crypterio'),
				'param_name' => 'popup_subtitle',
				'group'      => __('Popup', 'crypterio'),
				'dependency' => array(
					'element' => 'by_contract',
					'value'   => 'contract',
				),
			),
			array(
				'type'       => 'textarea',
				'heading'    => esc_html__('Expected ETH ICO Participation Amount Description', 'crypterio'),
				'param_name' => 'popup_amount_desc',
				'group'      => __('Popup', 'crypterio'),
				'dependency' => array(
					'element' => 'by_contract',
					'value'   => 'contract',
				),
			),
			array(
				'type'       => 'textarea',
				'heading'    => esc_html__('Wallet description', 'crypterio'),
				'param_name' => 'popup_wallet_desc',
				'group'      => __('Popup', 'crypterio'),
				'dependency' => array(
					'element' => 'by_contract',
					'value'   => 'contract',
				),
			),
			array(
				'type'       => 'textarea',
				'heading'    => esc_html__('Passport Photo description', 'crypterio'),
				'param_name' => 'popup_passport_desc',
				'group'      => __('Popup', 'crypterio'),
				'dependency' => array(
					'element' => 'by_contract',
					'value'   => 'contract',
				),
			),
			array(
				'type'       => 'textarea',
				'heading'    => esc_html__('Agreement text 1', 'crypterio'),
				'param_name' => 'popup_agreement_desc_1',
				'group'      => __('Popup', 'crypterio'),
				'dependency' => array(
					'element' => 'by_contract',
					'value'   => 'contract',
				),
			),
			array(
				'type'       => 'textarea',
				'heading'    => esc_html__('Agreement text 2', 'crypterio'),
				'param_name' => 'popup_agreement_desc_2',
				'group'      => __('Popup', 'crypterio'),
				'dependency' => array(
					'element' => 'by_contract',
					'value'   => 'contract',
				),
			),




			array(
				'type'       => 'css_editor',
				'heading'    => __('Css', 'crypterio'),
				'param_name' => 'css',
				'group'      => __('Design options', 'crypterio')
			)
		)
	));
}

if (class_exists('WPBakeryShortCode')) {
	class WPBakeryShortCode_Stm_Ico_Countdown extends WPBakeryShortCode
	{
	}
}