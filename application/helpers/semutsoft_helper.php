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
        $data['fullname']       = $ci->session->userdata('fullname');
        $image = 'public/images/'.$ci->session->userdata('client_id').'/avatar/'.$ci->session->userdata('user_id').'/'.$ci->session->userdata('avatar');
        if (file_exists($image)){
            $avatar_image   = 'public/images/'.$ci->session->userdata('client_id').'/avatar/'.$ci->session->userdata('user_id').'/'.$ci->session->userdata('avatar');
        } else {
            $avatar_image   = 'public/images/'.$ci->session->userdata('client_id').'/avatar/default/male.jpg';
        }
        
        $data['avatar_image']   = $avatar_image;
        $data['position']       = $ci->session->userdata('position');
        
        $sidebar = $ci->parser->parse($ci->themes.'/layout/menu/sidebar_menu', $data, true);
        return $sidebar;
    }   
}

