<?php

class Test extends CI_Controller
{
	public function __consruct()
	{
		parent::__construct();
	}

	public function index()
	{
		redirect(array('error', 'probleme'));
	}

	public function accueil()
	{
		$this->load->view('test', 'accueil');
	}

}