<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/Load
	 *	- or -
	 * 		http://example.com/index.php/Load/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/Load/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
	}

	public function accueilCont($test = ''){
		$this->load->helper('assets');
		$caisse = $this->input->get('idCaisse'); //idCaisse
		$data['choixCaisse'] = $caisse; //atao ze atafiditra anaty session
		$this->load->model('categorie');
		$this->load->model('produit');

		$data['listeCategorie'] = $this->categorie->getListeCategorie();
		$data['listeProduit'] = $this->produit->getListeProduit();
		$this->load->model('caisse');
		$data['listeCaisse'] = $this->caisse->getListeCaisse();
		$this->load->view('index',$data);
	}

}