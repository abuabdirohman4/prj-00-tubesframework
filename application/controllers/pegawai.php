<?php

class pegawai extends CI_controller
{
	public $model = null;

	public function __construct()
	{
		parent::__construct();

		$this->load->model('pegawai_model');
		$this->model = $this->pegawai_model;

		$this->load->database();
	}

	public function index()
	{
		$this->load->view('master/header');
		$this->read();
		$this->load->view('master/footer');
	}

	public function create()
	{
		if (isset($_POST['btnsubmit'])) {

			$this->load->view('master/header');
			$this->model->insert();
			redirect('pegawai');
			$this->load->view('master/footer');
		} else {

			$last_id = $this->model->db->query("SELECT * FROM pegawai ORDER BY id_pegawai DESC LIMIT 1")->result()[0]->id_pegawai;
			$id_number = (int) substr($last_id, 1, 3);
			$id_number++;
			$id_number = (string) $id_number;
			if (strlen($id_number) == 1)
				$id_string = 'P00' . $id_number;
			else if (strlen($id_number) == 2)
				$id_string = 'P0' . $id_number;
			else
				$id_string = 'P' .  $id_number;

			$this->load->view('master/header');
			$this->load->view('pegawai_create_view', ['model' => $this->model, 'id_string' => $id_string]);
			$this->load->view('master/footer');
		}
	}

	public function read()
	{
		$rows = $this->model->read();

		$this->load->view('pegawai_read_view', ['rows' => $rows]);
	}

	public function update($id)
	{
		if (isset($_POST['btnsubmit'])) {
			$this->load->view('master/header');
			$this->model->id_pegawai = $_POST['id_pegawai'];
			$this->model->nama_pegawai = $_POST['nama_pegawai'];
			$this->model->alamat = $_POST['alamat'];
			$this->model->no_telp = $_POST['no_telp'];

			$this->model->update();
			redirect('pegawai');
			$this->load->view('master/footer');
		} else {
			$this->load->view('master/header');
			$query = $this->db->query("SELECT * FROM pegawai where id_pegawai='$id'");
			if ($query->num_rows() > 0) {
				$row = $query->row();
				$this->model->id_pegawai = $row->id_pegawai;
				$this->model->nama_pegawai = $row->nama_pegawai;
				$this->model->alamat = $row->alamat;
				$this->model->no_telp = $row->no_telp;
				$this->load->view('pegawai_update_view', $row);
			} else {
				echo "<script>alert('TIDAK KETEMU')</script>";
				$this->load->view('pegawai_update_view', ['model' => $this->model]);
			}
			$this->load->view('master/footer');
		}
	}

	public function delete($id)
	{
		$this->model->db->query('SET FOREIGN_KEY_CHECKS=0');
		$this->model->id_pegawai = $id;
		$this->model->delete();
		$this->model->db->query('SET FOREIGN_KEY_CHECKS=1');
		redirect('pegawai');
	}

	public function storecreate()
	{
		$rules =

			[
				[
					'field' => 'id_pegawai',
					'label' => 'Id Pegawai',
					'rules' => 'required|numeric',
					'errors' => [
						'required' => "%s harus diisi",
						'numeric' => "%s hanya berisi angka spasi"
					],
				],


				[
					'field' => 'nama',
					'label' => 'Nama Pegawai',
					'rules' => 'required',
					'errors' => [
						'required' => "%s harus diisi"
					],
				],

				[
					'field' => 'alamat',
					'label' => 'Alamat',
					'rules' => 'required',
					'errors' => [
						'required' => "%s harus diisi"
					],
				],
				[
					'field' => 'no_telp',
					'label' => 'Nomor',
					'rules' => 'required|numeric',
					'errors' => [
						'required' => "%s harus diisi",
						'numeric' => "%s hanya berisi angka spasi"
					],
				],


			];



		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == False) {

			$data = [];

			$this->load->view('master/header', $data);
			$this->load->view('pegawai_create_view', $data);
			$this->load->view('master/footer', $data);
		} else {

			$this->load->model('pegawai_model');
			$this->pegawai_model->insert();
			redirect('pegawai');
		}
	}

	public function storeupdate()
	{
		$rules =

			[
				[
					'field' => 'id_pegawai',
					'label' => 'Id Pegawai',
					'rules' => 'required|numeric',
					'errors' => [
						'required' => "%s harus diisi",
						'numeric' => "%s hanya berisi angka spasi"
					],
				],


				[
					'field' => 'nama_pegawai',
					'label' => 'Nama Pegawai',
					'rules' => 'required',
					'errors' => [
						'required' => "%s harus diisi"
					],
				],

				[
					'field' => 'alamat',
					'label' => 'Alamat',
					'rules' => 'required',
					'errors' => [
						'required' => "%s harus diisi"
					],
				],
				[
					'field' => 'no_telp',
					'label' => 'Nomor',
					'rules' => 'required|numeric',
					'errors' => [
						'required' => "%s harus diisi",
						'numeric' => "%s hanya berisi angka spasi"
					],
				],

			];



		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == False) {

			$data = [];

			$this->load->view('master/header', $data);
			$this->load->view('pegawai_update_view', $data);
			$this->load->view('master/footer', $data);
		} else {


			$this->load->model('pegawai_model');
			$this->pegawai_model->update();
			redirect('pegawai');
		}
	}
}
