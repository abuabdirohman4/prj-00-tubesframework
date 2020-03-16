<?php
class bahan extends CI_controller{
    public $model=null;
    public function __construct(){
    parent::__construct();
    //memuat model
    $this->load->model('bahan_model');
    $this->model=$this->bahan_model;
    //memuat library database
    $this->load->database();
}

    public function index(){
        $this->load->view('master/header');
        $this->read();
        $this->load->view('master/header');
    }

    public function storecreate(){
        $data=[];
        $rules=[
           
            array(
                'field'
                 => 'id_bahan_baku',
                'label' => 'ID Bahan Baku',
                'rules' => 'required',
                'errors' => array(
                    'required'              => '%s Wajib diisi !',
                    'alpha_numeric_spaces'  => '%s hanya angka 8-9 atau huruf A-Z'
                )
            ),
            array(
                'field' => 'nama_bahan_baku',
                'label' => 'Nama Bahan Baku',
                'rules' => 'required',
                'errors' => array(
                    'required'              => '%s Wajib diisi !',
                    'alpha'  => '%s hanya huruf A-Z'
                )
            ),
            array(
                'field' => 'satuan',
                'label' => 'Satuan',
                'rules' => 'required',
                'errors' => array(
                    'required'              => '%s Wajib diisi !',
                    'numeric'  => '%s hanya angka'
                )
            ),
            array(
                'field' => 'harga_satuan',
                'label' => 'Harga Satuan',
                'rules' => 'required',
                'errors' => array(
                    'required'              => '%s Wajib diisi bro !',
                    'numeric'  => '%s hanya angka'
                )
            ),

        ];

        $this->form_validation->set_rules($rules);
        if($this->form_validation->run() == FALSE){
            $data=[];
            $this->load->view('master/header', $data);
            $this->load->view('bahan_create_view', $data);
            $this->load->view('master/footer',$data);
            
        }else{
            $this->insert();
            redirect(site_url('bahan'));
    

        }
    
    }

    public function insert(){
        $this->load->model('bahan_model');
        $this->bahan_model->insert();
    }

    public function storeupdate(){
$rules=
[
[
'field'=>'id_bahan_baku',
'label'=>'id_bahan_baku',
'rules'=>'required|alpha_numeric',
'errors'=>[
                'required'=>"%s harus diisi",
                'Alpha_numeric'=>"%s Hanya boleh berisikan huruf & angka (tidak boleh spasi)",
                ]
],


[
'field'=>'nama_bahan_baku',
'label'=>'nama_bahan_baku',
'rules'=>'required|alpha',
'errors'=>[
'required'=>"%s harus diisi",
'alpha'=>"%s hanya huruf a-z"]
],


[
'field'=>'satuan',
'label'=>'satuan',
'rules'=>'required',
'errors'=>[
                'required'=>"%s harus diisi",
                ]
],
[
'field'=>'harga_satuan',
'label'=>'harga_satuan',
'rules'=>'required|alpha_numeric',
'errors'=>[
                'required'=>"%s harus diisi",
                'Alpha_numeric'=>"%s Hanya boleh berisikan huruf & angka (tidak boleh spasi)",
                ]
]


];
$this->form_validation->set_rules($rules);

if($this->form_validation->run() == False){

$data=[];
$this->load->view('master/header',$data);
$this->load->view('bahan_create_view',$data);
$this->load->view('master/footer',$data);

}

else{
   
        $this->load->model('bahan_model');
            $this->minuman_model->update();
redirect('bahan');
}
}
    public function create(){
    //belum implementasi
        if(isset($_POST['btnSubmit'])){
        $this->load->view('master/header');
        $this->model->id_bahan_baku=$_POST['id_bahan_baku'];
        $this->model->nama_bahan_baku=$_POST['nama_bahan_baku'];
        $this->model->satuan=$_POST['satuan'];
        $this->model->harga_satuan=$_POST['harga_satuan'];
        $this->model->insert();
        $this->load->view('master/footer');
        redirect('bahan');

        }else{
            $this->load->view('master/header');

            $last_id = $this->model->get_last_row()[0]->id_bahan_baku;
            $id_number = (int) substr($last_id, 1,3);
            $id_number++;
            $id_number = (string) $id_number;
            if(strlen($id_number) == 1)
                $id_string = 'M00' . $id_number;
            else if(strlen($id_number) == 2)
                $id_string = 'M0' . $id_number;
            else
                $id_string = 'M' .  $id_number;
            
            $this->load->view('bahan_create_view',['model'=>$this->model, 'id_string' => $id_string]);
            $this->load->view('master/footer');
    }
}

    public function read(){
        $this->load->view('master/header');
        $rows=$this->model->read();
        $this->load->view('bahan_read_view',['rows'=>$rows]);
        $this->load->view('master/footer');
    }


    public function update($id){
    //belum implementasi
        if (isset($_POST['btnsubmit'])){
            $this->load->view('master/header');
            $this->model->id_bahan_baku=$_POST['id_bahan_baku'];
            $this->model->nama_bahan_baku=$_POST['nama_bahan_baku'];
            $this->model->satuan=$_POST['satuan'];
            $this->model->harga_satuan=$_POST['harga_satuan'];

            $this->model->update();
            redirect('bahan');
            $this->load->view('master/footer');
            }else{
            $this->load->view('master/header');
                $query=$this->db->query("SELECT * FROM bahan_baku WHERE id_bahan_baku='$id'");
if ($query->num_rows() >0) {
    $row=$query->row();
            $this->model->id_bahan_baku=$row->id_bahan_baku;
            $this->model->nama_bahan_baku=$row->nama_bahan_baku;
            $this->model->satuan=$row->satuan;
            $this->model->harga_satuan=$row->harga_satuan;

            $this->load->view('bahan_update_view',$row);
            $this->load->view('master/footer');
}
    else{
        echo "<script>alert('TIDAK KETEMU')</script>";
        $this->load->view('bahan_update_view',['model'=>$this->model]);
    }
    $this->load->view('master/footer');
          
            }
        }

    public function delete($id){
//menentukan kode yang akan di hapus
        $this->model->id =$id;
//menghapus baris data didalam tabel barang
        $this->model->delete();
//mengarahkan kembali kehalaman utama/index
        redirect('bahan');
}
}
