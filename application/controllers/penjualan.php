<?php

class penjualan extends CI_controller
{
	public $model = null;
	function __construct()
	{
		parent::__construct();

		$this->load->model('penjualan_model');
		$this->load->model('minuman_model');
		$this->load->model('bahan_model');
		$this->load->model('vendor_model');
		$this->load->model('pegawai_model');
		$this->model = $this->penjualan_model;

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
			redirect('penjualan');
		} else {
			$this->load->view('master/header');

			$last_id = $this->model->db->query("SELECT * FROM penjualan ORDER BY id_jual DESC LIMIT 1");
			if ($last_id->num_rows() == 0)
				$last_id = 'PX001';
			else
				$last_id = $last_id->result()[0]->id_jual;
			$id_number = (int) substr($last_id, 2, 4);
			$id_number++;
			$id_number = (string) $id_number;
			if (strlen($id_number) == 1)
				$id_string = 'PX00' . $id_number;
			else if (strlen($id_number) == 2)
				$id_string = 'PX0' . $id_number;
			else
				$id_string = 'PX' .  $id_number;

			$pegawai = $this->pegawai_model->read();
			$minuman = $this->minuman_model->read();

			$this->load->view('penjualan_create_view', ['model' => $this->model, 'minuman' => $minuman, 'pegawai' => $pegawai, 'id_string' => $id_string]);
			$this->load->view('master/footer');
		}
	}
	function read()
	{
		$this->load->view('master/header');
		$rows = $this->model->read();
		$this->load->view('penjualan_read_view', ['rows' => $rows]);
		$this->load->view('master/footer');
	}
	function update($id)
	{
		$data = [];

		if (isset($_POST['btnsubmit'])) {
			$this->load->view('master/header');
			$this->model->id_jual = $_POST['id_jual'];
			$this->model->id_minum = $_POST['id_minum'];
			$this->model->jumlah = $_POST['jumlah'];
			$this->model->id_pegawai = $_POST['id_pegawai'];

			$this->model->update();
			redirect('penjualan');
			$this->load->view('master/footer');
		} else {
			$this->load->view('master/header');
			$no_nota = $this->model->db->query("SELECT * FROM nota_penjualan WHERE id_jual='$id'")->result()[0]->no_nota;
			$query = $this->db->query("SELECT * FROM penjualan where id_jual='$id'");
			$detail_jual = $this->db->get_where('detail_jual', ['no_nota' => $no_nota])->result();
			if ($query->num_rows() > 0) {
				$row = $query->row();

				$this->model->id_jual = $row->id_jual;
				$this->model->id_pegawai = $row->id_pegawai;

				$minuman = $this->minuman_model->read();
				$pegawai = $this->pegawai_model->read();

				$this->load->view('penjualan_update_view', ['model' => $row, 'minuman' => $minuman, 'detail_jual' => $detail_jual, 'pegawai' => $pegawai]);
				$this->load->view('master/footer');
			} else {
				echo "<script>alert('TIDAK KETEMU')</script>";
				$this->load->view('penjualan_update_view', ['model' => $this->model]);
			}
			$this->load->view('master/footer');
		}
	}
	function delete($id)
	{
		$this->model->id = $id;
		$this->model->delete();
		redirect('penjualan');
	}
	function insert()
	{
		$this->model->insert();
	}
	function storecreate()
	{
		$rules =
			[
				[
					'field' => 'id_penjualan',
					'label' => 'id_penjualan',
					'rules' => 'required|alpha_numeric',
					'errors' => [
						'required' => "%s harus diisi",
						'Alpha_numeric' => "%s Hanya boleh berisikan huruf & angka (tidak boleh spasi)",
					]
				],


				[
					'field' => 'id_minum[]',
					'label' => 'id_minuman',
					'rules' => 'required|alpha_numeric',
					'errors' => [
						'required' => "%s harus diisi",
						'Alpha_numeric' => "%s Hanya boleh berisikan huruf & angka (tidak boleh spasi)",
					]
				],


				[
					'field' => 'jumlah[]',
					'label' => 'jumlah',
					'rules' => 'required',
					'errors' => [
						'required' => "%s harus diisi",
					]
				],
				[
					'field' => 'id_pegawai',
					'label' => 'id_pegawai',
					'rules' => 'required|alpha_numeric',
					'errors' => [
						'required' => "%s harus diisi",
						'Alpha_numeric' => "%s Hanya boleh berisikan huruf & angka (tidak boleh spasi)",

					]
				],


			];

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == False) {

			redirect('penjualan/create');
		} else {

			$this->insert();
			foreach ($_POST['id_minuman'] as $k => $v) {
				if ($v == "")
					break;
				$id_bahan_baku = $this->model->db->query("SELECT * FROM minuman WHERE id_minum='$v'")->result()[0]->id_bahan_baku;
				$this->model->db->query("UPDATE bahan_baku SET jumlah_stok=jumlah_stok-" . $_POST["jumlah"][$k] . " WHERE id_bahan_baku='$id_bahan_baku'");
			}
			redirect('penjualan');
		}
	}

	function storeupdate()
	{
		$rules =
			[
				[
					'field' => 'id_penjualan',
					'label' => 'id_penjualan',
					'rules' => 'required|alpha_numeric',
					'errors' => [
						'required' => "%s harus diisi",
						'Alpha_numeric' => "%s Hanya boleh berisikan huruf & angka (tidak boleh spasi)",
					]
				],


				[
					'field' => 'id_minuman[]',
					'label' => 'id_minuman',
					'rules' => 'required|alpha_numeric',
					'errors' => [
						'required' => "%s harus diisi",
						'Alpha_numeric' => "%s Hanya boleh berisikan huruf & angka (tidak boleh spasi)",
					]
				],


				[
					'field' => 'jumlah[]',
					'label' => 'jumlah',
					'rules' => 'required',
					'errors' => [
						'required' => "%s harus diisi",
					]
				],
				[
					'field' => 'id_pegawai',
					'label' => 'id_pegawai',
					'rules' => 'required|alpha_numeric',
					'errors' => [
						'required' => "%s harus diisi",
						'Alpha_numeric' => "%s Hanya boleh berisikan huruf & angka (tidak boleh spasi)",

					]
				],


			];
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == False) {

			$data = [];
			$this->load->view('master/header', $data);
			$this->load->view('penjualan_create_view', $data);
			$this->load->view('master/footer', $data);
		} else {

			$this->load->model('penjualan_model');
			$this->model->update();
			redirect('penjualan');
		}
	}
}
