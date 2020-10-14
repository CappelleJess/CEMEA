<?php

class Forum extends CI_Controller
{
	public function accueil()
	{
		echo 'Hello World!';
	}

	public function bonjour($pseudo = '')
	{
		echo 'Salut à toi: ' . $pseudo;
	}

	public function manger($plat = '', $boisson = '')
	{
		echo 'Voici votre menu: <br />';
		echo $plat . '<br />';
		echo $boisson . '<br />';
		echo 'Bon appétit!';
	}
}