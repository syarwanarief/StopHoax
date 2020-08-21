<?php


class search extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url', 'simple_html_dom');
		$this->load->library('session');
		$this->load->model('Query');

	}

	function index()
	{

		$this->Query->delData('radar_lpg');
		$this->Query->delData('lam_pos');
		$this->Query->delData('teras_lampung');
		$this->Query->delData('haluan_lampung');
		$this->Query->delData('kompas');

		$inputan = $this->input->get('keyword');

		$pattern = '/\s+/';
		$replace = '%20';

		$inputanR = str_replace(" ", "%20", $inputan);

		$urlRadar = "https://radarlampung.co.id/?s=" . $inputanR;
		$htmlRadar = new simple_html_dom();
		// Load HTML from a url
		$htmlRadar->load_file($urlRadar);

		$judul = $htmlRadar->find('h2[class=entry-title]');

		$judulRadar = array();
		$linkRadar = array();

		foreach ($judul as $post) {
			// Get the link
			$judulRadar[] = $post->children(0)->plaintext;
			$linkRadar[] = $post->children(0)->href;
		}

		if (!empty($judulRadar)) {

			for ($i = 0; $i < count($judulRadar); $i++) {/*
				if (strstr($judulRadar[$i], $inputan) == true) {*/
				$input_data = $this->Query->inputData(array(
					'judul' => $judulRadar[$i],
					'link' => $linkRadar[$i]
				),
					'radar_lpg');
			}
		}


		$urlLamPos = "https://www.lampost.co/search?q=" . $inputanR;
		$htmlLamPos = new simple_html_dom();
		$htmlLamPos->load_file($urlLamPos);

		$crawLamPos = $htmlLamPos->find('h3[class=media-heading]');

		$judulLamPos = array();
		$linkLamPos = array();

		foreach ($crawLamPos as $post) {
			// Get the link
			$judulLamPos[] = $post->children(0)->plaintext;
			$linkLamPos[] = $post->children(0)->href;
		}

		if (!empty($judulLamPos)) {

			for ($i = 0; $i < count($judulLamPos); $i++) {
				$input_data = $this->Query->inputData(array(
					'judul' => $judulLamPos[$i],
					'link' => $linkLamPos[$i]
				),
					'lam_pos');
			}
		}


		$urlTerasLampung = "https://www.teraslampung.com/?s=" . $inputanR;
		$htmlTerasLampung = new simple_html_dom();
		$htmlTerasLampung->load_file($urlTerasLampung);

		$crawTerasLampung = $htmlTerasLampung->find('h3[class=entry-title td-module-title]');
		$crawTerasLampungLink = $htmlTerasLampung->find('article');

		$judulTerasLampung = array();
		$linkTerasLampung = array();

		foreach ($crawTerasLampung as $post) {
			$judulTerasLampung[] = $post->children(0)->plaintext;
			$linkTerasLampung[] = $post->children(0)->href;
		}


		if (!empty($judulTerasLampung)) {

			for ($i = 0; $i < count($judulTerasLampung); $i++) {/*
				if (strstr($judulTerasLampung[$i], $inputan) == true) {*/
				$input_data = $this->Query->inputData(array(
					'judul' => $judulTerasLampung[$i],
					'link' => $linkTerasLampung[$i]
				),
					'teras_lampung');
			}
		}


		$urlhaluan_lampung = "https://haluanlampung.com/?s=" . $inputanR;
		$htmlhaluan_lampung = new simple_html_dom();
		$htmlhaluan_lampung->load_file($urlhaluan_lampung);

		$crawhaluan_lampung = $htmlhaluan_lampung->find('h2[class=entry-title]');
		$crawhaluan_lampunglink = $htmlhaluan_lampung->find('article');

		$judulhaluan_lampung = array();
		$linkhaluan_lampung = array();

		foreach ($crawhaluan_lampung as $post) {

			$judulhaluan_lampung[] = $post->children(0)->plaintext;
			$linkhaluan_lampung[] = $post->children(0)->href;
		}


		if (!empty($judulhaluan_lampung)) {

			for ($i = 0; $i < count($judulhaluan_lampung); $i++) {/*
				if (strstr($judulhaluan_lampung[$i], $inputan) == true) {*/
				$input_data = $this->Query->inputData(array(
					'judul' => $judulhaluan_lampung[$i],
					'link' => $linkhaluan_lampung[$i]
				),
					'haluan_lampung');
			}
		}

		$urlKompas = "https://www.liputan6.com/search?q=" . $inputanR;
		$htmlKompas = new simple_html_dom();
		$htmlKompas->load_file($urlKompas);

		$crawKompas = $htmlKompas->find('a[class=ui--a articles--iridescent-list--text-item__title-link]');
		$crawKompaslink = $htmlKompas->find('article');

		$judulKompas = array();
		$linkKompas = array();

		foreach ($crawKompas as $post) {

			$judulKompas[] = $post->children(0)->plaintext;
			$linkKompas[] = $post->children(0)->href;
		}


		if (!empty($judulKompas)) {

			for ($i = 0; $i < count($judulKompas); $i++) {/*
				if (strstr($judulKompas[$i], $inputan) == true) {*/
				$input_data = $this->Query->inputData(array(
					'judul' => $judulKompas[$i],
					'link' => $linkKompas[$i]
				),
					'kompas');
			}
		}

		/*
				// Extract the next link, if not found return NULL
				$url = ( ($temp = $html->find('div[class=gmr-ajax-load-wrapper gmr-load-more]', 0)->last_child()) ? $temp->href : NULL );*/

		// Clear DOM object
		$htmlRadar->clear();
		$htmlLamPos->clear();
		$htmlTerasLampung->clear();
		$htmlhaluan_lampung->clear();
		$htmlKompas->clear();
		unset($htmlRadar, $htmlLamPos, $htmlTerasLampung, $htmlhaluan_lampung, $htmlKompas);
		/*
				echo "Judul : " . json_encode($judul) . "<br>";
				echo "Harga : " . json_encode($harga) . "<br>";*/

		$data['radar'] = $this->Query->getAllData('radar_lpg')->result();
		$data['lampos'] = $this->Query->getAllData('lam_pos')->result();
		$data['TerasLampung'] = $this->Query->getAllData('teras_lampung')->result();
		$data['haluan_lampung'] = $this->Query->getAllData('haluan_lampung')->result();
		$data['kompas'] = $this->Query->getAllData('kompas')->result();

		$this->load->view('MenuUtama.php', $data);
	}

}
