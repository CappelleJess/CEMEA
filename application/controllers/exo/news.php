<?php

class News extends CI_Controller
{
	// public function __construct()
	// {
	// 	parent::__construct();
	// }

	public function index()
	{
		$this->accueil();
	}

	public function accueil()
	{
		$data = array();
		$data['pseudo'] = 'Jojo';
		$data['email'] = 'email@nya.be';
		$data['en_ligne'] = true;

		$vue = $this->load->view('vue', $data, false);
	}
}