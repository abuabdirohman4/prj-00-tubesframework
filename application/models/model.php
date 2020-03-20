<?php
class model extends CI_Model
{

    // function get_kd_vendor()
    //  {
    //   return $this->db->get_where('vendor')->result();
    //  }
    function penerimaan()
    {
        $sql = $this->db->get_where('pembelian', ['id_pembelian' => $this->input->post('id_pembelian')])->result();
        foreach ($sql as $v) {
            $validate = $v->jumlah;
        }
        if ($validate >  $this->input->post('jumlah') || $validate <  $this->input->post('jumlah')) {
            $this->session->set_flashdata('sukses', "Gagal  !");
            // redirect('penerimaan');
        } else {
            $data = [
                'tgl_penerimaan' => $this->input->post('tgl_penerimaan'),
                'id_pembelian' => $this->input->post('id_pembelian'),
                // 'id_bahan_baku'=>$this->input->post('id_bahan_baku'),
                // 'kd_vendor'=>$this->input->post('kd_vendor'),
                'stok' => $this->input->post('jumlah'),
                // 'harga_satuan'=>$this->input->post('harga_satuan'),
                // 'status'=>'1'
            ];
            $this->session->set_flashdata('sukses', "Data Berhasil di Simpan !");
            $this->db->where('id_pembelian', $data);
            $this->db->insert('penerimaan', $data);
        }
    }

    function get_id_bahan_baku()
    {
        return $this->db->get_where('bahan_baku')->result();
    }

    function get_penerimaan()
    {
        $this->db->select('*');
        $this->db->from('penerimaan');
        $this->db->join('pembelian', 'pembelian.id_pembelian=penerimaan.id_pembelian');
        // $this->db->join('bahan_baku','bahan_baku.id_bahan_baku=pembelian.id_bahan_baku');
        $query = $this->db->get();
        return $query->result();
    }

    // function insert_penerimaan()
    // {
    // $data=[
    // // 'tgl_pembelian'=>$this->input->post('tgl_pembelian'),
    // 'id_pembelian'=>$this->input->post('id_pembelian'),
    // 'id_bahan_baku'=>$this->input->post('id_bahan_baku'),
    // // 'kd_vendor'=>$this->input->post('kd_vendor'),
    // 'jumlah'=>$this->input->post('jumlah'),
    // // 'harga_satuan'=>$this->input->post('harga_satuan'),
    // // 'status'=>'1'
    // ];
    // return $this->db->insert('pembelian',$data);
    // }

    function lihat_laporan()
    {
        redirect('lapor');
    }
}
