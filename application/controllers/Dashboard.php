<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function index()
    {
        // Header
        $data['title'] = "Dashboard";
        $data['head'] = $this->load->view('layout/head', $data, TRUE);
        $data['header'] = $this->load->view('layout/header', NULL, TRUE);
        $data['sidebar_left'] = $this->load->view('layout/sidebar_left', NULL, TRUE);
        $data['breadcrumbs'] = $this->load->view('layout/breadcrumbs', $data, TRUE);

        // Content
        $data['chart_dashboard'] = $this->load->view('layout/chart_dashboard', NULL, TRUE);
        $data['card_stats'] = $this->load->view('layout/card_stats', NULL, TRUE);
        // $data['card_widgets'] = $this->load->view('layout/card_widgets', NULL, TRUE);
        // $data['work_collection'] = $this->load->view('layout/work_collection', NULL, TRUE);

        // Footer
        $data['sidebar_right'] = $this->load->view('layout/sidebar_right', NULL, TRUE);
        $data['footer'] = $this->load->view('layout/footer', NULL, TRUE);
        $data['scripts'] = $this->load->view('layout/scripts', NULL, TRUE);

        $this->load->view('layout/dashboard', $data);
    }
}

/* End of file dashboard.php */
