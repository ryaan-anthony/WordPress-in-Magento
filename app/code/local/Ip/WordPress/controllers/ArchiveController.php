<?php

class Ip_WordPress_ArchiveController extends Mage_Core_Controller_Front_Action
{

	public function indexAction()
    {
        $this->loadLayout();          
 
        $block = $this->getLayout()->createBlock(
            'Ip_WordPress_Block_Archive',
            'wordpress'
        );
 		
        $this->getLayout()->getBlock('root')->setTemplate('page/2columns-left.phtml');
        $this->getLayout()->getBlock('content')->append($block);
        $this->_initLayoutMessages('core/session'); 
        $this->renderLayout();
    }
	
	
}

?>