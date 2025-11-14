<?php
if(!defined('ABSPATH')) exit;
global $safirOptions;
$safirOptions = get_option("safir_" . SAFIR_THEME_SLUG . "_safirpanel");
$safirOptions = apply_filters( 'safirGetOptions', $safirOptions );
