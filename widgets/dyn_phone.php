<?php
namespace ApwWebSite;

use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use Elementor\Modules\DynamicTags\Module as TagsModule;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;

class DynPhone extends Widget_Base {

	public static $slug = 'apw-name_widget';

	public function get_name() { return self::$slug; }

	public function get_title() { return __('Телефон', self::$slug); }

	public function get_icon() { return 'eicon-site-title'; }

	public function get_categories() { return [ 'general' ];}
  
	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Телефон', 'apw-elementor-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'phone',
			[
				'label' => __( 'Телефон', 'apw-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '', 'apw-elementor-addon' ),
				'placeholder' => __( 'Введите номер телефона', 'apw-elementor-addon' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);
		$this->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'apw-elementor-addon' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'style_section',
			[
				'label' => __( 'Style Section', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'plugin-name' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'plugin-name' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'plugin-name' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-widget-container' => 'text-align: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'global' => [],
			]
		);

		$this->end_controls_section();
	} 
	protected function render() {
		$settings = $this->get_settings_for_display();
		$phone = $settings['phone'];
		$icon = $settings['icon'];
		echo '<div class="dyn_phone">'; ?>
		<a href="tel:<?php echo $phone ?>">
			<?php if(!empty($icon['value'])){?><span><i class="<?php echo $icon['value']?>"></i></span><?php } ?>
			<?php echo $phone ?></a>
		<?php echo '</div>';
	}
	protected function _content_template() {
		?>
		<div class='dyn_phone'>
			<a href="#"><span><i class="{{ settings.icon }}"></i></span>{{{ settings.phone }}}</a>
		</div>
		<?php
	}
}  