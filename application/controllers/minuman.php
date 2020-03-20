<?php

class Minuman extends CI_controller
{
	public $model = null;

	function __construct()
	{
		parent::__construct();

		$this->load->model('minuman_model');
		$this->load->model('kategori_model');
		$this->model = $this->minuman_model;

		$this->load->database();
	}

	function index()
	{
		$data = [];
		$this->read();
	}

	function create()
	{
		if (isset($_POST['btnsubmit'])) {

			$this->load->view('master/header');

			$this->model->insert();
			$this->load->view('master/footer');
			redirect('minuman');
		} else {
			$this->load->view('master/header');

			$last_id = $this->model->get_last_row()[0]->id_minum;
			$id_number = (int) substr($last_id, 1, 3);
			$id_number++;
			$id_number = (string) $id_number;
			if (strlen($id_number) == 1)
				$id_string = 'M00' . $id_number;
			else if (strlen($id_number) == 2)
				$id_string = 'M0' . $id_number;
			else
				$id_string = 'M' .  $id_number;

			$kategori = $this->kategori_model->read();

			$this->load->view('minuman_create_view', ['model' => $this->model, 'kategori' => $kategori, 'id_string' => $id_string]);
			$this->load->view('master/footer');
		}
	}

	function read()
	{
		$this->load->view('master/header');
		$rows = $this->model->read();
		$this->load->view('minuman_read_view', ['rows' => $rows]);
		$this->load->view('master/footer');
	}

	function update($id)
	{
		$data = [];

		if (isset($_POST['btnsubmit'])) {
			$this->load->view('master/header');
			$this->model->id = $_POST['id_minum'];
			$this->model->nama = $_POST['nama_minum'];
			$this->model->harga = $_POST['harga'];
			$this->model->id_kategori = $_POST['id_kategori'];

			$this->model->update();
			redirect('minuman');
			$this->load->view('master/footer');
		} else {
			$this->load->view('master/header');
			$query = $this->db->query("SELECT * FROM minuman where id_minum='$id'");
			if ($query->num_rows() > 0) {
				$row = $query->row();

				$last_id = $this->model->get_last_row()[0]->id_minum;
				$id_number = (int) substr($last_id, 1, 3);
				$id_number++;
				$id_number = (string) $id_number;
				if (strlen($id_number) == 1)
					$id_string = 'M00' . $id_number;
				else if (strlen($id_number) == 2)
					$id_string = 'M0' . $id_number;
				else
					$id_string = 'M' .  $id_number;

				$kategori = $this->kategori_model->read();

				$this->model->id = $row->id_minum;
				$this->model->nama = $row->nama_minum;
				$this->model->harga = $row->harga;
				$this->model->id_kategori = $row->id_kategori;
				$this->load->view('minuman_update_view', ['row' => $row, 'kategori' => $kategori]);
				$this->load->view('master/footer');
			} else {
				echo "<script>alert('TIDAK KETEMU')</script>";
				$this->load->view('minuman_update_view', ['model' => $this->model]);
			}
			$this->load->view('master/footer');
		}
	}

	function delete($id)
	{
		$this->model->id = $id;
		$this->model->delete();
		redirect('minuman');
	}

	function insert()
	{
		$this->load->model('minuman_model');
		$this->minuman_model->insert();
	}

	function storecreate()
	{
		$rules =
			[
				[
					'field' => 'id_minum',
					'label' => 'id_minum',
					'rules' => 'required|alpha_numeric',
					'errors' => [
						'required' => "%s harus diisi",
						'Alpha_numeric' => "%s Hanya boleh berisikan huruf & angka (tidak boleh spasi)",
					]
				],


				[
					'field' => 'nama_minum',
					'label' => 'nama_minum',
					'rules' => 'required',
					'errors' => [
						'required' => "%s harus diisi",
					]
				],


				[
					'field' => 'harga',
					'label' => 'harga',
					'rules' => 'required',
					'errors' => [
						'required' => "%s harus diisi",
					]
				],
				[
					'field' => 'id_kategori',
					'label' => 'id_kategori',
					'rules' => 'required|alpha_numeric',
					'errors' => [
						'required' => "%s harus diisi",
						'Alpha_numeric' => "%s Hanya boleh berisikan huruf & angka (tidak boleh spasi)",

					]
				]


			];

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == False) {

			$data = [];

			$this->load->view('master/header', $data);
			$this->load->view('minuman_create_view', $data);
			$this->load->view('master/footer', $data);
		} else {

			$this->insert();
			$this->index();
		}
	}

	function storeupdate()
	{
		$rules =
			[
				[
					'field' => 'id_minum',
					'label' => 'id_minum',
					'rules' => 'required|alpha_numeric',
					'errors' => [
						'required' => "%s harus diisi",
						'Alpha_numeric' => "%s Hanya boleh berisikan huruf & angka (tidak boleh spasi)",
					]
				],


				[
					'field' => 'nama_minum',
					'label' => 'nama_minum',
					'rules' => 'required|alpha',
					'errors' => [
						'required' => "%s harus diisi",
						'alpha' => "%s hanya huruf a-z"
					]
				],


				[
					'field' => 'harga',
					'label' => 'harga',
					'rules' => 'required',
					'errors' => [
						'required' => "%s harus diisi",
					]
				],
				[
					'field' => 'id_kategori',
					'label' => 'id_kategori',
					'rules' => 'required|alpha_numeric',
					'errors' => [
						'required' => "%s harus diisi",
						'Alpha_numeric' => "%s Hanya boleh berisikan huruf & angka (tidak boleh spasi)",
					]
				]


			];
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == False) {

			$data = [];
			$this->load->view('master/header', $data);
			$this->load->view('minuman_create_view', $data);
			$this->load->view('master/footer', $data);
		} else {

			$this->load->model('minuman_model');
			$this->minuman_model->update();
			redirect('minuman');
		}
	}
}
