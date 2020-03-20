<?php
class vendor_model extends CI_model
{
        public $kd_vendor;
        public $nama_vendor;
        public $alamat;
        public $labels = [];

        function __construct()
        {
                parent::__construct();
                $this->labels = $this->_attributelabels();
                //memuat librari database
                $this->load->database();
        }
        //untuk menambah baris data dalam tabel

        function insert()
        {

                $data = [
                        'kd_vendor' => $this->input->post('kd_vendor'),
                        'nama_vendor' => $this->input->post('nama_vendor'),
                        'alamat' => $this->input->post('alamat'),
                ];
                return $this->db->insert('vendor', $data);
        }

        function update()
        {
                $sql = sprintf(
                        "UPDATE vendor SET nama_vendor ='%s', alamat='%s' where kd_vendor='%s'",
                        $this->nama_vendor,
                        $this->alamat,
                        $this->kd_vendor
                );
                $this->db->query($sql);
        }

        function delete()
        {
                $sql = sprintf("DELETE FROM vendor WHERE kd_vendor='%s'", $this->kd_vendor);
                $this->db->query($sql);
        }

        function read()
        {
                $sql = "SELECT * FROM vendor ORDER BY kd_vendor";
                $query = $this->db->query($sql);
                return $query->result();
        }
        //metode untuk menentukan label dari masing-masing atribut
        function _attributelabels()
        {
                return [
                        'kd_vendor' => 'Kode Vendor',
                        'nama_vendor' => 'Nama Vendor',
                        'alamat' => 'Alamat'
                ];
        }
}
