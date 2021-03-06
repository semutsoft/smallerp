<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formbuilder {
    
        protected $CI;
        public function __construct() {
            $this->CI =& get_instance();
            $this->CI->load->helper('form');
            //$this->CI->load->library('parser');            
        }
    
        function format_form($type, $id, $extra)
        {
            $data = form_label($extra['label'], $id, array('class'=>'col-sm-12 col-md-2 control-label') );            
            $data .= '<!--start fields--><div class="col-sm-12 '.$extra['col_css'].'">'."\n";
            switch($type):
                default:                    
                    $data .= form_input($id, $extra['value'], array('placeholder'=>$extra['placeholder'], 'id'=>$id, 'class'=>'form-control'));                                        
                    break;
                case 'TEXT':                    
                    $data .= form_input($id, $extra['value'], array('placeholder'=>$extra['placeholder'], 'id'=>$id, 'class'=>'form-control'));                                        
                    break;
                case 'LABEL':
                    $data .= form_label($extra['value'], $id, true);
                    break;
                case 'HIDDEN':
                    $data = '<!--start fields--><div class="col-sm-12 '.$extra['col_css'].'">'."\n";
                    $data .= form_hidden($id, $extra['value']);
                    $data .= "\n";
                    
                    break;    
                case 'PASSWORD':
                    $data .= form_password($id, $extra['value'], array('placeholder'=>$extra['placeholder'], 'id'=>$id, 'class'=>'form-control'));                                        
                    break; 
                case 'NUMBER':
                    $data .= form_input($id, $extra['value'], array('placeholder'=>$extra['placeholder']));
                    break;
                case 'EMAIL':
                    $data .= form_input($id, $extra['value'], array('placeholder'=>$extra['placeholder']));
                    break;
                case 'DATEPICKER':
                    $data .= form_input($id, $extra['value'], array('placeholder'=>$extra['placeholder'], 'class'=>'form-control datepicker'));
                    break;
                case 'TEXTAREA':
                    $data .= form_textarea($id, $extra['value'], array('placeholder'=>$extra['placeholder']));
                    break;
                case 'CHECKBOX':
                    $data .= form_checkbox($id, $extra['value'], TRUE);
                    break;
                case 'RADIO':
                    $data .= form_radio($id, $extra['value'], TRUE);
                    break;
                case 'IMAGE':
                    $data .= form_upload($id);
                    break;
                case 'FILE':
                    $data .= form_upload($id);
                    break;
            endswitch;
            
            $data .= '</div><!--End fields-->';   
            return $data;
        }
        
        
        public function show_form($fields, $detail)
        {
            $total = count($fields);
            $data = '';
            $data .= '<!--START GROUP --><div class="form-group">';
            foreach($fields as $row):
                    $id = $row['id'];
                    
                    if ($row['visible']){                        
                        $type           = $row['format'];
                        $id             = $row['id'];
                        $extra          = $row;
                        $extra['value'] = @$detail->$id;
                        $data .= $this->format_form($type, $id, $extra);
                    }
                    
            endforeach;
            $data .= '</div><!--END GROUP -->';
            
            return $data; 
        }
}