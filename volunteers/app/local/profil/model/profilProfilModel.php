<?php
class profilProfilModel extends profilProfilModel_Parent /* extends users */
{
	protected $db;
	
	public function __construct($request = null, $params = null)
	{
		parent::__construct($request, $params);
		$this->db = $this->getModel('db');
	}
	
	public function _init($params = null)
    {
        $this->tables = array(
			'clementine_users' => '',
			'eem_profil' => array('inner join' => '`eem_profil`.`clementine_users_id` = `clementine_users `.`id`'),
		);
        // $this->fields = null;
	}
	
	public function getUser($id, $more_details = false)
	{
		$sql = 'SELECT *
			FROM `clementine_users`
			INNER JOIN `eem_profil`
			ON `eem_profil`.`clementine_users_id` = `clementine_users`.`id`
			WHERE `id` = \'' . (int) $id . '\'
			LIMIT 1;';
		$stmt = $this->db->query($sql);
		if ($res = $this->db->fetch_assoc($stmt)) {
			return $res;
		}
		return false;
	}
	
	public function getVolunteer($id, $more_details = false)
	{
		$sql = 'SELECT *
			FROM `clementine_users`
			INNER JOIN `eem_profil`
			ON `eem_profil`.`clementine_users_id` = `clementine_users`.`id`
			INNER JOIN `eem_volunteers`
			ON `eem_volunteers`.`clementine_users_id` = `clementine_users`.`id`
			WHERE `id` = \'' . (int) $id . '\'
			LIMIT 1;';
		$stmt = $this->db->query($sql);
		if ($res = $this->db->fetch_assoc($stmt)) {
			return $res;
		}
		return false;
	}
}
