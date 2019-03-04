<?php

/**
 * Plugin main file.
 * @wordpress-plugin
 * Plugin Name:       Kntnt's Pull Content plugin
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

namespace Kntnt\Pull_Content;

defined('WPINC') && new Plugin;

class Plugin {

    private static $defaults = [
        'pos'   => null,
        'type'  => 'unstyled',
        'class' => null,
        'id'    => null,
    ];

    private static $positions = [
        'center',
        'wide',
        'center-wide',     // Synonym of wide
        'breakout',
        'center-breakout', // Synonym of breakout
        'banner',
        'center-banner',   // Synonym of banner
        'left',
        'left-breakout',
        'left-margin',
        'right',
        'right-breakout',
        'right-margin',
    ];

    private static $types = [
        'unstyled',
        'quote',
        'image',
        'table',
        'sidebar',
    ];

    public function __construct() {
        $this->load_textdomain();
        add_shortcode('pull', [$this, 'pull_content']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_assets']);
    }

    public function pull_content($atts, $content, $tag) {

        // Execute any shortcodes in the body of this shortcode.
        $content = do_shortcode($content);

        // Workaround for the WordPress wpautop bug.
        $content = preg_replace('@^</p>\n|\n<p>$@', '', $content);

        // Import variables to be used in the template.
        extract($this->shortcode_atts(self::$defaults, $atts));

        if (in_array($pos, self::$positions) && in_array($type, self::$types)) {

            // Add some classes.
            $class = "pull $pos $type" . ($class ? " $class" : '');

            // Get the content.
            ob_start();
            include "includes/kntnt-pull-content.php";
            $content = ob_get_clean();

        }

        return $content;

    }

    public function enqueue_assets() {
        wp_enqueue_style('kntnt-pull-content.css', plugins_url('/css/kntnt-pull-content.css', __FILE__), []);
    }

    // A more forgiving version of WP's shortcode_atts().
    private function shortcode_atts($pairs, $atts, $shortcode = '') {

        $atts = (array)$atts;
        $out = [];
        $pos = 0;
        while ($name = key($pairs)) {
            $default = array_shift($pairs);
            if (array_key_exists($name, $atts)) {
                $out[$name] = $atts[$name];
            }
            elseif (array_key_exists($pos, $atts)) {
                $out[$name] = $atts[$pos];
                ++$pos;
            }
            else {
                $out[$name] = $default;
            }
        }

        if ($shortcode) {
            $out = apply_filters("shortcode_atts_{$shortcode}", $out, $pairs, $atts, $shortcode);
        }

        return $out;

    }

    private function load_textdomain() {
        load_plugin_textdomain('kntnt-pull-content', false, "kntnt-pull-content/languages/");
    }

}
