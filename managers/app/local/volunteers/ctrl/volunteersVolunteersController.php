<?php
class volunteersVolunteersController extends volunteersVolunteersController_Parent // extends crudCrudController
{
	protected $ns;
	protected $users;
	protected $cssjs;
	protected $volunteers;
	
	public function __construct($request = null, $params = null)
	{
		parent::__construct($request, $params);
		$this->ns = $this->getModel('fonctions');
		$this->users = $this->getModel('users');
		$this->cssjs = $this->getModel('cssjs');
		$this->volunteers = $this->_crud;
	}

    public function indexAction($request, $params = null)
    {
        $this->data['titre'] = 'Vos bénévoles';
		if ($auth = $this->users->getAuth()) {
			// $params['where'] = '`eem_events`.`clementine_users_id` = \'' . $auth['id'] . '\' ';
		}
		$this->register_cssjs($params);
		return parent::indexAction($request, $params);
	}
	
	public function createAction($request, $params = null)
	{
		$this->data['titre'] = 'Inscrire un bénévole';
		return parent::createAction($request, $params);
	}
	
	public function updateAction($request, $params = null)
	{
		$this->data['titre'] = 'Modifier un bénévole';
		$this->hideSection('delbutton');
		return parent::updateAction($request, $params);
	}
	
	public function validate($insecure_array, $insecure_primary_key = null)
	{
		return $insecure_array;
	}
	
	public function rename_fields($params = null)
	{
        $this->mapFieldName('eem_volunteers.height', 'Taille');
        $this->mapFieldName('eem_volunteers.weight', 'Poids');
        $this->mapFieldName('eem_volunteers.driving_card', 'Permis de conduire');
		$this->mapFieldName('eem_profil.surname', 'Nom');
        $this->mapFieldName('eem_profil.firstname', 'Prénom');
        $this->mapFieldName('eem_profil.country', 'Pays');
	}

	public function hide_fields($params = null)
    {
		$this->hideField('clementine_users.id');
        $this->hideField('clementine_users.password');
        $this->hideField('clementine_users.salt');
        $this->hideField('clementine_users.code_confirmation');
        $this->hideField('clementine_users.date_modification');
        $this->hideField('clementine_users.date_creation');
        $this->hideField('clementine_users.active');
		$this->HideField('eem_profil.clementine_users_id');
		$this->HideField('eem_links_events_volunteers.eem_managers_id');
		$this->HideField('eem_links_events_volunteers.eem_events_id');
		$this->HideField('eem_links_events_volunteers.eem_jobs_id');
		$this->HideField('eem_links_events_volunteers.eem_volunteers_id');
		$this->hideField('eem_volunteers.clementine_users_id');
	}
	
	public function hide_sections($params = null)
	{
		$this->hideSection('readbutton');
		$this->hideSection('deletebutton');
		$this->hideSection('xlsbutton');
	}
	
	public function register_cssjs($params)
    {
        // dataTables : sortable tables
        $this->cssjs->register_css('jquery.dataTables',  array('src' => __WWW_ROOT_JSTOOLS__ . '/skin/js/jquery.dataTables/dataTables.css'));
        $this->cssjs->register_js('jquery.dataTables', array('src' => __WWW_ROOT_JSTOOLS__ . '/skin/js/jquery.dataTables/jquery.dataTables.min.js'));
        $this->cssjs->register_foot('clementine_jstools-datatables', $this->getBlockHtml('jstools/js_datatables', $this->data));
        $this->cssjs->register_foot('clementine_crud-list_table_hover', $this->getBlockHtml('crud/js_list_table_hover', $this->data));
	}

}
?>
