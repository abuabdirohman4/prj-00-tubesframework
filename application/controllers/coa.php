<?php

class coa extends CI_controller
{
	public $model=null;
	public function __construct(){
		parent::__construct();
		
		$this->load->model('coa_model');
		$this->model=$this->coa_model;

		$this->load->database();
		
	}
	public function index(){
		$this->load->view('master/header');
		$this->read();
		$this->load->view('master/footer');
	}
	public function create(){
		if(isset($_POST['btnsubmit'])){
    
            $this->load->view('master/header');
            $this->model->insert();
            redirect('coa');
            $this->load->view('master/footer');}
            
            
        else{
            $this->load->view('master/header');
            $this->load->view('coa_create_view',['model'=>$this->model]);
            $this->load->view('master/footer');
		}
	}
	public function read(){
		$rows=$this->model->read();
		
		$this->load->view('coa_read_view',['rows'=>$rows]);
		
		
	}
	public function update($id){
        if(isset($_POST['btnsubmit'])){
            $this->load->view('master/header');
            $this->model->id=$_POST['no_akun'];
			$this->model->nama=$_POST['nama_akun'];
			$this->model->header=$_POST['header_akun'];

            $this->model->update();
            redirect('coa');
            $this->load->view('master/footer');   }
    else{
        $this->load->view('master/header');
        $query=$this->db->query("SELECT * FROM coa where no_akun='$id'");
        if($query->num_rows()> 0) {
            $row=$query->row();
            $this->model->id=$row->no_akun;
			$this->model->nama=$row->nama_akun;
			$this->model->header=$row->header_akun;
            $this->load->view('coa_update_view', $row);
        } else {
            echo "<script>alert('TIDAK KETEMU')</script>";
            $this->load->view('coa_update_view',['model'=>$this->model]);
        }
        $this->load->view('master/footer');   }
}


	public function delete($id){
		$this->model->id = $id;
		$this->model->delete();
		redirect('coa');
	}




	public function storecreate(){
        $rules=

[	
        [
            'field'=>'no_akun',
            'label'=>'No Akun',
            'rules'=>'required|numeric',
            'errors'=>[
            'required'=>"%s harus diisi",
            'numeric'=> "%s hanya berisi angka spasi"]
        ],

        
        [
            'field'=>'nama_akun',
            'label'=>'Nama Akun',
            'rules'=>'required|alpha_numeric_spaces',
            'errors'=>[
            'required'=>"%s harus diisi",
            'alpha_numeric_spaces'=>"%s hanya huruf a-z dan angka"]
		],
		
		[
            'field'=>'header_akun',
            'label'=>'Header Akun',
            'rules'=>'required|numeric',
            'errors'=>[
            'required'=>"%s harus diisi",
            'numeric'=>"%s hanya berisi angka"]
        ],


];



$this->form_validation->set_rules($rules);

        if($this->form_validation->run() == False){

            $data=[];

            $this->load->view('master/header',$data);
            $this->load->view('coa_create_view',$data);
			$this->load->view('master/footer',$data);
		}


        else{
			
            $this->load->model('coa_model');
            $this->coa_model-> insert();
			redirect('coa');}

        

}





public function storeupdate(){
	$rules=

[	
	[
		'field'=>'no_akun',
		'label'=>'No Akun',
		'rules'=>'required|numeric',
		'errors'=>[
		'required'=>"%s harus diisi",
		'numeric'=> "%s hanya berisi angka spasi"],
	],

	
	[
		'field'=>'nama_akun',
		'label'=>'Nama Akun',
		'rules'=>'required|alpha_numeric_spaces',
		'errors'=>[
		'required'=>"%s harus diisi",
		'alpha_numeric_spaces'=>"%s hanya huruf a-z dan angka"],
	],
	
	[
		'field'=>'header_akun',
		'label'=>'Header Akun',
		'rules'=>'required|numeric',
		'errors'=>[
		'required'=>"%s harus diisi",
		'numeric'=>"%s hanya berisi angka"],
	],


];



$this->form_validation->set_rules($rules);

	if($this->form_validation->run() == False){

		$data=[];

		$this->load->view('master/header',$data);
		$this->load->view('coa_update_view',$data);
		$this->load->view('master/footer',$data);}


	else{
		

    $this->load->model('coa_model');
	$this->coa_model-> update();
	redirect('coa');}
	

}

}