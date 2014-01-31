<?php
class volunteersVolunteersModel extends volunteersVolunteersModel_Parent /* extends CrudModel */
{
    protected $db;
    protected $users;
	public $table_users = 'clementine_users';
	public $table_events = 'eem_events';
	public $table_links = 'eem_links_events_volunteers';
	public $table_profil = 'eem_profil';
	public $table_volunteers = 'eem_volunteers';

    public function __construct($request = null, $params = null)
    {
        parent::__construct($request, $params);
        $this->db = $this->getModel('db');
        $this->users = $this->getModel('users');
    }
	
	public function _init($params = null)
    {
        $this->tables = array(
			$this->table_volunteers => '',
			$this->table_users => array('inner join' => '`' . $this->table_users . '`.`id` = `' . $this->table_volunteers . '`.`clementine_users_id`'),
			$this->table_profil => array('inner join' => '`' . $this->table_profil . '`.`clementine_users_id` = `' . $this->table_volunteers . '`.`clementine_users_id`'),
			$this->table_links => array('inner join' => '`' . $this->table_links . '`.`eem_managers_id` = `' . $this->table_users . '`.`id`'),
			$this->table_links => array('inner join' => '`' . $this->table_links . '`.`eem_events_id` = `' . $this->table_events . '`.`id`'),
			// $this->table_links => array('inner join' => '`' . $this->table_links . '`.`eem_jobs_id` = `' . $this->table_jobs . '.`id`'),
			$this->table_links => array('inner join' => '`' . $this->table_links . '`.`eem_volunteers_id` = `' . $this->table_volunteers . '`.`clementine_users_id`')
		);
        // $this->fields = null;
	}
	
	public function create_or_update($params = null)
	{
		return $this->users->create_or_update($params);
	}
	
}
?>
