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
		$this->Query->delData('antara_lampung');

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

		$wordLamPos = explode(' ', trim($inputan));

		if (!empty($judulLamPos)) {

			for ($i = 0; $i < count($judulLamPos); $i++) {/*
				if (strstr($judulLamPos[$i], $wordLamPos[0]) == true || strstr($judulLamPos[$i], $wordLamPos[1]) == true) {*/
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


		$wordTL = explode(' ', trim($inputan));

		if (!empty($judulTerasLampung)) {

			for ($i = 2; $i < count($judulTerasLampung); $i++) {/*
				if (strstr($judulTerasLampung[$i], $wordTL[0]) == true || strstr($judulTerasLampung[$i], $wordTL[1]) == true) {*/
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


		$wordhaluan_lampung = explode(' ', trim($inputan));

		if (!empty($judulhaluan_lampung)) {

			for ($i = 0; $i < count($judulhaluan_lampung); $i++) {/*
				if (strstr($judulhaluan_lampung[$i], $wordhaluan_lampung[0]) == true || strstr($judulhaluan_lampung[$i], $wordhaluan_lampung[1]) == true) {*/
				$input_data = $this->Query->inputData(array(
					'judul' => $judulhaluan_lampung[$i],
					'link' => $linkhaluan_lampung[$i]
				),
					'haluan_lampung');
			}
		}

		$urlAntaraLampung = "https://lampung.antaranews.com/search?q=" . $inputanR;
		$htmlAntaraLampung = new simple_html_dom();
		$htmlAntaraLampung->load_file($urlAntaraLampung);

		$crawAntaraLampung = $htmlAntaraLampung->find('div[class=simple-thumb]');
		$crawAntaraLampunglink = $htmlAntaraLampung->find('article');

		$judulAntaraLampung = array();
		$linkAntaraLampung = array();

		foreach ($crawAntaraLampung as $post) {

			$judulAntaraLampung[] = $post->children(0)->title;
			$linkAntaraLampung[] = $post->children(0)->href;
		}


		$wordAntaraLampung = explode(' ', trim($inputan));

		if (!empty($judulAntaraLampung)) {

			for ($i = 0; $i < count($judulAntaraLampung); $i++) {/*
				if (strstr($judulAntaraLampung[$i], $wordAntaraLampung[0]) == true || strstr($judulAntaraLampung[$i], $wordAntaraLampung[1]) == true) {*/
				if ($judulAntaraLampung[$i] != "0") {
					$input_data = $this->Query->inputData(array(
						'judul' => $judulAntaraLampung[$i],
						'link' => $linkAntaraLampung[$i]
					),
						'antara_lampung');
				}
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
		$htmlAntaraLampung->clear();
		unset($htmlRadar, $htmlLamPos, $htmlTerasLampung, $htmlhaluan_lampung, $htmlAntaraLampung);
		/*
				echo "Judul : " . json_encode($judul) . "<br>";
				echo "Harga : " . json_encode($harga) . "<br>";*/

		$data['radar'] = $this->Query->getAllData('radar_lpg')->result();
		$data['lampos'] = $this->Query->getAllData('lam_pos')->result();
		$data['TerasLampung'] = $this->Query->getAllData('teras_lampung')->result();
		$data['haluan_lampung'] = $this->Query->getAllData('haluan_lampung')->result();
		$data['AntaraLampung'] = $this->Query->getAllData('antara_lampung')->result();

		$this->load->view('MenuUtama.php', $data);
	}

}
