<?php

class Ip_WordPress_Helper_Data extends Mage_Core_Helper_Abstract
{	

	public function getPermalink($post = null){
		$base = $this->getBase();
		$slug = $post ? $post->post_name : '';
		$path = $base.($slug ? '/'.$slug : '');
		return Mage::getUrl($path);	
	}
	
	public function getBase(){
	
		return Mage::getStoreConfig('ip_section/ip_wordpress/ip_wordpress_url');
	
	}
	
	public function getDate($post, $format = 'F jS, Y'){
	
		$time = strtotime($post->post_date);
		return date($format, $time);
	
	}
	
	public function getImage($post_id, $size = array(), $class = ''){
		
		return wp_get_attachment_image(
			get_post_thumbnail_id($post_id), 
			$size, 
			false,
			array('class' => $class)
		);
		
	}
	
}

?>