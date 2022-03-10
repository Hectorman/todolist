<?php
function is_home()
{
   $CI =& get_instance();
   return (!$CI->uri->segment(1))? TRUE: FALSE;
}