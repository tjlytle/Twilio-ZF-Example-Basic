<?php
class IndexController extends Zend_Controller_Action
{
	protected $twilio;

    public function init()
    {
        $this->twilio = $this->getFrontController()->getParam('bootstrap')->getResource('twilio');
        $this->session = new Zend_Session_Namespace('message');
        $this->getResponse()->setHeader('Content-Type', 'application/xml');
    }

    public function indexAction() {}
    
    public function messageAction()
    {
        if($this->_hasParam('RecordingUrl')){
            $this->session->message = $this->_getParam('RecordingUrl');
            $this->getHelper('redirector')->gotoSimple('thanks');
        }
    }
    
    public function thanksAction() 
    {
        $this->view->message = $this->session->message;
    }
}