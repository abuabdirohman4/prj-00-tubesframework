<?php

class Report extends CI_controller
{

    public function __constructor() {

        $this->load->model('pembelian_model');
        $this->load->model('penjualan_model');

    }

    public function index() {

        $total_barang_terjual = $this->pembelian_model->;
        $total_stok_tersisa;
        $total_income;
        $total_profit;

    }
}