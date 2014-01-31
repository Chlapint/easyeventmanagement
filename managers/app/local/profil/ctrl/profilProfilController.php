<?php
class profilProfilController extends profilProfilController_Parent
{
	protected $users;
	protected $profil;
	
	public function __construct($request = null, $params = null)
	{
		parent::__construct($request, $params);
		$this->users = $this->getModel('users');
		$this->profil = $this->getModel('profil');
	}
	
    public function indexAction($request, $params = null)
    {
		if ($auth = $this->users->needAuth()) {
			$this->data['user'] = $this->profil->getUser($auth['id']);
		}
	}
		
	public function subscriptionAction($request, $params = null)
	{
	}
	
	public function rename_fields($params = null)
	{
        $this->mapFieldName('clementine_users.login', 'Email');
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
        $this->hideField('eem_profil.clementine_users_id');
	}
	
	public function hide_sections($params = null)
	{
		$this->hideSection('createbutton');
		$this->hideSection('readbutton');
		$this->hideSection('delbutton');
		$this->hideSection('xlsbutton');
	}

}
?>
