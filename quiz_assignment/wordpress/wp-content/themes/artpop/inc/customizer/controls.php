<?php
/**
 * Theme Customizer controls
 *
 * @package Artpop
 * @since Artpop 1.0
 */


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Exit if WP_Customize_Control does not exsist.
if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}

// Important Links Control
class Artpop_Customize_Important_Links extends WP_Customize_Control {

	public $type = "artpop-important-links";

	public function render_content() {
		$important_links = array(
			'upgrade' => array(
				'link' => esc_url('https://www.designlabthemes.com/artpop-pro-wordpress-theme/?utm_source=customizer_link&utm_medium=wordpress_dashboard&utm_campaign=artpop_upsell'),
				'text' => __('Try Artpop Pro', 'artpop'),
			),
			'theme' => array(
				'link' => esc_url('https://www.designlabthemes.com/artpop-wordpress-theme/'),
				'text' => __('Theme Homepage', 'artpop'),
			),
			'documentation' => array(
				'link' => esc_url('https://www.designlabthemes.com/artpop-documentation/'),
				'text' => __('Theme Documentation', 'artpop'),
			),
			'rating' => array(
				'link' => esc_url('https://wordpress.org/support/theme/artpop/reviews/#new-post'),
				'text' => __('Rate This Theme', 'artpop'),
			),
			'instagram' => array(
				'link' => esc_url('https://www.instagram.com/designlabthemes/'),
				'text' => __('Follow Us on Instagram', 'artpop'),
			),
			'twitter' => array(
				'link' => esc_url('https://twitter.com/designlabthemes'),
				'text' => __('Follow Us on Twitter', 'artpop'),
			)
		);
		foreach ($important_links as $important_link) {
			echo '<p><a class="button" target="_blank" href="' . esc_url( $important_link['link'] ) . '" >' . esc_html( $important_link['text'] ) . ' </a></p>';
		}
	}
}

// Radio Image Control
class Artpop_Customize_Radio_Image extends WP_Customize_Control {
	public $type = 'artpop-radio-image';
	function render_content() {
		if ( empty( $this->choices ) )
		return;

		$name = '_customize-radio-' . $this->id;

		if ( ! empty( $this->label ) ) : ?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<?php endif;

		if ( ! empty( $this->description ) ) : ?>
			<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
		<?php endif; ?>

		<div class="radio-choices">
			<?php foreach ( $this->choices as $value => $item ) {
			$label = isset( $item['label'] ) ? $item['label'] : '';
			?>
				<div class="radio-item">
					<label title="<?php echo esc_attr( $label ); ?>" class="choice-item">
						<input type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), esc_attr( $value ) ); ?> />
						<div class="radio-img"><img src="<?php echo esc_url( $item['img'] ); ?>" alt=""></div>
						<span class="radio-label"><?php echo esc_html( $label ); ?></span>
					</label>
				</div>
			<?php
			} ?>
		</div>

	<?php
	}
}

// Heading Control
class Artpop_Customize_Heading extends WP_Customize_Control {
	public $type = 'artpop-heading';

	function render_content() {
	if ( ! empty( $this->label ) ) {
		echo '<span class="customize-control-title artpop-control-title">' . esc_html( $this->label ) . '</span>';
		}
	if ( ! empty( $this->description ) ) {
		echo '<div class="description customize-control-description artpop-control-description">' . esc_html( $this->description ) . '</div>';
		}
	}
}

// Separator Control
class Artpop_Customize_Separator extends WP_Customize_Control {
	public function render_content() {
		echo '<hr/>';
	}
}

// Multiple Checkbox Control
// Based on a solution by Justin Tadlock: http://justintadlock.com/archives/2015/05/26/multiple-checkbox-customizer-control
class Artpop_Customize_Checkbox_Multiple extends WP_Customize_Control {

	public $type = 'artpop-multiple-checkbox';

	public function render_content() {

		if ( empty( $this->choices ) ) :
			return;
		endif;

		if ( ! empty( $this->label ) ) : ?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<?php endif;

		if ( ! empty( $this->description ) ) : ?>
			<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
		<?php endif;

		$multi_values = ! is_array( $this->value() ) ? explode( ',', $this->value() ) : $this->value(); ?>

		<ul>
			<?php foreach ( $this->choices as $value => $label ) : ?>

				<li>
					<label>
						<input type="checkbox" value="<?php echo esc_attr( $value ); ?>" <?php checked( in_array( $value, $multi_values ) ); ?> />
						<?php echo esc_html( $label ); ?>
					</label>
				</li>

			<?php endforeach; ?>
		</ul>

		<input type="hidden" <?php $this->link(); ?> value="<?php echo esc_attr( implode( ',', $multi_values ) ); ?>" />
		<?php
	}
}

// Upsell link Control
class Artpop_Customize_Upsell extends WP_Customize_Control {
	public $type = 'artpop-upsell-link';

	function render_content() {
	$pro_version_text = esc_html__( 'Try Artpop Pro', 'artpop' );
	$pro_version_link = esc_url( 'https://www.designlabthemes.com/artpop-pro-wordpress-theme/?utm_source=customizer_link&utm_medium=wordpress_dashboard&utm_campaign=artpop_upsell' );

	if ( ! empty( $this->label ) ) {
		echo '<div class="description customize-control-description artpop-custom-description">';
		echo '<strong>' . esc_html( $this->label ) . '</strong> ';
		echo '<a target="_blank" href="' . esc_url( $pro_version_link ). '" >' . esc_html( $pro_version_text ) . '</a>';
		echo '</div>';
		}
	}
}
