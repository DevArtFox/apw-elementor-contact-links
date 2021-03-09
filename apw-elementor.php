<?php
/**
 * Plugin Name: Elementor Contact Link
 * Description: Динамические ссылки на контактную инфоормацию
 * Plugin URI:  https://github.com/DevArtFox/apw-elementor-contact-link-addon
 * Version:     1.0.0
 * Author:      Alexandr.pw
 * Author URI:  https://github.com/DevArtFox
 * Text Domain: apw-elementor-addons
 */
namespace ApwWebSite;
use Elementor\Plugin;

if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'elementor/widgets/widgets_registered', function() {
	wp_register_style('apw-elementor-style', plugins_url('inc/style.css', __FILE__));
	wp_enqueue_style('apw-elementor-style');

	require_once('widget.php');
	// Передаем имена виджетов
	$dyn_phone = new DynPhone();

	// Подключаем виджеты к Elementor
	Plugin::instance()->widgets_manager->register_widget_type( $dyn_phone );
}); 