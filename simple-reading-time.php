<?php
/**
 * Plugin Name: Simple Reading Time
 * Plugin URI: https://www.goran-s.in.rs/project/simple-reading-time-plugin
 * Description: Scans your article and generaters reading time.
 * Version: 1.0
 * Author: Goran Spasojevic
 * Author URI: https://www.goran-s.in.rs
 */

function get_reading_time() {
    $content = get_the_content();
    $words_count = str_word_count(strip_tags($content));
    $average_time = round($words_count / 200);

    if($average_time < 1) {
        return "<small style='line-height: 5;'>🕐 <em>Average reading time: less than a minute.</em></small> <br>" . $content;
    } else {
        return "<small style='line-height: 5;'>🕐 <em>Average reading time:   $average_time minute(s) </em></small> <br>" . $content;
    }
}

add_action('the_content', 'get_reading_time');
