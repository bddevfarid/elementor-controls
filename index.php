//Text Hide on Responsive Device
@media (min-width:768px) and (max-width:1023px) {
    .bdt-ep-image-expand-text {
        &.bdt-tablet {
            display: none;
        }
    }
}
@media (min-width:1024px) {
    .bdt-ep-image-expand-text {
        &.bdt-desktop {
            display: none;
        }
    }
}
@media (max-width:767px) {
    .bdt-ep-image-expand-text {
        &.bdt-mobile {
            display: none;
        }
    }
}

$this->add_control(
			'text_hide_on',
			[
				'label'       => __('Text Hide On', 'bdthemes-element-pack') . BDTEP_NC,
				'type'        => Controls_Manager::SELECT2,
				'multiple'    => true,
				'label_block' => false,
				'options'     => [
					'desktop' => __('Desktop', 'bdthemes-element-pack'),
					'tablet'  => __('Tablet', 'bdthemes-element-pack'),
					'mobile'  => __('Mobile', 'bdthemes-element-pack'),
				],
				'frontend_available' => true,
				'condition' => [
					'show_text' => 'yes'
				]
			]
		);

$text_hide_on_setup = '';
		if (!empty($settings['text_hide_on'])) {
			foreach ($settings['text_hide_on'] as $element) {

				if ($element == 'desktop') {
					$text_hide_on_setup .= ' bdt-desktop';
				}
				if ($element == 'tablet') {
					$text_hide_on_setup .= ' bdt-tablet';
				}
				if ($element == 'mobile') {
					$text_hide_on_setup .= ' bdt-mobile';
				}
			}
		}

<?php echo $text_hide_on_setup; ?>





// Button Icon Position
$this->add_control(
    'button_icon_align',
    [
        'label'   => esc_html__('Icon Position', 'bdthemes-element-pack'),
        'type'    => Controls_Manager::SELECT,
        'default' => 'left',
        'options' => [
            'left'  => esc_html__('Left', 'bdthemes-element-pack'),
            'right' => esc_html__('Right', 'bdthemes-element-pack'),
            'top' => esc_html__('Top', 'bdthemes-element-pack'),
            'bottom' => esc_html__('Bottom', 'bdthemes-element-pack'),
        ],
        'condition' => [
            'offcanvas_button_icon[value]!' => '',
        ],
        'selectors_dictionary' => [
            'left' => 'align-items: center;',
            'right' => 'align-items: center;',
            'top' => 'flex-direction: column; align-items: center;',
            'bottom' => 'flex-direction: column-reverse; align-items: center;',
        ],
        'selectors' => [
            '{{WRAPPER}} .elementor-button-content-wrapper' => '{{VALUE}};',
        ],
        'render_type' => 'template'
    ]
);


$this->add_group_control(
    Group_Control_Border::get_type(),
    [
        'name' => 'item_border',
        'label' => esc_html__('Border', 'elementor-addons'),
        'fields_options' => [
            'border' => [
                'default' => 'solid',
            ],
            'width' => [
                'default' => [
                    'top' => '1',
                    'right' => '1',
                    'bottom' => '1',
                    'left' => '1',
                    'unit' => 'px',
                    'isLinked' => false,
                ],
            ],
            'color' => [
                'default' => '#eaeaea',
            ],
        ],
        'selector' => '{{WRAPPER}} .class-name',
    ]
);

$this->add_group_control(
    Group_Control_Background::get_type(),
    [
        'name' => 'content_background',
        'label' => esc_html__('Background', 'pixel-gallery'),
        'types' => ['classic', 'gradient'],
        'exclude' => ['image'],
        'selector' => '{{WRAPPER}}',
        'fields_options' => [
            'background' => [
                'label' => esc_html__('Custom Background', 'pixel-gallery'),
                'default' => 'gradient',
            ],
            'color' => [
                'default' => '#fff',
            ],
            'color_b' => [
                'default' => '#000',
            ],
        ],
    ]
);


public function get_style_depends() {
        if ($this->ep_is_edit_mode()) {
            return [
                'elementor-icons-fa-solid',
                'elementor-icons-fa-brands', 
                'ep-styles'
            ];
        } else {
            return [
                'elementor-icons-fa-solid',
                'elementor-icons-fa-brands', 
                'ep-member'
            ];
        }
    }
