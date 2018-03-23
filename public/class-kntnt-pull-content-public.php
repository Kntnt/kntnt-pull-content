<?php

class Kntnt_Pull_Content_Public {

  // Plugin's namespace.
  private $ns;
  
  private static $defaults = [
    'pos' => null,
    'type' => 'unstyled',
    'class' => null,
    'id' => null,
  ];
      
  private static $positions = [
    'center',
    'center-wide',
    'center-breakout',
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

  public function __construct($ns) {
    $this->ns = $ns;
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
      
      ob_start();
      include "partials/{$this->ns}.php";
      $content = ob_get_clean();

    }
      
    return $content;

  }
  
  public function enqueue_assets() {
    $this->enqueue_style("{$this->ns}.css");
  }
  
  // A more forgiving version of WP's shortcode_atts().
  private function shortcode_atts($pairs, $atts, $shortcode = '') {

    $atts = (array)$atts;
    $out = array();
    $pos = 0;
    while($name = key($pairs)) {
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

  private function enqueue_style($name, $deps = []) {
    wp_enqueue_style($name, plugins_url("/css/$name", __FILE__), $deps);
  }

}
