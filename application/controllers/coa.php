<?php
class Coa extends CI_controller
{
	public $model = null;
	public function __construct()
	{
		parent::__construct();

		$this->load->model('coa_model');
		$this->model = $this->coa_model;

		$this->load->database();
	}

	public function index()
	{
		$this->read();
	}

	public function layout()
	{
		// Header
		$data['title'] = "Kinicheese Tea - COA";
		$data['breadcrumbs_title'] = "COA";
		$data['head'] = $this->load->view('layout/head', $data, TRUE);
		$data['header'] = $this->load->view('layout/header', NULL, TRUE);
		$data['sidebar_left'] = $this->load->view('layout/sidebar_left', NULL, TRUE);
		$data['breadcrumbs'] = $this->load->view('layout/breadcrumbs', $data, TRUE);

		// Footer
		$data['sidebar_right'] = $this->load->view('layout/sidebar_right', NULL, TRUE);
		$data['footer'] = $this->load->view('layout/footer', NULL, TRUE);
		$data['scripts'] = $this->load->view('layout/scripts', NULL, TRUE);

		return $data;
	}

	public function read()
	{
		$data = $this->layout();
		$data['sub_breadcrumbs_title'] = "Lihat COA";
		$data['breadcrumbs'] = $this->load->view('layout/breadcrumbs', $data, TRUE);
		$data['rows'] = $this->model->read();
		$this->load->view('coa_read_view', $data);
	}


	public function create()
	{
		if (isset($_POST['btnsubmit'])) {
			$this->model->insert();
			redirect('coa');
		} else {
			$data = $this->layout();
			$data['sub_breadcrumbs_title'] = "Tambah COA";
			$data['breadcrumbs'] = $this->load->view('layout/breadcrumbs', $data, TRUE);

			$data['model'] = $this->model;
			$this->load->view('coa_create_view', $data);
		}
	}

	public function update($id)
	{
		if (isset($_POST['btnsubmit'])) {
			$this->model->id = $_POST['no_akun'];
			$this->model->nama = $_POST['nama_akun'];
			$this->model->header = $_POST['header_akun'];

			$this->model->update();
			redirect('coa');
		} else {
			$query = $this->db->query("SELECT * FROM coa where no_akun='$id'");
			if ($query->num_rows() > 0) {

				$row = $this->layout();

				$row['row'] = $query->row();

				$row['sub_breadcrumbs_title'] = "Ubah COA";
				$row['breadcrumbs'] = $this->load->view('layout/breadcrumbs', $row, TRUE);

				$this->load->view('coa_update_view', $row);
			} else {
				echo "<script>alert('TIDAK KETEMU')</script>";
				$this->load->view('coa_update_view', ['model' => $this->model]);
			}
		}
	}

	public function delete($id)
	{
		$this->model->id = $id;
		$this->model->delete();
		redirect('coa');
	}

	public function storecreate()
	{
		$rules =

			[
				[
					'field' => 'no_akun',
					'label' => 'No Akun',
					'rules' => 'required|numeric',
					'errors' => [
						'required' => "%s harus diisi",
						'numeric' => "%s hanya berisi angka spasi"
					]
				],

				[
					'field' => 'nama_akun',
					'label' => 'Nama Akun',
					'rules' => 'required|alpha_numeric_spaces',
					'errors' => [
						'required' => "%s harus diisi",
						'alpha_numeric_spaces' => "%s hanya huruf a-z dan angka"
					]
				],

				[
					'field' => 'header_akun',
					'label' => 'Header Akun',
					'rules' => 'required|numeric',
					'errors' => [
						'required' => "%s harus diisi",
						'numeric' => "%s hanya berisi angka"
					]
				],

			];

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == False) {
			$data = $this->layout();
			$data['sub_breadcrumbs_title'] = "Tambah COA";
			$data['breadcrumbs'] = $this->load->view('layout/breadcrumbs', $data, TRUE);

			$this->load->view('coa_create_view', $data);
		} else {
			$this->load->model('coa_model');
			$this->coa_model->insert();
			redirect('coa');
		}
	}

	public function storeupdate()
	{
		$rules =

			[
				[
					'field' => 'no_akun',
					'label' => 'No Akun',
					'rules' => 'required|numeric',
					'errors' => [
						'required' => "%s harus diisi",
						'numeric' => "%s hanya berisi angka spasi"
					],
				],
				[
					'field' => 'nama_akun',
					'label' => 'Nama Akun',
					'rules' => 'required|alpha_numeric_spaces',
					'errors' => [
						'required' => "%s harus diisi",
						'alpha_numeric_spaces' => "%s hanya huruf a-z dan angka"
					],
				],

				[
					'field' => 'header_akun',
					'label' => 'Header Akun',
					'rules' => 'required|numeric',
					'errors' => [
						'required' => "%s harus diisi",
						'numeric' => "%s hanya berisi angka"
					],
				],
			];

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == False) {
			$data = $this->layout();
			$data['sub_breadcrumbs_title'] = "Ubah COA";
			$data['breadcrumbs'] = $this->load->view('layout/breadcrumbs', $data, TRUE);

			$this->load->view('coa_update_view', $data);
		} else {
			$this->load->model('coa_model');
			$this->coa_model->update();
			redirect('coa');
		}
	}
}
