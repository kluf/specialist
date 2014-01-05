<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ImageManipulator
 *
 * @author AdmiN
 */
class ImageManipulator extends CI_Model{
    public function uploadImage($uploadPath = './img', $allowedTypes = 'gif|jpg|png', $maxSize = '150', $encName = TRUE){
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = $allowedTypes;
        $config['max_size'] = $maxSize;
        $config['encrypt_name'] = $encName;
        $this->load->library('upload', $config);
        $this->upload->do_upload();
        $img = $this->upload->data();
        if (!$img['file_name']) {
            $data['img'] =  $this->input->post('img');
        } else {
            $this->load->library('image_lib');
            $config['image_library'] = 'gd2';
            $config['source_image'] = './img/faculty/'.$this->security->sanitize_filename($img['file_name']);
            $config['wm_overlay_path'] = './img/thumbnail.png';
            $config['wm_type'] = 'overlay';
            $config['wm_opacity'] = '0';
            $config['wm_vrt_alignment'] = 'bottom';
            $config['wm_hor_alignment'] = 'right';
            $this->image_lib->initialize($config);
            $this->image_lib->watermark();
            $data['img'] = $this->security->sanitize_filename($img['file_name']);
        }
        return $data['img'];
    }      
}