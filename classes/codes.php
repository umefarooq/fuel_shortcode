<?php

/**
 * wordpress shortcode port to fuel now power up your cms with shortcode
 * 
 * @package     Fuel shortcode
 * @author      umefarooq
 * @license     MIT license
 * @link        https://github.com/umefarooq/fuel_shortcode
 */


namespace ShortCode;

class Codes {
    
    private static $shortcode;
    
    function __construct() {
        
    }
    
    //put your code here
    public static function footag_func($atts) {
//    print_r($atts);
    return "foo = {$atts['foo']}";
}

    public static function bartag_func($atts) {

      	extract($this->shortcode->shortcode_atts(array(
      		'foo' => 'no foo',
      		'baz' => 'default baz',
      	), $atts));
     
      	return "foo = {$foo}";
 }
 
 public static function jqtools_tab_group($atts, $content) {
   self::$shortcode = new Shortcode();
    $GLOBALS['tab_count'] = 0;

    self::$shortcode->add('tab','Codes::jqtools_tab');
    self::$shortcode->do_shortcode($content);
       
    if (is_array($GLOBALS['tabs'])) {
        $i = 1;
        foreach ($GLOBALS['tabs'] as $tab) {
            $tabs[] = '<li><a class="" href="#tab'.$i.'">' . $tab['title'] . '</a></li>';
            $panes[] = '<div class="tab'.$i.'"><h3>' . $tab['title'] . '</h3><p>' . $tab['content'] . '</p></div>';
            $i++;
        }
        $return = "\n" . '<div class="tabs"><!-- the tabs --><ul>' . implode("\n", $tabs) . '</ul>' . "\n" . '<!-- tab "panes" --><div class="tabs-content">' . implode("\n", $panes) . '</div></div>' . "\n";
    }
    return $return;
}



public static function jqtools_tab($atts, $content) {
    
    extract(self::$shortcode->shortcode_atts(array(
                'title' => 'Tab %d'
                    ), $atts));

    $x = $GLOBALS['tab_count'];
    $GLOBALS['tabs'][$x] = array('title' => sprintf($title, $GLOBALS['tab_count']), 'content' => $content);

    $GLOBALS['tab_count']++;
}
 
}

?>
