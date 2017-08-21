<?php
if (!function_exists("int_to_stars")){
    function int_to_stars($star=5,$full=10){
        $star=floatval($star);
        $full=intval($full);

        if ($star<0) $star = 0;
        if ($star>$full) $star = $full;

        $one = intval($star);
        $half = intval(($star-$one)>0);
        $empty = $full-$one-$half;

        return str_repeat('<i class="fa fa-star"></i> ',$one).str_repeat('<i class="fa fa-star-half-o"></i> ',$half).str_repeat('<i class="fa fa-star-o"></i> ',$empty);
    }
}
