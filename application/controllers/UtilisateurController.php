<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UtilisateurController extends CI_Controller {

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

	public function index(){
		$this->load->helper('assets');
		$this->load->view('loginUtilisateur');
	}

	public function inscription()
	{
		$this->load->helper('assets');
		$this->load->view('inscriptionUtilisateur');
		
	}	
    public function login(){

		$this->load->helper('assets');
        $this->load->model('utilisateurmodele');
        $emailU = $this->input->post('emailUtilisateur');
        $mdpU = $this->input->post('mdpUtilisateur');
        if($this->utilisateurmodele->estValiderUtilisateur($emailU,sha1($mdpU)) == true)
        {
			$data['detail'] = $this->utilisateurmodele->getNomUtilisateur($emailU);
            $this->load->view('pageAccueilUtilisateur',$data);
        }
        else{
            $data['erreur'] = 'Vous n etes pas encore valider';
            $this->load->view('loginUtilisateur',$data);

        }
		
	}	
	public function insertioninscription(){
		$this->load->helper('assets');
        $this->load->model('utilisateurmodele');
		$nomU = $this->input->post('nomUtilisateur');
        $prenomU = $this->input->post('prenomUtilisateur');
		$sexeU = $this->input->post('sexe');
		$dtnU = $this->input->post('dtnUtilisateur');
        $emailU = $this->input->post('emailUtilisateur');
		$mdpU = $this->input->post('mdpUtilisateur');

		$this->utilisateurmodele->insertioninscription($nomU,$prenomU,$emailU,$sexeU,$dtnU,sha1($mdpU));
		$data['id'] = $this->utilisateurmodele->getLastId();
		$this->utilisateurmodele->insertioninscriptionnonvalide($data['id'][0]['id']);
		$data['erreur'] = 'Votre demande d inscription a ete recu';
		$this->load->view('loginUtilisateur',$data);
	
	}
}
