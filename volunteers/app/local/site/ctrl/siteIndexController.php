<?php
class siteIndexController extends siteIndexController_Parent
{
	protected $events;
	protected $cssjs;
	
	public function __construct($request = null, $params = null)
	{
		parent::__construct($request, $params);
		$this->events = $this->getModel('events');
		$this->cssjs = $this->getModel('cssjs');
	}
	
    public function indexAction($request, $params = null)
    {
        $this->data['fichier_controleur'] = __FILE__;
		$this->data['events'] = $this->events->getList();
		$this->cssjs->register_foot('display_form_login', $this->getBlockHtml('index/display_form_login', $this->data));
	}

}
?>
