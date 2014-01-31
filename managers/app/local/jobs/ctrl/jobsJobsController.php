<?php
class jobsJobsController extends jobsJobsController_Parent // extends crudCrudController
{
	protected $ns;
	protected $users;
	protected $cssjs;
	protected $jobs;
	
	public function __construct($request = null, $params = null)
	{
		parent::__construct($request, $params);
		$this->ns = $this->getModel('fonctions');
		$this->users = $this->getModel('users');
		$this->cssjs = $this->getModel('cssjs');
		$this->jobs = $this->_crud;
	}
	
    public function indexAction($request, $params = null)
    {
		if ($auth = $this->users->getAuth()) {
			$params['where'] = '`clementine_users_id` = ' . $auth['id'];
			$params['limit'] = '';
		}
		$this->register_cssjs($request, $params);
		return parent::indexAction($request, $params);
	}
	
	public function createAction($request, $params = null)
	{
		$auth = $this->users->getAuth();
		if ($request->POST) {
			$secure_array = $this->sanitize($request->POST);
			$secure_values = $this->validate($secure_array);
			if ($this->jobs->createFromArray($secure_values)) {
				$this->ns->redirect(__WWW__ . '/managers/jobs');
			}
		}
		$this->data['form_user'] = $this->jobs->getFormFields($auth['id']);
		parent::createAction($request, $params);
	}
	
	public function updateAction($request, $params = null)
	{
		$auth = $this->users->getAuth();
		$this->hideSection('delbutton');
		$this->data['form_user'] = $this->jobs->getFormFields($auth['id']);
		parent::updateAction($request, $params);
	}
	
	public function sanitize($insecure_array) {
		$secure_array = parent::sanitize($insecure_array);
		return $secure_array;
	}
	
	public function validate($insecure_values, $insecure_primary_key = null)
    {
		$secure_values = $insecure_values;
        return $secure_values;
    }
	
	public function rename_fields($params = null)
	{
        $this->mapFieldName('eem_jobs.name', 'Nom');
		$this->mapFieldName('eem_jobs.height-min', 'Taille min.');
		$this->mapFieldName('eem_jobs.weight-min', 'Poids min.');
		$this->mapFieldName('eem_jobs.height-max', 'Taille max.');
		$this->mapFieldName('eem_jobs.weight-max', 'Poids max.');
	}

	public function hide_fields($params = null)
    {
        $this->hideField('eem_jobs.id');
		$this->hideField('eem_jobs.clementine_users_id');
	}
	
	public function hide_sections($params = null)
	{
		$this->hideSection('readbutton');
		$this->hideSection('xlsbutton');
		$this->hideSection('savebutton');
		$this->hideSection('backbutton');
	}
	
	public function register_cssjs($request, $params = null)
    {
        // dataTables : sortable tables
        $this->cssjs->register_css('jquery.dataTables',  array('src' => __WWW_ROOT_JSTOOLS__ . '/skin/js/jquery.dataTables/dataTables.css'));
        $this->cssjs->register_js('jquery.dataTables', array('src' => __WWW_ROOT_JSTOOLS__ . '/skin/js/jquery.dataTables/jquery.dataTables.min.js'));
        $this->cssjs->register_foot('clementine_jstools-datatables', $this->getBlockHtml('jstools/js_datatables', $this->data));
        $this->cssjs->register_foot('clementine_crud-list_table_hover', $this->getBlockHtml('crud/js_list_table_hover', $this->data));
	}

}
?>
