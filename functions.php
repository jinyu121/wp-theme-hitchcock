<?php

foreach( glob( dirname( __FILE__ ) .'/functions/*.php' ) as $filename ){
    include_once( $filename );
}
