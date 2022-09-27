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
