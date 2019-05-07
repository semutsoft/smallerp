<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_perusahaan extends Mdl_utama{
    
    function __construct() {
        parent::__construct();
        $this->table = array(
            'name'      => 'mst_company',
            'colomn'    => array(
                'company_id'                        => array('id'=>'company_id', 'label'=>'ID', 'key'=>true, 'visible'=>false, 'form'=>array(
                                                    array('id'=>'company_id', 'label'=>'ID', 'visible'=>false, 'format'=>'HIDDEN', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'kode'                      => array('id'=>'kode', 'label'=>'KODE', 'key'=>false, 'visible'=>false, 'form'=>array(
                                                    array('id'=>'kode', 'label'=>'Kode','visible'=>true, 'format'=>'LABEL', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-10'))), 
                'company_name'              => array('id'=>'company_name', 'label'=>'Nama Perusahaan', 'key'=>false, 'visible'=>false, 'form'=>array(
                                                    array('id'=>'company_name', 'label'=>'Nama Perusahaan','visible'=>true, 'format'=>'LABEL', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-10'))), 
                'company_fullname'          => array('id'=>'company_fullname', 'label'=>'Nama Lengkap Perusahaan', 'key'=>false, 'visible'=>false, 'form'=>array(
                                                    array('id'=>'company_fullname', 'label'=>'Nama Lengkap Perusahaan', 'visible'=>true, 'format'=>'LABEL', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-10'))), 
                'company_address'           => array('id'=>'company_address', 'label'=>'Alamat', 'key'=>false, 'visible'=>false, 'form'=>array(
                                                    array('id'=>'company_address', 'label'=>'Alamat', 'visible'=>true, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-10')) ), 
                'company_city'              => array('id'=>'company_city', 'label'=>'Kota', 'key'=>false, 'visible'=>false, 'form'=>array(
                                                    array('id'=>'company_city', 'label'=>'Kota / Kabupaten', 'visible'=>true, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-4'), 
                                                    array('id'=>'company_province', 'label'=>'Propinsi', 'visible'=>true, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-4'))), 
                'company_province'          => array('id'=>'company_province', 'label'=>'Propinsi', 'key'=>false, 'visible'=>false),
                'company_zip'               => array('id'=>'company_zip', 'label'=>'Kode Pos', 'key'=>false, 'visible'=>false, 'form'=>array(
                                                    array('id'=>'company_zip', 'label'=>'Kode Pos','visible'=>true, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-4'),
                                                    array('id'=>'company_country', 'label'=>'Negara','visible'=>true, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-4'))), 
                'company_country'           => array('id'=>'company_country', 'label'=>'Negara', 'key'=>false, 'visible'=>false), 
                'company_phone'             => array('id'=>'company_phone', 'label'=>'Telp', 'key'=>false, 'visible'=>false, 'form'=>array(
                                                    array('id'=>'company_phone', 'label'=>'Telp','visible'=>true, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-4'),
                                                    array('id'=>'company_fax', 'label'=>'Fax','visible'=>true, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-4'))), 
                'company_fax'               => array('id'=>'company_fax', 'label'=>'Fax', 'key'=>false, 'visible'=>false), 
                'company_email'             => array('id'=>'company_email', 'label'=>'Email', 'key'=>false, 'visible'=>false, 'form'=>array(
                                                    array('id'=>'company_email', 'label'=>'Email','visible'=>true, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-10')) ), 
                'company_url'               => array('id'=>'company_url', 'label'=>'Web', 'key'=>false, 'visible'=>false, 'form'=>array(
                                                    array('id'=>'company_url', 'label'=>'Website','visible'=>true, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-10')) ), 
                'nsfp'                      => array('id'=>'nsfp', 'label'=>'No Seri Faktur Pajak (NSFP)', 'key'=>false, 'visible'=>false, 'form'=>array(
                                                    array('id'=>'nsfp', 'label'=>'Faktur Pajak (No Seri)', 'visible'=>true, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-10')) ), 
                'npwp'                      => array('id'=>'npwp', 'label'=>'NPWP', 'key'=>false, 'visible'=>false, 'form'=>array(
                                                    array('id'=>'npwp', 'label'=>'NPWP','visible'=>true, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-10')) ), 
                'pkp'                       => array('id'=>'pkp', 'label'=>'SK Pengukuhan PKP', 'key'=>false, 'visible'=>false, 'form'=>array(
                                                    array('id'=>'pkp', 'label'=>'PKP','visible'=>true, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-4'),
                                                    array('id'=>'pkp_date', 'label'=>'Tanggal PKP', 'visible'=>true, 'format'=>'DATEPICKER', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-2')) ), 
                'pkp_date'                  => array('id'=>'pkp_date', 'label'=>'Tanggal Pengukuhan', 'key'=>false, 'visible'=>false), 
                
                'tanda_tangan_1'            => array('id'=>'tanda_tangan_1', 'label'=>'Tanda Tangan 1', 'key'=>false, 'visible'=>false), 
                'tanda_tangan_2'            => array('id'=>'tanda_tangan_2', 'label'=>'Tanda Tangan 2', 'key'=>false, 'visible'=>false), 
                'jabatan_1'                 => array('id'=>'jabatan_1', 'label'=>'Jabatan 1', 'key'=>false, 'visible'=>false), 
                'jabatan_2'                 => array('id'=>'jabatan_2', 'label'=>'Jabatan 2', 'key'=>false, 'visible'=>false), 
                'fiskal_start'              => array('id'=>'fiskal_start', 'label'=>'Awal Periode', 'key'=>false, 'visible'=>false, 'form'=>array(
                                                    array('id'=>'.', 'label'=>'Periode Fiskal', 'visible'=>true, 'format'=>'LABEL', 'required'=>true, 'col_css'=>'col-md-0 hide'),
                                                    array('id'=>'fiskal_start', 'label'=>'Awal Periode', 'visible'=>true, 'format'=>'DATEPICKER', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-2'),
                                                    array('id'=>'fiskal_end', 'label'=>'Akhir Periode', 'visible'=>true, 'format'=>'DATEPICKER', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-2')) ), 
                'fiskal_end'                => array('id'=>'fiskal_end', 'label'=>'Akhir Periode', 'key'=>false, 'visible'=>false), 
                'kota_cetakan'              => array('id'=>'kota_cetakan', 'label'=>'Kota Cetakan', 'key'=>false, 'visible'=>false, 'form'=>array(
                                                    array('id'=>'kota_cetakan', 'label'=>'Kota Cetakan','visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-10'))), 
                'account_laba_rugi_bulanan' => array('id'=>'account_laba_rugi_bulanan', 'label'=>'Akun Laba Rugi(Bulanan) ', 'key'=>false, 'visible'=>false, 'form'=>array(
                                                    array('id'=>'account_laba_rugi_bulanan', 'label'=>'Akun Laba Rugi(Bulanan) ','visible'=>true, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-4')) ), 
                'account_laba_rugi_tahunan' => array('id'=>'account_laba_rugi_tahunan', 'label'=>'Akun Laba Rugi(Tahunan) ', 'key'=>false, 'visible'=>false, 'form'=>array(
                                                    array('id'=>'account_laba_rugi_tahunan', 'label'=>'Akun Laba Rugi(Tahunan) ','visible'=>true, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-4')) ), 
                'logo'                      => array('id'=>'logo', 'label'=>'LOGO', 'key'=>false, 'visible'=>false, 'form'=>array(
                                                    array('id'=>'logo', 'label'=>'LOGO','visible'=>true, 'format'=>'IMAGE', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-4'),
                                                    array('id'=>'kop', 'label'=>'KOP','visible'=>true, 'format'=>'IMAGE', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-4')   ) ), 
                'kop'                       => array('id'=>'kop', 'label'=>'KOP', 'key'=>false, 'visible'=>false)
            ),
            'idkey'     => 'company_id',
            'join'      => array(),
            'where'     => array(),
            'order'     => array(),
        );
    }
    
    
    
}

