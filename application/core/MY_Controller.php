<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller 
{
	public function cekLogin()
	{
		if(!$this->session->userdata('login_perpus'))
			redirect('');
	}

	public function getUserData()
	{
		return $this->session->userdata('login_perpus');
	}
}
