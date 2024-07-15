<?php

if (!function_exists('set_active')) {
    function set_active($uriSegment)
    {
        return (service('uri')->getSegment(1) == $uriSegment) ? 'active' : '';
    }
}

?>