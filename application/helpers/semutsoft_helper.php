<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('getMenuSidebar'))
{
    function getMenuSidebar()
    {
        $ci=& get_instance();
        $ci->load->model('Mdl_menu'); 
        $ci->themes = $ci->config->item('themes');
        $data['SITE_URL']     = site_url();
        $data['BASE_URL']     = base_url();
        $data['MENU_SIDEBAR'] = $ci->Mdl_menu->getMenuSidebar();
        $sidebar = $ci->parser->parse($ci->themes.'/layout/menu/sidebar_menu', $data, true);
        return $sidebar;
    }   
}

