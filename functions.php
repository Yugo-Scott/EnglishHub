<?php
function get_youtube_id($url){
                parse_str( parse_url( $url, PHP_URL_QUERY ), $vars );
                return $vars['v'];  
            }
?>              