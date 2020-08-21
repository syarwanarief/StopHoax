<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url','Simple_html_dom');
        $this->load->model('Query');
    }

	public function index()
	{

		$this->Query->delData('radar_lpg');
		$this->Query->delData('teras_lampung');
		$this->Query->delData('lam_pos');
		$this->Query->delData('haluan_lampung');
		$this->Query->delData('antara_lampung');

		$this->load->view('home');
	}

	public function about(){

        $this->load->view('Template');
        $this->load->view('about');
    }

	public function bantuan(){

		$this->load->view('Template');
		$this->load->view('bantuan');
	}

    public function Home(){
        $this->load->view('Template');
        $this->load->view('MenuUtama');
    }
}
