<?php

/*
Plugin Name: فیلتر سازی کلمات
Plugin URI: http://websolor.ir/
Description: یک افزونه ساده برای فیلتر سازی محتوای وردپرس
Author: Naeem soltany
Text Domain: Words-Filter
Version: 1.0.0
Author URI: http://websolor.ir/
*/



define('WF_DIR',plugin_dir_path(__FILE__));

define('WF_URL',plugin_dir_url(__FILE__));

define('WF_INC',WF_DIR.'/inc/');

function wf_filter_words($content){


    $word = 'وردپرس تخمی تخماتیک';

    $wordLength = mb_strlen($word);

    ////
    // $replace = 'wp';

    ////
    // $replace = '<a target="_blank" href="https://www.google.com"  > گوگل دات کام </a>';

    ////
    $replace = '<a target="_blank" href="https://www.google.com"  > وردپرس </a>';

   // $content = preg_replace("/{$word}/",$replace,$content);
    $content = preg_replace("/{$word}/",str_repeat('*',$wordLength),$content);

    return $content;

}

add_filter('the_content','wf_filter_words');

