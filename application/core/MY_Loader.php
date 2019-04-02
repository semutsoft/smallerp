<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* load the MX_Loader class */
require APPPATH."third_party/MX/Loader.php";

class MY_Loader extends MX_Loader {
    
    
    function userLayout($vars)
    {
        if (empty($userid)){
            //redirect('users/login', 'refresh');
        }
        
        $data = array(
            'SITE_URL'  => site_url(),
            'BASE_URL'  => base_url(),
            'WEB_TITLE' => $this->config->item('web_title')
        );
        $data = array_merge($data, $vars);
        $data['HEADER_SECTION'] = $this->parser->parse($this->themes.'/layout/header/header', $data, true);
        $data['HEADER_SECTION'] .= $this->parser->parse($this->themes.'/layout/menu/sidebar_menu', $data, true);
        
        $data['BODY_SECTION'] = $this->parser->parse($this->themes.'/layout/content/body_layout', $data, true);       
        $data['FOOTER_SECTION'] = $this->parser->parse($this->themes.'/layout/footer/footer', $data, true);       
        
        $this->parser->parse($this->themes.'/layout/main_layout', $data);
    }
    
    
    function userListLayout($vars)
    {
        if (empty($userid)){
            //redirect('users/login', 'refresh');
        }
        
        $data = array(
            'SITE_URL'  => site_url(),
            'BASE_URL'  => base_url(),
            'WEB_TITLE' => $this->config->item('web_title')
        );
        $data = array_merge($data, $vars);
        $data['HEADER_SECTION'] = $this->parser->parse($this->themes.'/layout/header/header', $data, true);
        $data['HEADER_SECTION'] .= $this->parser->parse($this->themes.'/layout/menu/sidebar_menu', $data, true);
        
        $data['BODY_SECTION'] = $this->parser->parse($this->themes.'/layout/content/body_layout', $data, true);       
        $data['FOOTER_SECTION'] = $this->parser->parse($this->themes.'/layout/footer/footer', $data, true);       
        
        $this->parser->parse($this->themes.'/layout/main_layout', $data);
    }
    
    function userFormLayout($vars)
    {
        if (empty($userid)){
            //redirect('users/login', 'refresh');
        }
        
        $data = array(
            'SITE_URL'  => site_url(),
            'BASE_URL'  => base_url()
        );
        $data = array_merge($data, $vars);
        $data['HEADER_SECTION'] = $this->parser->parse($this->themes.'/layout/header/header', $data, true);
        $data['HEADER_SECTION'] .= $this->parser->parse($this->themes.'/layout/menu/sidebar_menu', $data, true);
        
        $data['BODY_SECTION'] = $this->parser->parse($this->themes.'/layout/content/body_layout', $data, true);       
        $data['FOOTER_SECTION'] = $this->parser->parse($this->themes.'/layout/footer/footer', $data, true);       
        
        $this->parser->parse($this->themes.'/layout/main_layout', $data);
    }
    
    
    function guestLayout($vars)
    {
        $data = array();
        $data = array_merger($data, $vars);
        
        $this->parser->parse($themes.'/layout/main_layout', $data);
    }
}