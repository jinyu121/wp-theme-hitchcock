<?php
if (!function_exists("theme_catch_first_image")){
    function theme_catch_first_image($default=false) {
        global $post, $posts;
        ob_start();
        ob_end_clean();
        $doc = new DOMDocument();
        @$doc->loadHTML($post->post_content);
        $img = $doc->getElementsByTagName('img');
        if($img->length > 0){
            return $img->item(0)->getAttribute('src');
        }
        return $default;
    }
}
