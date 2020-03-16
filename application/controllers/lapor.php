<?php
class lapor extends ci_controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('model_laporan');
    }
    function index()
    {
        $lapor['apoy'] = $this->model_laporan->laporan_default();
        $this->load->view('lapor_view', $lapor);
    }
    function lapor1()
    {
        if (isset($_POST['submit'])) {
            $lapor['apoy'] = $this->model_laporan->laporan();
            $this->load->view('lapor_view', $lapor);
        } else {
            $lapor['apoy'] = $this->model_laporan->laporan_default();
            $this->load->view('lapor_view', $lapor);
        }
    }
}
