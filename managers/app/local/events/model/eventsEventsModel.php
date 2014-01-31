<?php
class eventsEventsModel extends eventsEventsModel_Parent /* extends CrudModel */
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
        $this->tables = array(
			'eem_events' => ''
		);
        // $this->fields = null;
	}
	
	public function getVolunteers($event_id)
	{
		$sql = 'SELECT *
			FROM `eem_events`
			WHERE';
		$stmt = $this->db->query($sql);
		$result = array();
		while ($res = $this->db->fetch_assoc($stmt)) {
			$result[] = $this->users->getUser($res['id']);
		}
		return $result;
	}
	
	public function search($search, $params = null)
	{
		$sql = 'SELECT *
			FROM `eem_events`
			WHERE 1 ';
		if ($search['date_start']) {
			$date_start_less = $search['date_start'] - 1;
			$date_start_more = $search['date_start'] +1;
			$sql .= 'AND `date_start` BETWEEN \'' . $date_start_less . '\' AND \'' . $date_start_more . '\' ';
		} elseif ($search['date_end']) {
			$date_end_less = $search['date_end'] - 1;
			$date_end_more = $search['date_end'] +1;
			$sql .= 'AND `date_end` BETWEEN \'' . $date_end_less . '\' AND \'' . $date_end_more . '\' ';
		}
		if ($search['place']) {
			$sql .= 'AND `place` LIKE \'' . $search['place'] . '\' ';
		}
		if ($search['type']) {
			$sql .= 'AND `type` = \'' . $search['type'] . '\' ';
		}
		$stmt = $this->db->query($sql);
		$result = array();
		while ($res = $this->db->fetch_assoc($stmt)) {
			$result[] = $res;
		}
		return $res;
	}

}
?>
