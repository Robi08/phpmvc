<?php 

class Siswa_model{

	public function __construct(){
		$this->db = new Database;
	}

	public function getAllSiswa(){
		$this->db->query('SELECT * FROM siswa');
		return $this->db->resultSet();
	}

	public function getSiswaById($id){
		$this->db->query('SELECT * FROM siswa WHERE id=:id');
		$this->db->bind('id', $id);
		return $this->db->single();
	}

	public function tambahDataSiswa($data){
		$query = "INSERT INTO siswa (nis, nama, email, jurusan)
								VALUES
									(:nis, :nama, :email, :jurusan)";

		$this->db->query($query);
		$this->db->bind('nis', $data['nis']);
		$this->db->bind('nama', $data['nama']);
		$this->db->bind('email', $data['email']);
		$this->db->bind('jurusan', $data['jurusan']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function hapusDataSiswa($id){
		$query = "DELETE FROM siswa WHERE id = :id";
		$this->db->query($query);
		$this->db->bind('id', $id);
		$this->db->execute();

		return $this->db->rowCount();	
	}

		public function ubahDataSiswa($data){
		$query = "UPDATE siswa SET
									nis = :nis, 
									nama = :nama, 
									email = :email, 
									jurusan = :jurusan
								WHERE
									id = :id";

		$this->db->query($query);
		$this->db->bind('id', $data['id']);
		$this->db->bind('nis', $data['nis']);
		$this->db->bind('nama', $data['nama']);
		$this->db->bind('email', $data['email']);
		$this->db->bind('jurusan', $data['jurusan']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariDataSiswa(){
		$keyword = $_POST['keyword'];
		$query = "SELECT * FROM siswa 
								WHERE
									nis LIKE :keyword OR 
									nama LIKE :keyword OR 
									email LIKE :keyword OR 
									jurusan LIKE :keyword";
		$this->db->query($query);
		$this->db->bind('keyword', "%$keyword%");		
		return $this->db->resultSet();
	}
}