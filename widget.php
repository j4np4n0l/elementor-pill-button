<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Custom_Pill_Button_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'custom_pill_button';
	}

	public function get_title() {
		return esc_html__( 'Custom Pill Button', 'textdomain' );
	}

	public function get_icon() {
		return 'eicon-button';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Button Content', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'button_text',
			[
				'label'       => esc_html__( 'Text', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'START A PROJECT', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your text here', 'textdomain' ),
			]
		);

		$this->add_control(
			'button_link',
			[
				'label'       => esc_html__( 'Link', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'textdomain' ),
				'default'     => [
					'url'         => '#',
					'is_external' => false,
					'nofollow'    => false,
				],
			]
		);

		// Style Variant Dropdown Control
		$this->add_control(
			'button_style_variant',
			[
				'label'   => esc_html__( 'Color Style', 'textdomain' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'normal',
				'options' => [
					'normal'   => esc_html__( 'Normal', 'textdomain' ),
					'inverted' => esc_html__( 'Inverted (adds .inverted class)', 'textdomain' ),
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		if ( ! empty( $settings['button_link']['url'] ) ) {
			$this->add_link_attributes( 'button_link', $settings['button_link'] );
		}

		// Appends 'pill-btn' and adds 'inverted' if selected
		$classes = ['pill-btn'];
		if ( ! empty( $settings['button_style_variant'] ) && 'inverted' === $settings['button_style_variant'] ) {
			$classes[] = 'inverted';
		}

		$this->add_render_attribute( 'button_link', 'class', $classes );
		?>
		<a <?php echo $this->get_render_attribute_string( 'button_link' ); ?>>
			<?php echo esc_html( $settings['button_text'] ); ?>
		</a>
		<?php
	}
}