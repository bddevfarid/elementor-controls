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

$this->add_group_control(
	Group_Control_Background::get_type(),
	[
		'name' => 'content_background',
		'label' => esc_html__('Background', 'pixel-gallery'),
		'types' => ['classic', 'gradient'],
		'exclude' => ['image'],
		'selector' => '{{WRAPPER}} .pg-plex-image-wrap:before',
		'fields_options' => [
			'background' => [
				'label' => esc_html__('Overlay Color', 'pixel-gallery'),
				'default' => 'gradient',
			],
			'color' => [
				'default' => 'rgba(13, 59, 84, 0.8)',
			],
			'color_b' => [
				'default' => '#00000000',
			],
			'gradient_type' => [
				'default' => 'linear',
			],
			'gradient_angle' => [
				'default' => [
					'unit' => 'deg',
					'size' => 5,
				],
			],
		],
	]
);


$this->add_responsive_control(
            'image',
            [
                'label' => __('Image', 'ultimate-store-kit'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'selectors' => [
                    '{{WRAPPER}} .usk-featured-box .usk-image-wrap' => 'background-image: url("{{URL}}");',
                ],
                'has_sizes' => true,
                'render_type' => 'template',
            ]
        );
        $this->add_responsive_control(
            'position',
            [
                'label' => esc_html__( 'Position', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'separator' => 'before',
                'options' => [
                    '' => esc_html__( 'Default', 'elementor' ),
                    'center center' => esc_html__( 'Center Center', 'elementor' ),
                    'center left' => esc_html__( 'Center Left', 'elementor' ),
                    'center right' => esc_html__( 'Center Right', 'elementor' ),
                    'top center' => esc_html__( 'Top Center', 'elementor' ),
                    'top left' => esc_html__( 'Top Left', 'elementor' ),
                    'top right' => esc_html__( 'Top Right', 'elementor' ),
                    'bottom center' => esc_html__( 'Bottom Center', 'elementor' ),
                    'bottom left' => esc_html__( 'Bottom Left', 'elementor' ),
                    'bottom right' => esc_html__( 'Bottom Right', 'elementor' ),
                    'initial' => esc_html__( 'Custom', 'elementor' ),
    
                ],
                'selectors' => [
                    '{{WRAPPER}} .usk-featured-box .usk-image-wrap' => 'background-position: {{VALUE}};',
                ],
                'condition' => [
                    'image[url]!' => '',
                ],
            ]
        );

        $this->add_responsive_control(
            'xpos', 
            [
                'label' => esc_html__( 'X Position', 'elementor' ),
                'type' => Controls_Manager::SLIDER,
                'responsive' => true,
                'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
                'default' => [
                    'size' => 0,
                ],
                'tablet_default' => [
                    'size' => 0,
                ],
                'mobile_default' => [
                    'size' => 0,
                ],
                'range' => [
                    'px' => [
                        'min' => -800,
                        'max' => 800,
                    ],
                    'em' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                    'vw' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .usk-featured-box .usk-image-wrap' => 'background-position: {{SIZE}}{{UNIT}} {{ypos.SIZE}}{{ypos.UNIT}}',
                ],
                'condition' => [
                    'position' => [ 'initial' ],
                    'image[url]!' => '',
                ],
                'required' => true,
            ]
        );
		
        $this->add_responsive_control(
            'ypos', 
            [
                'label' => esc_html__( 'Y Position', 'elementor' ),
                'type' => Controls_Manager::SLIDER,
                'responsive' => true,
                'size_units' => [ 'px', '%', 'em', 'rem', 'vh', 'custom' ],
                'default' => [
                    'size' => 0,
                ],
                'tablet_default' => [
                    'size' => 0,
                ],
                'mobile_default' => [
                    'size' => 0,
                ],
                'range' => [
                    'px' => [
                        'min' => -800,
                        'max' => 800,
                    ],
                    'em' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                    'vh' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .usk-featured-box .usk-image-wrap' => 'background-position: {{xpos.SIZE}}{{xpos.UNIT}} {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'position' => [ 'initial' ],
                    'image[url]!' => '',
                ],
                'required' => true,
            ]
        );

        $this->add_responsive_control(
            'repeat', 
            [
                'label' => esc_html_x( 'Repeat', 'Background Control', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => esc_html__( 'Default', 'elementor' ),
                    'no-repeat' => esc_html__( 'No-repeat', 'elementor' ),
                    'repeat' => esc_html__( 'Repeat', 'elementor' ),
                    'repeat-x' => esc_html__( 'Repeat-x', 'elementor' ),
                    'repeat-y' => esc_html__( 'Repeat-y', 'elementor' ),
                ],
                'selectors' => [
                    '{{WRAPPER}} .usk-featured-box .usk-image-wrap' => 'background-repeat: {{VALUE}};',
                ],
                'condition' => [
                    'image[url]!' => '',
                ],
            ]
        );

        $this->add_responsive_control(
            'size', 
            [
                'label' => esc_html__( 'Display Size', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => esc_html__( 'Default', 'elementor' ),
                    'auto' => esc_html__( 'Auto', 'elementor' ),
                    'cover' => esc_html__( 'Cover', 'elementor' ),
                    'contain' => esc_html__( 'Contain', 'elementor' ),
                    'initial' => esc_html__( 'Custom', 'elementor' ),
                ],
                'selectors' => [
                    '{{WRAPPER}} .usk-featured-box .usk-image-wrap' => 'background-size: {{VALUE}};',
                ],
                'condition' => [
                    'image[url]!' => '',
                ],
            ]
        );

        $this->add_responsive_control(
            'bg_width', 
            [
                'label' => esc_html__( 'Width', 'elementor' ),
                'type' => Controls_Manager::SLIDER,
                'responsive' => true,
                'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
                'range' => [
                    'px' => [
                        'max' => 1000,
                    ],
                ],
                'default' => [
                    'size' => 100,
                    'unit' => '%',
                ],
                'required' => true,
                'selectors' => [
                    '{{WRAPPER}} .usk-featured-box .usk-image-wrap' => 'background-size: {{SIZE}}{{UNIT}} auto',
    
                ],
                'condition' => [
                    'size' => [ 'initial' ],
                    'image[url]!' => '',
                ],
            ]
        );
