<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_cabang extends Mdl_utama{
    
    function __construct() {
        parent::__construct();
        $this->table = array(
            'name'      => 'cabang',
            'colomn'    => array(
                'id'                        => array('id'=>'id', 'label'=>'ID', 'key'=>true, 'visible'=>false, 'form'=>array(
                                                    array('id'=>'id1', 'label'=>'ID', 'visible'=>false, 'format'=>'HIDDEN', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'kode_cabang'               => array('id'=>'kode_cabang', 'label'=>'Kode', 'key'=>false, 'visible'=>true, 'form'=>array(
                                                    array('id'=>'kode_cabang', 'label'=>'Kode Cabang','visible'=>true, 'format'=>'LABEL', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-10'))), 
                'nama_cabang'               => array('id'=>'nama_cabang', 'label'=>'Nama Cabang', 'key'=>false, 'visible'=>true, 'form'=>array(
                                                    array('id'=>'nama_cabang', 'label'=>'Nama Cabang','visible'=>true, 'format'=>'LABEL', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-10'))), 
                'nama_perusahaan'           => array('id'=>'nama_perusahaan', 'label'=>'Nama erusahaan', 'key'=>false, 'visible'=>false, 'form'=>array(
                                                    array('id'=>'nama_perusahaan', 'label'=>'Nama Perusahaan', 'visible'=>true, 'format'=>'LABEL', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-10'))), 
                'alamat'                    => array('id'=>'alamat', 'label'=>'Alamat', 'key'=>false, 'visible'=>true, 'form'=>array(
                                                    array('id'=>'alamat', 'label'=>'Alamat', 'visible'=>true, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-10')) ), 
                'kota'                      => array('id'=>'kota', 'label'=>'Kota', 'key'=>false, 'visible'=>false, 'form'=>array(
                                                    array('id'=>'kota', 'label'=>'Kota / Kabupaten', 'visible'=>true, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-4'), 
                                                    array('id'=>'propinsi', 'label'=>'Propinsi', 'visible'=>true, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-4'))), 
                'propinsi'                  => array('id'=>'propinsi', 'label'=>'Propinsi', 'key'=>false, 'visible'=>false, 'form'=>array(array('visible'=>false))),
                'kode_pos'                  => array('id'=>'kode_pos', 'label'=>'Kode Pos', 'key'=>false, 'visible'=>false, 'form'=>array(
                                                    array('id'=>'kode_pos', 'label'=>'Kode Pos','visible'=>true, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-4'),
                                                    array('id'=>'negara', 'label'=>'Negara','visible'=>true, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-4'))), 
                'negara'                    => array('id'=>'negara', 'label'=>'Negara', 'key'=>false, 'visible'=>false, 'form'=>array(array('visible'=>false))), 
                'telp'                      => array('id'=>'telp', 'label'=>'Telp', 'key'=>false, 'visible'=>true, 'form'=>array(
                                                    array('id'=>'telp', 'label'=>'Telp','visible'=>true, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-4'),
                                                    array('id'=>'fax', 'label'=>'Fax','visible'=>true, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-4'))), 
                'fax'                       => array('id'=>'fax', 'label'=>'Fax', 'key'=>false, 'visible'=>false, 'form'=>array(array('visible'=>false))), 
                'email'                     => array('id'=>'email', 'label'=>'Email', 'key'=>false, 'visible'=>true, 'form'=>array(
                                                    array('id'=>'email', 'label'=>'Email','visible'=>true, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-10')) ), 
                'web'                       => array('id'=>'web', 'label'=>'Web', 'key'=>false, 'visible'=>false, 'form'=>array(
                                                    array('id'=>'web', 'label'=>'Website','visible'=>true, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-10')) ), 
                'no_seri_faktur_pajak'      => array('id'=>'no_seri_faktur_pajak', 'label'=>'Faktur Pajak (No Seri)', 'key'=>false, 'visible'=>false, 'form'=>array(
                                                    array('id'=>'no_seri_faktur_pajak', 'label'=>'Faktur Pajak (No Seri)', 'visible'=>true, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-10')) ), 
                'npwp'                      => array('id'=>'npwp', 'label'=>'NPWP', 'key'=>false, 'visible'=>false, 'form'=>array(
                                                    array('id'=>'npwp', 'label'=>'NPWP','visible'=>true, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-10')) ), 
                'sk_pengukuran_pkp'         => array('id'=>'sk_pengukuran_pkp', 'label'=>'SK Pengukuhan PKP', 'key'=>false, 'visible'=>false, 'form'=>array(
                                                    array('id'=>'sk_pengukuran_pkp', 'label'=>'PKP','visible'=>true, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-4'),
                                                    array('id'=>'tgl_pengukuhan', 'label'=>'Tanggal PKP', 'visible'=>true, 'format'=>'DATEPICKER', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-2')) ), 
                'tgl_pengukuhan'            => array('id'=>'tgl_pengukuhan', 'label'=>'Tanggal Pengukuhan', 'key'=>false, 'visible'=>false, 'form'=>array(array('visible'=>false))), 
                'tanda_tangan_1'            => array('id'=>'tanda_tangan_1', 'label'=>'Tanda Tangan 1', 'key'=>false, 'visible'=>false, 'form'=>array(array('visible'=>false))), 
                'tanda_tangan_2'            => array('id'=>'tanda_tangan_2', 'label'=>'Tanda Tangan 2', 'key'=>false, 'visible'=>false, 'form'=>array(array('visible'=>false))), 
                'jabatan_1'                 => array('id'=>'jabatan_1', 'label'=>'Jabatan 1', 'key'=>false, 'visible'=>false, 'form'=>array(array('visible'=>false))), 
                'jabatan_2'                 => array('id'=>'jabatan_2', 'label'=>'Jabatan 2', 'key'=>false, 'visible'=>false, 'form'=>array(array('visible'=>false))), 
                'tgl_mulai'                 => array('id'=>'tgl_mulai', 'label'=>'Awal Periode', 'key'=>false, 'visible'=>false, 'form'=>array(
                                                    array('id'=>'.', 'label'=>'Periode Fiskal', 'visible'=>true, 'format'=>'LABEL', 'required'=>true, 'col_css'=>'col-md-0 hide'),
                                                    array('id'=>'tgl_mulai', 'label'=>'Awal Periode', 'visible'=>true, 'format'=>'DATEPICKER', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-2'),
                                                    array('id'=>'tgl_akhir', 'label'=>'Akhir Periode', 'visible'=>true, 'format'=>'DATEPICKER', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-2')) ), 
                'tgl_akhir'                 => array('id'=>'tgl_akhir', 'label'=>'Akhir Periode', 'key'=>false, 'visible'=>false, 'form'=>array(array('visible'=>false))), 
                'kota_cetakan'              => array('id'=>'kota_cetakan', 'label'=>'Kota Cetakan', 'key'=>false, 'visible'=>false, 'form'=>array(
                                                    array('id'=>'kota_cetakan', 'label'=>'Kota Cetakan','visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-10'))), 
                'account_laba_rugi_bulanan' => array('id'=>'account_laba_rugi_bulanan', 'label'=>'Akun Laba Rugi(Bulanan) ', 'key'=>false, 'visible'=>false, 'form'=>array(
                                                    array('id'=>'account_laba_rugi_bulanan', 'label'=>'Akun Laba Rugi(Bulanan) ','visible'=>true, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-4')) ), 
                'account_laba_rugi_tahunan' => array('id'=>'account_laba_rugi_tahunan', 'label'=>'Akun Laba Rugi(Tahunan) ', 'key'=>false, 'visible'=>false, 'form'=>array(
                                                    array('id'=>'account_laba_rugi_tahunan', 'label'=>'Akun Laba Rugi(Tahunan) ','visible'=>true, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-4')) ), 
                'logo'                      => array('id'=>'logo', 'label'=>'LOGO', 'key'=>false, 'visible'=>false, 'form'=>array(
                                                    array('id'=>'logo', 'label'=>'LOGO','visible'=>true, 'format'=>'IMAGE', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-4'),
                                                    array('id'=>'kop', 'label'=>'KOP','visible'=>true, 'format'=>'IMAGE', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-4')   ) ), 
                
            ),
            'idkey'     => 'id',
            'join'      => array(),
            'where'     => array(),
            'order'     => array(),
        );
    }
    
    
    function getListData($params)
    {
        $data_array = $this->getList($params);
        if ($data_array['filter'] == 0){
                $list_array = array();
            } else {
                $list_array = $data_array['results'];
        }
        
        $list = array();
        if ($data_array['filter'] > 0 ){
            $no = 1;
            foreach($data_array['results'] as $row):
                $button = '<button class="btn btn-warning btn-sm btn-ubah" data-id="'.$row->id.'"> <i class="fa fa-pencil"></i> Ubah</button>&nbsp;';
                $button .= '<button class="btn btn-danger btn-sm btn-hapus" data-id="'.$row->id.'"> <i class="fa fa-trash"></i>  Hapus</button>';

                $list[] = array(
                    'no'            => $no,
                    'kode_cabang'   => $row->kode_cabang,
                    'nama_cabang'   => $row->nama_cabang,
                    'alamat'        => $row->alamat,
                    'telp'          => $row->telp,
                    'email'         => $row->email,
                    'actions'       => $button
                );
                $no++;
            endforeach;
        }
        
        $data = array(
                //'msg'               => $data_array['msg'],
                "draw"              => $params['draw'],
                "recordsTotal"      => $data_array['total'],
                "recordsFiltered"   => $data_array['filter'],
                "data"              => $list
        );
        return $data;
    }

}    