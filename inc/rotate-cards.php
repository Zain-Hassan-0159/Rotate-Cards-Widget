<?php

if(!defined('ABSPATH')){
    exit;
}

/**
 *  Rotate Cards Widget
 *
 * @Carousal            Rotate Cards Widget
 * @author            Zain Hassan
 *
 */
   


/**
 * hz-widgets Rotate Cards Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */

class hz_Rotate_Cards extends \Elementor\Widget_Base {


	/**
	 * Get widget Stylesheet.
	 *
	 * Retrieve widget Stylesheet.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget Stylesheet.
	 */
	public function get_style_depends() {
		return [ 'rotate-cards' ];
	}
	
	/**
	 * Get widget name.
	 *
	 * Retrieve rotate widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'rca-hz';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve rotate widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Rotate Cards', 'hz-widgets' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve rotate widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-flip-box
		';
	}

	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url() {
		return 'https://developers.elementor.com/widgets/';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the rotate of categories the rotate widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return ['hz-el-widgets'];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the rotate of keywords the rotate widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'card', 'Rotate Cards Widget', 'custom', 'rotate' ];
	}

	/**
	 * Register rotate widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'face_side',
			[
				'label' => esc_html__( 'Face Side', 'hz-widgets' ),
			]
		);

		$this->add_control(
			'face_title',
			[
				'label' => esc_html__( 'Title', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'RIDING FOR THE DISABLED' , 'hz-widgets' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'face_image',
			[
				'label' => esc_html__( 'Background Image', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => RCW_PLUGIN_ASSETS_FILE . 'images/horse-scaled.jpg',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'back_side',
			[
				'label' => esc_html__( 'Back Side', 'hz-widgets' ),
			]
		);

		$this->add_control(
			'back_icon',
			[
				'label' => esc_html__( 'Background Image', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => RCW_PLUGIN_ASSETS_FILE . 'images/rda_icon.png',
				],
			]
		);

		$this->add_control(
			'back_title',
			[
				'label' => esc_html__( 'Title', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'RIDING FOR THE DISABLED' , 'hz-widgets' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'back_content',
			[
				'label' => esc_html__( 'Content', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( "<p>Tauranga RDA Equestrian Therapy Centre provides therapeutic horse related activities for children
				and adults who are challenged by physical, mental and cognitive difficulties or who have social
				needs and who are at-risk within our community. Tauranga RDA Equestrian Therapy Centre provides
				therapeutic horse related activities for children and adults who are challenged by physical,
				mental and cognitive difficulties or who have social needs and who are at-risk within our
				community.</p>" , 'hz-widgets' ),
				'show_label' => false,
			]
		);

		$this->add_control(
			'link_title',
			[
				'label' => esc_html__( 'Link Title', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'READ MORE' , 'hz-widgets' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'website_link',
			[
				'label' => esc_html__( 'Link', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .services .square2',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'style_section_face',
			[
				'label' => esc_html__( 'Face Style', 'hz-widgets' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'face_title_typography',
				'label' => esc_html__( 'Title Typogrpahy', 'hz-widgets' ),
				'selector' => '{{WRAPPER}} .services .square h4',
			]
		);

		$this->add_control(
			'face_title_align',
			[
				'label' => esc_html__( 'Alignment', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'hz-widgets' ),
						'icon' => 'eicon-text-align-left',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'hz-widgets' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'right',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .text-vertical' => 'float: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'face_title_color',
			[
				'label' => esc_html__( 'Title Color', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .services .square h4' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'style_section_back',
			[
				'label' => esc_html__( 'Back Style', 'hz-widgets' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'back_title_typography',
				'label' => esc_html__( 'Title Typogrpahy', 'hz-widgets' ),
				'selector' => '{{WRAPPER}} .services .square2 h4',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'back_content_typography',
				'label' => esc_html__( 'Content Typogrpahy', 'hz-widgets' ),
				'selector' => '{{WRAPPER}} .services .square2 p',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'back_link_typography',
				'label' => esc_html__( 'Link Typogrpahy', 'hz-widgets' ),
				'selector' => '{{WRAPPER}} .services .square2 a',
			]
		);

		$this->add_control(
			'back_title_color',
			[
				'label' => esc_html__( 'Title Color', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .services .square2 h4' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'back_content_color',
			[
				'label' => esc_html__( 'Content Color', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .services .square2 p' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'back_link_color',
			[
				'label' => esc_html__( 'Link Color', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .services .square2 a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'content_align',
			[
				'label' => esc_html__( 'Alignment', 'hz-widgets' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'hz-widgets' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'hz-widgets' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'hz-widgets' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'left',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .square-container2' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

	}


	/**
	 * Render rotate widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
        ?>
		<div class="services">
			<div class="square-flip">
				<div class="square bg-img bg-img-f-d"
					style="background-image: url(<?php echo $settings['face_image']['url']; ?>);">
					<div class="square-container d-flex align-items-end justify-content-end">
						<div class="box-title text-vertical">
							<h4><?php echo $settings['face_title']; ?></h4>
						</div>
					</div>
					<div class="flip-overlay"></div>
				</div>
				<div class="square2">
					<div class="square-container2">
						<div class="icon">
							<img decoding="async" src="<?php echo $settings['back_icon']['url']; ?>" alt="icon">
						</div>
						<h4><?php echo $settings['back_title']; ?></h4>
						<div class="services-text">
							<?php echo $settings['back_content']; ?>
						</div>
						<div class="btn-line"> 
							<?php
								if ( ! empty( $settings['website_link']['url'] ) ) {
									$this->add_link_attributes( 'website_link', $settings['website_link'] );
								}
							?>
							<a <?php echo $this->get_render_attribute_string( 'website_link' ); ?>><span><?php echo $settings['link_title']; ?></span></a> 
						</div>

					</div>
				</div>
			</div>

		</div>
		<?php
	}
}