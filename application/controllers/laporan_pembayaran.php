<?php
class laporan_pembayaran extends ci_controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_lapor_pembayaran');
    }
    function index()
    {
        $lapor['apoy'] = $this->model_lapor_pembayaran->laporan_default();
        $this->load->view('lapor_pembayaran_view', $lapor);
    }
    function lapor1()
    {
        if (isset($_POST['submit'])) {
            $tanggal1 = $this->input->post('tanggal1');
            $tanggal2 = $this->input->post('tanggal2');
            $lapor['apoy'] = $this->model_lapor_view->laporan($tanggal1, $tanggal2);
            $this->load->view('lapor_pembayaran_view', $lapor);
        } else {
            $lapor['apoy'] = $this->model_lapor_pembayaran->laporan_default();
            $this->load->view('lapor_pembayaran_view', $lapor);
        }
    }
}
