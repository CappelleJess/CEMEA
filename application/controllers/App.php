<?php

class App extends CI_Controller {

Function tableau_de_bord()
{
	$this->load->view(head);
	$this->load->view(nav);
	$this->load->view(tableau_de_bord);
	$this->load->view(footer);

}