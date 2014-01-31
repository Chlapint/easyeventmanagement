<?php
class jobsJobsModel extends jobsJobsModel_Parent /* extends CrudModel */
{
    protected $db;
    protected $users;

    public function __construct($request = null, $params = null)
    {
        parent::__construct($request, $params);
        $this->db = $this->getModel('db');
        $this->users = $this->getModel('users');
    }
	
	public function _init($params = null)
    {
        $this->tables = array('eem_jobs' => '');
        // $this->fields = null;
	}
	
	public function getFormFields($managers_id)
	{
		$sql = 'SELECT *
			FROM `eem_jobs_form`
			WHERE `clementine_users_id` = \'' . (int) $managers_id . '\';';
		$stmt = $this->db->query($sql);
		$result = array();
		while ($res = $this->db->query($stmt)) {
			$result[] = $res;
		}
		return $result;
	}

}
?>
