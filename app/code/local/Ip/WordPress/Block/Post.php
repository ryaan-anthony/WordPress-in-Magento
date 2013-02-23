<?php

class Ip_WordPress_Block_Post extends Mage_Core_Block_Template
{
    function __construct(){
				
		$post = get_page_by_path($this->getRequest()->getParam('post_name'), OBJECT, 'post');
		
		if(!$post->ID){
				
			Mage::app()->getResponse()->setRedirect(Mage::getUrl('no-route'));
		
		} else {
					
			$this->setData('post', $post);
				
			$this->setTemplate("wordpress/post.phtml");		
		
		}
	
	}

}
?>