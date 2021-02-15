<?php

class Laporan extends MY_Controller
{
	private $userlogin;
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_laporan');
		$this->cekLogin();
		$this->userlogin = $this->getUserData();
	}

	public function index()
	{
		$tahun = date('Y'); // tahun saat ini 2021
		$data['userlogin'] = $this->userlogin;
		$data['list_laporan'] = $this->m_laporan->listLaporan($tahun);
		$this->template->load('template/v_layout','laporan/v_index', $data);
	}

	public function filter($tahun)
	{
		$data['userlogin'] = $this->userlogin;
		$data['list_laporan'] = $this->m_laporan->listLaporan($tahun);
		$this->template->load('template/v_layout','laporan/v_index', $data);
	}
}