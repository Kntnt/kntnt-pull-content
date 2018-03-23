<?php

/**
 * Plugin main file.
 *
 * @wordpress-plugin
 * Plugin Name:       Kntnt's Pull  Content plugin
 * Plugin URI:        https://www.kntnt.com/
 * Description:       Adds shortcode to make pull quotes, sidebars and similar content modules.
 * Version:           1.0.0
 * Author:            Thomas Barregren
 * Author URI:        https://www.kntnt.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       kntnt-pull-content
 * Domain Path:       /languages
 */
 
defined('WPINC') || die;

// Bootstrap the plugin.
(new Kntnt_Pull_Content())->run();

// Plugin main class.
class Kntnt_Pull_Content {

  // This plugin's namespace
  private $ns;

  // Construct an object of this class.
  public function __construct() {
    $this->ns = basename(dirname(__FILE__));
    $this->load_dependencies();
    $this->load_textdomain();
  }
  
  // Setup public and administrative interfaces.
  public function run() {
    $cn = strtr(ucwords($this->ns, '-'), '-', '_');
    (new ReflectionClass("{$cn}_Public"))->newInstance($this->ns);
  }

  // Load public and administrative interfaces.
  private function load_dependencies() {
    require_once plugin_dir_path(__FILE__) . "public/class-{$this->ns}-public.php";
  }

  // Load localization.
  private function load_textdomain() {
    load_plugin_textdomain(
      $this->ns,
      false,
      "{$this->ns}/languages/"
    );
  }

}
