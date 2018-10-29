<?php
$pages  = techmoon_cfg::get_pages();

$cols   = array();
$boxes  = array();
$sett   = array();


$pages[ 'techmoon-materialize-faq' ] = array(
    'menu' => array(
        'label'     => __( 'Materialize FAQ' , 'materialize' )
    ),
    'cols'  => & $cols,
    'boxes' => & $boxes,
    'sett'  => & $sett
);

techmoon_cfg::set_pages( $pages );
?>