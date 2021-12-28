<?php
if (! function_exists('randomColor')) {
    function randomColor(){
        $color = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
        return "'$color'";
    }
}