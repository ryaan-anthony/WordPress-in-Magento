<?php

if(!class_exists('Mage_Core_Controller_Varien_Router_Standard', false)){
	require_once 'Mage/Core/Controller/Varien/Router/Standard.php';
}

class Ip_WordPress_Controller_Router extends Mage_Core_Controller_Varien_Router_Standard
{

    public function match(Zend_Controller_Request_Http $request)
    {
		$path = explode('/', trim($request->getPathInfo(), '/'));
		if($path[0] == Mage::helper('wordpress')->getBase()){
			 // Define initial values for controller initialization
			$module = 'wordpress';
			$realModule = 'Ip_WordPress';
			$controller = isset($path[1]) ? 'post' : 'archive';
			$action = 'index';
			//$action = 'action';
			$controllerClassName = $this->_validateControllerClassName(
				$realModule, 
				$controller
			);            
			// If controller was not found
			if (!$controllerClassName) {
				return false; 
			}            
			// Instantiate controller class
			$controllerInstance = Mage::getControllerInstance(
				$controllerClassName, 
				$request, 
				$this->getFront()->getResponse()
			);
			// If action is not found
			if (!$controllerInstance->hasAction($action)) { 
				return false;
			}     
			// Set request data
			$request->setModuleName($module);
			$request->setControllerName($controller);
			$request->setControllerModule($realModule); 
			$request->setActionName($action);           
			// Set your custom request parameters
			if(isset($path[1])){
				$request->setParam('post_name', $path[1]);
			}
			$request->setDispatched(true);
			$controllerInstance->dispatch($action);
			return true;
		}
		return parent::match($request);
    }
	
}

?>