<?php

class Minuman extends CI_controller
{
	public $model = null;

	public function __construct()
	{
		parent::__construct();

		$this->load->model('minuman_model');
		$this->load->model('kategori_model');
		$this->model = $this->minuman_model;

		$this->load->database();
	}

	public function index()
	{
		$data = [];
		$this->read();
	}

	public function layout()
	{
		// Header
		$data['title'] = "Kinicheese Tea - Minuman";
		$data['breadcrumbs_title'] = "Minuman";
		$data['head'] = $this->load->view('layout/head', $data, TRUE);
		$data['header'] = $this->load->view('layout/header', NULL, TRUE);
		$data['sidebar_left'] = $this->load->view('layout/sidebar_left', NULL, TRUE);
		// $data['breadcrumbs'] = $this->load->view('layout/breadcrumbs', $data, TRUE);

		// Footer
		$data['sidebar_right'] = $this->load->view('layout/sidebar_right', NULL, TRUE);
		$data['footer'] = $this->load->view('layout/footer', NULL, TRUE);
		$data['scripts'] = $this->load->view('layout/scripts', NULL, TRUE);

		return $data;
	}

	public function create()
	{
		if (isset($_POST['btnsubmit'])) {
			$this->model->insert();
			redirect('minuman');
		} else {
			$data = $this->layout();
			$data['sub_breadcrumbs_title'] = "Tambah Bahan Baku";
			$data['breadcrumbs'] = $this->load->view('layout/breadcrumbs', $data, TRUE);

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
			$data['model'] = $this->model;
			$data['id_string'] = $id_string;
			$data['kategori'] = $kategori;

			$this->load->view('minuman_create_view', $data);
		}
	}

	public function read()
	{
		$data = $this->layout();
		$data['sub_breadcrumbs_title'] = "Lihat Minuman";
		$data['breadcrumbs'] = $this->load->view('layout/breadcrumbs', $data, TRUE);
		$data['rows'] = $this->model->read();
		$this->load->view('minuman_read_view', $data);
	}

	public function update($id)
	{
		if (isset($_POST['btnsubmit'])) {
			$this->model->id = $_POST['id_minum'];
			$this->model->nama = $_POST['nama_minum'];
			$this->model->harga = $_POST['harga'];
			$this->model->id_kategori = $_POST['id_kategori'];

			$this->model->update();
			redirect('minuman');
		} else {
			$query = $this->db->query("SELECT * FROM minuman where id_minum='$id'");
			if ($query->num_rows() > 0) {
				$row = $this->layout();
				$row['sub_breadcrumbs_title'] = "Ubah Minuman";
				$row['breadcrumbs'] = $this->load->view('layout/breadcrumbs', $row, TRUE);

				$row['row'] = $query->row();

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

				$row['id_string'] = $id_string;
				$row['kategori'] = $this->kategori_model->read();
				// var_dump($row);
				$this->load->view('minuman_update_view', $row);
			} else {
				echo "<script>alert('TIDAK KETEMU')</script>";
				$this->load->view('minuman_update_view', ['model' => $this->model]);
			}
		}
	}

	public function delete($id)
	{
		$this->model->id = $id;
		$this->model->delete();
		redirect('minuman');
	}

	public function insert()
	{
		$this->load->model('minuman_model');
		$this->minuman_model->insert();
	}

	public function storecreate()
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

	public function storeupdate()
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
