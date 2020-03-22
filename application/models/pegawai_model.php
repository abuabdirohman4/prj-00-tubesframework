<?php

class pegawai_model extends CI_model
{
	public $id_pegawai;
	public $nama_pegawai;
	public $alamat;
	public $no_telp;

	public $labels=[];

	public function __construct(){
		parent::__construct();
		$this->labels=$this->_atributelabels();
		$this->load->database();
	}
	public function insert(){
		$data= array(
			'id_pegawai'=>$this->input->post('id_pegawai'),
			'nama_pegawai' =>$this->input->post('nama_pegawai'),
			'alamat' =>$this->input->post('alamat'),
			'no_telp' =>$this->input->post('no_telp'),
			
			
		 );
		 return $this->db->insert('pegawai',$data);
	
	$this->db->query($sql);
	}
	public function update(){
		$sql=sprintf("UPDATE pegawai SET nama_pegawai ='%s', alamat='%s', no_telp='%s'  where id_pegawai='%s'",
		$this->nama_pegawai,
		$this->alamat,
		$this->no_telp,
		$this->id_pegawai
		
		
		
		);
		$this->db->query($sql);
		}
	public function delete(){
		$sql=sprintf("DELETE FROM pegawai WHERE id_pegawai='%s'",$this->id_pegawai);
		$this->db->query($sql);
}
	public function read(){
		$sql="SELECT * FROM pegawai ORDER BY id_pegawai";
		$query=$this->db->query($sql);
		return $query->result();
	}
	public function _atributelabels(){
		return[
			'id_pegawai'=>'Id Pegawai:',
			'nama_pegawai'=>'Nama Pegawai:',
			'alamat'=>'Alamat:',
			'no_telp'=>'Nomor :'
			
		];
	}
}