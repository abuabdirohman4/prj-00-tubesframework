<?php
class kategori extends CI_controller
{
    public $model = null;
    public function __construct()
    {
        parent::__construct();

        $this->load->model('kategori_model');
        $this->model = $this->kategori_model;

        $this->load->database();
    }

    public function index()
    {

        $this->read();
    }

    public function insert()
    {
        $this->load->model('kategori_model');
        $this->kategori_model->insert();
    }

    public function create()
    {
        if (isset($_POST['btnsubmit'])) {

            $this->load->view('master/header');
            $this->model->insert();
            redirect('kategori');
            $this->load->view('master/footer');
        } else {
            $this->load->view('master/header');
            $this->load->view('kategori_create_view', ['model' => $this->model]);
            $this->load->view('master/footer');
        }
    }


    public function read()
    {
        $this->load->view('master/header');
        $this->load->model('kategori_model');
        $rows = $this->kategori_model->read();
        $this->load->view('kategori_read_view', ['rows' => $rows]);
        $this->load->view('master/footer');
    }


    public function update($id)
    {
        if (isset($_POST['btnsubmit'])) {
            $this->load->view('master/header');
            $this->model->id = $_POST['id_kategori'];
            $this->model->nama = $_POST['nama_kategori'];

            $this->model->update();
            redirect('kategori');
            $this->load->view('master/footer');
        } else {
            $this->load->view('master/header');
            $query = $this->db->query("SELECT * FROM kategori where id_kategori='$id'");
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $this->model->id = $row->id_kategori;
                $this->model->nama = $row->nama_kategori;
                $this->load->view('kategori_update_view', $row);
            } else {
                echo "<script>alert('TIDAK KETEMU')</script>";
                $this->load->view('kategori_update_view', ['model' => $this->model]);
            }
            $this->load->view('master/footer');
        }
    }





    public function delete($id)
    {
        echo "<script>alert('Anda yakin untuk menghapus data ini?')</script>";
        $this->model->id = $id;
        $this->model->delete();
        redirect('kategori');
    }


    public function storecreate()
    {
        $rules =

            [
                [
                    'field' => 'id_kategori',
                    'label' => 'ID Kategori',
                    'rules' => 'required|alpha_numeric',
                    'errors' => [
                        'required' => "%s harus diisi",
                        'Alpha_numeric' => "%s hanya berisi angka dan huruf tanpa spasi"
                    ]
                ],


                [
                    'field' => 'nama_kategori',
                    'label' => 'Nama Kategori',
                    'rules' => 'required|alpha_numeric',
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
            $this->load->view('kategori_create_view', $data);
            $this->load->view('master/footer', $data);
        } else {

            $this->insert();
            redirect(site_url('kategori'));
        }
    }





    public function storeupdate()
    {
        $rules =

            [
                [
                    'field' => 'id_kategori',
                    'label' => 'Id Kategori',
                    'rules' => 'required|alpha_numeric',
                    'errors' => [
                        'required' => "%s harus diisi",
                        'alpha_numeric' => "%s hanya berisi angka dan huruf tanpa spasi"
                    ]
                ],


                [
                    'field' => 'nama_kategori',
                    'label' => 'Nama Kategori',
                    'rules' => 'required|alpha_numeric',
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
            $this->load->view('kategori_update_view', $data);
            $this->load->view('master/footer', $data);
        } else {


            $this->load->model('kategori_model');
            $this->kategori_model->update();
            redirect('kategori');
        }
    }
}
