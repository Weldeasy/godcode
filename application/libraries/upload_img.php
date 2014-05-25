<?php
Class Upload_img extends CI_Model
{
	function upload_image($codigo, $nombre) {
	
		$config['upload_path'] = "media/users_profile/";
		$config['allowed_types'] = "*";
		$config['max_size'] = 2*15000;
		$config['max_width'] = 1024;
		$config['max_height'] = 1024;
		$config['file_name'] = $nombre."_".$codigo;
		$config['remove_spaces'] = TRUE;
		$config['overwrite'] = TRUE;
		
		$this->load->library('upload', $config);
		
		if (!$this->upload->do_upload('foto')) {
			$error = array('error'=>$this->upload->display_errors());
			return $error;
		} else {
			$data = $this->upload->data();
			$this->create_thumb($data['file_name']);
			
			$img_type = substr($data['file_type'], strrpos($data['file_type'], '/') + 1);
			return $data['file_name'];
		}
		
	}
	function create_thumb($imagen) {
		$config['image_library'] = "gd2";
		$config['source_image'] = "media/users_profile/".$imagen;
		$config['new_image'] = "media/users_profile/thumbs/";
		$config['thumb_marker'] = "";
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 150;
		$config['height'] = 150;
		
		$this->load->library("image_lib", $config);
		$this->image_lib->resize();
	}
}
?>