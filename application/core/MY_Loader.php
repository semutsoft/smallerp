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
        
        
        if (empty($data['CENTER_SECTION'])){
            $data['CENTER_SECTION'] = '';
        }
        $data['CENTER_SECTION']     .= $this->parser->parse($this->themes.'/layout/list/list', $data, true);
        $data['CONTENT_SECTION']    = $this->parser->parse($this->themes.'/layout/content/two_side_section', $data, true);
            
        
        $data['BODY_SECTION'] = $this->parser->parse($this->themes.'/layout/content/body_layout', $data, true);       
        $data['FOOTER_SECTION'] = $this->parser->parse($this->themes.'/layout/footer/footer', $data, true);       
        
        $data['PLUGINS_CSS']        = $this->parser->parse($this->themes.'/layout/common/datatable_plugins_css', $data, true);
        $data['PLUGINS_SCRIPT']     = $this->parser->parse($this->themes.'/layout/common/datatable_plugins_script', $data, true);
        $data['ADDON_SCRIPT']       = $this->parser->parse($this->themes.'/layout/common/datatable_script', $data, true);
        
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
        
        if (empty($data['CENTER_SECTION'])){
            $data['CENTER_SECTION'] = '';
        }
        $data['CENTER_SECTION']     .= $this->parser->parse($this->themes.'/layout/form/form', $data, true);
        $data['CONTENT_SECTION']    = $this->parser->parse($this->themes.'/layout/content/two_side_section', $data, true);
        
        $data['BODY_SECTION']       = $this->parser->parse($this->themes.'/layout/content/body_layout', $data, true);       
        $data['FOOTER_SECTION']     = $this->parser->parse($this->themes.'/layout/footer/footer', $data, true);       
        
        $data['PLUGINS_CSS']        = $this->parser->parse($this->themes.'/layout/common/form_plugins_css', $data, true);
        $data['PLUGINS_SCRIPT']     = $this->parser->parse($this->themes.'/layout/common/form_plugins_script', $data, true);
        $data['ADDON_SCRIPT']       = $this->parser->parse($this->themes.'/layout/common/form_script', $data, true);
        
        $this->parser->parse($this->themes.'/layout/main_layout', $data);
    }
    
    
    function guestLayout($vars)
    {
        $data = array();
        $data = array_merger($data, $vars);
        
        $this->parser->parse($themes.'/layout/main_layout', $data);
    }
}