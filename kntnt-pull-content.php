<?php

/**
 * Plugin main file.
 *
 * @wordpress-plugin
 * Plugin Name:       Kntnt's Pull  Content plugin
 * Plugin URI:        https://www.kntnt.com/
 * Description:       Adds the shortcode [pull pos=… type=… class=… id=…]…[/pull] where `pos` is one of `center`, `center-wide`, `center-breakout`, `left`, `left-breakout`, `left-margin`, `right`, `right-breakout`, and`right-margin`; `type` is one of `quote`, `img`, `sidebar`, `unstyled` (default); `class` is optionally CSS class(es); and `id` is optionally CSS id for the wrapping &lt;div&gt;-element. The shortcode also supports positional arguments, thus [pull left] is equvivalent to [pull pos=left]. Any content can be used between [pull] and [/pull], e.g. &lt;blockquote&gt; for pullquotes and &lt;img&gt; for images. You probably need to add some CSS yourself to make everything look really awesome.
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
