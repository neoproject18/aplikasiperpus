<?php

class M_peminjaman extends CI_Model
{
	public function list_peminjaman()
	{
		return $this->db->query("SELECT p.id_peminjaman, m.*, u.id_user, u.nama_user, b.*,
			p.tgl_pinjam, p.tgl_kembali, p.status_pinjam
			FROM tbl_peminjaman p
			JOIN tbl_member m ON m.id_member = p.id_member
			JOIN tbl_user u ON u.id_user = p.id_user
			JOIN tbl_buku b ON b.id_buku = p.id_buku
			WHERE p.status_pinjam = 'Pinjam'")->result();
	}
}