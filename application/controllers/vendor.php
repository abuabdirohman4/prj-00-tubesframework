<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vendor extends CI_Controller
{
    public $model = NULL;

    public function __construct()
    {
        parent::__construct();
        //memuat model
        $this->load->model('vendor_model');
        $this->model = $this->vendor_model;
        //memuat librari database
        $this->load->database();
    }

    public function index()
    {
        $this->read();
    }

    public function layout()
    {
        // Header
        $data['title'] = "Kinicheese Tea - Vendor";
        $data['breadcrumbs_title'] = "Vendor";
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

    public function create()
    {
        //belum implementasi
        if (isset($_POST['btnSubmit'])) {
            $this->load->view('master/header');
            $this->model->kd_vendor = $_POST['kd_vendor'];
            $this->model->nama_vendor = $_POST['nama_vendor'];
            $this->model->alamat = $_POST['alamat'];
            $this->load->model('vendor_model');
            $this->model->insert();
            $this->load->view('master/footer');
            redirect('vendor');
        } else {

            $last_id = $this->model->db->query("SELECT * FROM vendor ORDER BY kd_vendor DESC LIMIT 1")->result()[0]->kd_vendor;
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
            $this->load->view('vendor_create_view', ['model' => $this->model, 'id_string' => $id_string]);
            $this->load->view('master/footer');
        }
    }

    public function read()
    {
        $data = $this->layout();
        $data['sub_breadcrumbs_title'] = "Lihat Pegawai";
        $data['breadcrumbs'] = $this->load->view('layout/breadcrumbs', $data, TRUE);

        $data['rows'] = $this->model->read();
        $this->load->view('vendor_read_view', $data);
    }

    public function insert()
    {
        $this->load->model('vendor_model');
        $this->vendor_model->insert();
    }

    public function update($id)
    {

        //belum implementasi
        if (isset($_POST['btnsubmit'])) {
            $this->load->view('master/header');

            $this->model->kd_vendor = $_POST['kd_vendor'];
            $this->model->nama_vendor = $_POST['nama_vendor'];
            $this->model->alamat = $_POST['alamat'];
            $this->load->model('vendor_model');
            $this->model->update();
            $this->load->view('master/footer');
            redirect('vendor');
        } else {
            $this->load->view('master/header');
            $query = $this->db->query("SELECT * FROM vendor where kd_vendor='$id'");
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $this->model->kd_vendor = $row->kd_vendor;
                $this->model->nama_vendor = $row->nama_vendor;
                $this->model->alamat = $row->alamat;
                $this->load->view('vendor_update_view', $row);
            } else {
                echo "<script>alert('TIDAK KETEMU')</script>";
                $this->load->view('vendor_update_view', ['model' => $this->model]);
            }
            $this->load->view('master/footer');
        }
    }

    public function delete($id)
    {
        //menentukan kode yang akan di hapus
        $this->model->kd_vendor = $id;
        //menghapus baris data di dalam tabel barang
        $this->model->delete();
        //mengarahkan kembali ke halaman utama/index
        redirect('vendor');
    }

    public function storecreate()
    {
        $rules =

            [
                [
                    'field' => 'kd_vendor',
                    'label' => 'Kode Vendor',
                    'rules' => 'required|alpha_numeric',
                    'errors' => [
                        'required' => "%s harus diisi",
                        'Alpha_numeric' => "%s hanya berisi angka dan huruf tanpa spasi"
                    ]
                ],


                [
                    'field' => 'nama_vendor',
                    'label' => 'Nama Vendor',
                    'rules' => 'required|alpha_numeric_spaces',
                    'errors' => [
                        'required' => "%s harus diisi",
                        'alpha_numeric_spaces' => "%s hanya huruf a-z dan angka"
                    ]
                ],

                [
                    'field' => 'alamat',
                    'label' => 'Alamat',
                    'rules' => 'required|alpha_numeric_spaces',
                    'errors' => [
                        'required' => "%s harus diisi",
                        'alpha_numeric_spaces' => "%s hanya huruf a-z dan angka"
                    ]
                ],
            ];

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == False) {

            $data = [];

            $this->load->view('master/header', $data);
            $this->load->view('vendor_create_view', $data);
            $this->load->view('master/footer', $data);
        } else {

            $this->insert();
            redirect(site_url('vendor'));
        }
    }

    public function storeupdate()
    {
        $rules =

            [
                [
                    'field' => 'kd_vendor',
                    'label' => 'Kode Vendor',
                    'rules' => 'required|alpha_numeric',
                    'errors' => [
                        'required' => "%s harus diisi",
                        'Alpha_numeric' => "%s hanya berisi angka dan huruf tanpa spasi"
                    ]
                ],


                [
                    'field' => 'nama_vendor',
                    'label' => 'Nama Vendor',
                    'rules' => 'required|alpha_numeric_spaces',
                    'errors' => [
                        'required' => "%s harus diisi",
                        'alpha_numeric_spaces' => "%s hanya huruf a-z dan angka"
                    ]
                ],

                [
                    'field' => 'alamat',
                    'label' => 'Alamat',
                    'rules' => 'required|alpha_numeric_spaces',
                    'errors' => [
                        'required' => "%s harus diisi",
                        'alpha_numeric_spaces' => "%s hanya huruf a-z dan angka"
                    ]
                ],



            ];

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == False) {

            $data = [];

            $this->load->view('master/header', $data);
            $this->load->view('vendor_update_view', $data);
            $this->load->view('master/footer', $data);
        } else {


            $this->load->model('vendor_model');
            $this->vendor_model->update();
            redirect('vendor');
        }
    }
}

/* End of file vendor.php */
