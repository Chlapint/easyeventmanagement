<?php
class siteIndexController extends siteIndexController_Parent
{

    public function indexAction($request, $params = null)
    {
        $this->data['titre'] = 'Easy Event Management';
        $this->data['fichier_controleur'] = __FILE__;
    }

	public function faqAction($request, $params = null)
	{
	
	}
}
?>
