<?php
class eventsEventsController extends eventsEventsController_Parent // extends crudCrudController
{
	protected $ns;
	protected $users;
	protected $cssjs;
	protected $events;
	
	public function __construct($request = null, $params = null)
	{
		parent::__construct($request, $params);
		$this->ns = $this->getModel('fonctions');
		$this->users = $this->getModel('users');
		$this->cssjs = $this->getModel('cssjs');
		$this->events = $this->_crud;
	}
	
    public function indexAction($request, $params = null)
    {
		if ($auth = $this->users->getAuth()) {
			$params['where'] = '`clementine_users_id` = \'' . $auth['id'] . '\'';
			$params['limit'] = '';
		}
		$this->register_cssjs($request, $params);
		parent::indexAction($request, $params);
	}
	
	public function updateAction($request, $params = null)
	{
		$this->hideSection('delbutton');
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
        $this->mapFieldName('eem_events.name', 'Nom');
		$this->mapFieldName('eem_events.place', 'Lieu');
		$this->mapFieldName('eem_events.country', 'Pays');
		$this->mapFieldName('eem_events.date_start', 'Date de début');
		$this->mapFieldName('eem_events.date_end', 'Date de fin');
		$this->mapFieldName('eem_events.nb_volunteers', 'Nombre de bénévoles');
		$this->mapFieldName('eem_events.max_volunteers', 'Maximum bénévoles');
	}

	public function hide_fields($params = null)
    {
        $this->hideField('eem_events.id');
		$this->hideField('eem_events.clementine_users_id');
		$this->hideField('eem_events.logo');
	}
	
	public function hide_sections($params = null)
	{
		$this->hideSection('readbutton');
		$this->hideSection('xlsbutton');
	}
	
	public function register_cssjs($request, $params = null)
    {
        // dataTables : sortable tables
        $this->cssjs->register_css('jquery.dataTables',  array('src' => __WWW_ROOT_JSTOOLS__ . '/skin/js/jquery.dataTables/dataTables.css'));
        $this->cssjs->register_js('jquery.dataTables', array('src' => __WWW_ROOT_JSTOOLS__ . '/skin/js/jquery.dataTables/jquery.dataTables.min.js'));
        $this->cssjs->register_foot('clementine_jstools-datatables', $this->getBlockHtml('jstools/js_datatables', $this->data));
        $this->cssjs->register_foot('clementine_crud-list_table_hover', $this->getBlockHtml('crud/js_list_table_hover', $this->data));
	}
	
	/* managers */
	
	public function volunteers_listAction($request, $params = null)
	{
		$this->data['titre'] = 'Gérer les bénévoles';
		$event_id = $request->get('int', 'eem_events-id');
		$params['where'] = '`id` = \'' . $event_id . '\'';
	}
	
	/* volunteers */
	
	public function searchAction($request, $params = null)
	{
		$date_start = $request->post('string', 'date_start');
		$date_end = $request->post('string', 'date_end');
		$place = $request->post('string', 'place');
		$type = $request->post('string', 'type');
		if ($date_start || $date_end || $place || $type) {
			$search['date_start'] = $date_start;
			$search['date_end'] = $date_end;
			$search['place'] = $place;
			$search['type'] = $type;
			$this->data['search'] = 1;
			$this->data['events'] = $this->events->search($search);
		}
	}
	
	public function registerAction($request, $params = null)
	{
		$event_id = $request->get('int', 'id');
		if ($auth = $this->users->needAuth()) {
			// check si tous les champs demandé par l'orga sont remplis
			if (true) {
				$this->data['register'] = true;
			}
		}
	}

}
?>
