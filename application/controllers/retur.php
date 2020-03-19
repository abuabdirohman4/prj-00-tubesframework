<?php

class retur extends CI_controller
{
public $model=null;
public function __construct(){
parent::__construct();

$this->load->model('retur_model');
$this->load->model('minuman_model');
$this->load->model('pembelian_model');
$this->load->model('bahan_model');
$this->load->model('vendor_model');
$this->load->model('pegawai_model');
$this->model=$this->retur_model;

$this->load->database();
}
public function index(){
    $data=[];
$this->read();
}

public function create(){
if(isset($_POST['btnsubmit'])){

$this->load->view('master/header');
	
$this->model->insert();
$this->load->view('master/footer');
redirect('retur');
}else{
	$this->load->view('master/header');

	$last_id = $this->model->db->query("SELECT * FROM retur_pembelian ORDER BY id_retur DESC LIMIT 1");
	if($last_id->num_rows() == 0)
		$last_id = 'R001';
	else
		$last_id = $last_id->result()[0]->id_retur;
	$id_number = (int) substr($last_id, 1,3);
	$id_number++;
	$id_number = (string) $id_number;
	if(strlen($id_number) == 1)
		$id_string = 'R00' . $id_number;
	else if(strlen($id_number) == 2)
		$id_string = 'R0' . $id_number;
	else
		$id_string = 'R' .  $id_number;

        $pembelian = $this->pembelian_model->read();
        $bahan_baku = $this->bahan_model->read();

	$this->load->view('retur_create_view',['model'=>$this->model, 'pembelian' => $pembelian, 'bahan_baku' =>$bahan_baku, 'id_string' => $id_string]);
$this->load->view('master/footer');
}
}
public function read(){
    $this->load->view('master/header');
$rows=$this->model->read();
$this->load->view('retur_read_view',['rows'=>$rows]);
$this->load->view('master/footer');
}
public function update($id){
	$data=[];
    
if(isset($_POST['btnsubmit'])){
$this->load->view('master/header');
$this->model->id_retur=$_POST['id_retur'];
$this->model->id_pembelian=$_POST['id_pembelian'];
$this->model->jumlah=$_POST['jumlah_retur'];
$this->model->id_bahan_baku=$_POST['id_bahan_baku'];
$this->model->tgl_retur=$_POST['tgl_retur'];

$this->model->update();
redirect('retur');
$this->load->view('master/footer');
}else{
	$this->load->view('master/header');
	$query=$this->db->query("SELECT * FROM retur_pembelian where id_retur='$id'");
if($query->num_rows()> 0) {
	$row=$query->row();

$id_bahan_baku = $this->bahan_model->read();
	$id_pembelian = $this->pembelian_model->read();

$this->load->view('retur_update_view',['row'=>$row, 'bahan_baku'=> $id_bahan_baku,'pembelian' => $id_pembelian]);
$this->load->view('master/footer');
}
	else {
		echo "<script>alert('TIDAK KETEMU')</script>";
            $this->load->view('retur_update_view',['model'=>$this->model]);
	}$this->load->view('master/footer'); 
}

}
public function delete($id){
$this->model->id = $id;
$this->model->delete();
redirect('retur');
}
	public function insert(){
		$this->model->insert();

	}
	public function storecreate(){
	$rules=
	[	
			[
				'field'=>'id_retur',
				'label'=>'id_retur',
				'rules'=>'required|alpha_numeric',
				'errors'=>[
                'required'=>"%s harus diisi",
                'Alpha_numeric'=>"%s Hanya boleh berisikan huruf & angka (tidak boleh spasi)",
                ]
			],

			
			[
				'field'=>'tgl_retur',
				'label'=>'tgl_retur',
				'rules'=>'required|date',
				'errors'=>[
                'required'=>"%s harus diisi",
                'Alpha_numeric'=>"%s Hanya boleh berisikan huruf & angka (tidak boleh spasi)",
				]
			],


			[
				'field'=>'jumlah_retur',
				'label'=>'jumlah',
				'rules'=>'required',
				'errors'=>[
                'required'=>"%s harus diisi",
                ]
			],
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
				'field'=>'id_pembelian',
				'label'=>'id_pembelian',
				'rules'=>'required|alpha_numeric',
				'errors'=>[
                'required'=>"%s harus diisi",
                'Alpha_numeric'=>"%s Hanya boleh berisikan huruf & angka (tidak boleh spasi)",
            
                ]
			]
			,


];

$this->form_validation->set_rules($rules);

if($this->form_validation->run() == False){
	
	redirect('retur/create');

	
	}

else{
    
			$this->insert();
       	 redirect('retur');


}}

public function storeupdate(){
	$rules=
	[	
		[
			'field'=>'id_retur',
			'label'=>'id_retur',
			'rules'=>'required|alpha_numeric',
			'errors'=>[
			'required'=>"%s harus diisi",
			'Alpha_numeric'=>"%s Hanya boleh berisikan huruf & angka (tidak boleh spasi)",
			]
		],

		
		[
			'field'=>'tgl_retur',
			'label'=>'tgl_retur',
			'rules'=>'required|date',
			'errors'=>[
			'required'=>"%s harus diisi",
			'Alpha_numeric'=>"%s Hanya boleh berisikan huruf & angka (tidak boleh spasi)",
			]
		],


		[
			'field'=>'jumlah_retur',
			'label'=>'jumlah',
			'rules'=>'required',
			'errors'=>[
			'required'=>"%s harus diisi",
			]
		],
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
			'field'=>'id_pembelian',
			'label'=>'id_pembelian',
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
	$this->load->view('retur_update_view',$data);
	$this->load->view('master/footer',$data);
	
	}

else{
    
            $this->model->update();
			redirect('retur');}

}

}