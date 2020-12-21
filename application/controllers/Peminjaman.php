<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends MY_Controller
{
	private $userlogin;
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('m_peminjaman', 'm_member', 'm_buku'));
		$this->cekLogin();
		$this->userlogin = $this->getUserData();
	}

	public function index()
	{
		$data['userlogin'] = $this->userlogin;
		$data['listdata'] = $this->m_peminjaman->list_peminjaman();
		$this->template->load('template/v_layout','peminjaman/v_index', $data);
	}

	public function tambah()
	{
		$data['userlogin'] = $this->userlogin;
		$data['list_member'] = $this->m_member->listmember();
		$data['list_buku'] = $this->m_buku->listbukutersedia();
		$this->template->load('template/v_layout','peminjaman/v_tambah', $data);
	}

	public function simpan_peminjaman()
	{
		$in_data['id_peminjaman'] = 'P-' . time();
		$in_data['id_member'] = $this->input->post('id_member');
		$in_data['id_buku'] = $this->input->post('id_buku');
		$in_data['id_user'] = $this->userlogin[0]->id_user;
		$in_data['tgl_pinjam'] = date('Y-m-d H:i:s');
		$in_data['status_pinjam'] = 'Pinjam';

		if($this->m_peminjaman->insert($in_data))
		{
			$output['status_code'] = 200;
			$output['title'] = "Berhasil";
			$output['type'] = "success";
			$output['message'] = "Berhasil menambahkan peminjaman buku.";
		}
		else
		{
			$output['status_code'] = 400;
			$output['title'] = "Gagal";
			$output['type'] = "error";
			$output['message'] = "Gagal menambahkan peminjaman buku.";
		}
		echo json_encode($output);
	}
}