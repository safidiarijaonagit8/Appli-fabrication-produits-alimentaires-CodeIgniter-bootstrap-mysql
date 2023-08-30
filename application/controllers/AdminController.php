<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

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
    function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    public function index(){
		$this->load->helper('assets');
		$this->load->view('loginAdmin');
    }

	public function login(){

		$this->load->helper('assets');
        $this->load->model('adminmodele');
        $this->load->library('session');
        $identifiantAdmin = $this->input->post('identifiantAdmin');
        $mdpAdmin = $this->input->post('mdpAdmin');
        if($this->adminmodele->estValiderAdmin($identifiantAdmin,sha1($mdpAdmin)) == true)
        {
            $data['listeUtilisateur'] = $this->adminmodele->getListeUtilisateur();
            $this->load->view('pageAccueilAdmin',$data);
            //session
            $_SESSION['admin']=$identifiantAdmin;
        }
        else{
            $data['erreur'] = 'erreur Login ';
            $this->load->view('loginAdmin',$data);
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
        $id = $this->utilisateurmodele->getLastId();
        $this->utilisateurmodele->insertioninscriptionnonvalide($id);
        $data['erreur'] = 'Votre demande d inscription a ete recu';
		$this->load->view('loginUtilisateur',$data);
}
    public function valider()
    {
        $this->load->library('email');
        $this->load->config('email');
        $this->load->helper('assets');
        $this->load->model('adminmodele');
		$idutilisateur = $this->input->post('idutilisateur');
        $this->adminmodele->deleteDemandeInscription($idutilisateur);
        $this->adminmodele->validerInscription($idutilisateur);
        $from = $this->config->item('smtp_user');
        $this->email->from($from);
        //ovaina mail anle nanao inscription
        $data['to'] = $this->adminmodele->getEmail($idutilisateur);
        $this->email->to('safidiarijaonagit8@gmail.com');
        //$this->email->to($data['to'][0]['email']);
        $this->email->subject('Mety');
        $this->email->message('Votre demande d inscription a ete approuve');
        $this->email->send();
        $data['listeUtilisateur'] = $this->adminmodele->getListeUtilisateur();
        $data['message'] = 'Demande validee';
        $this->load->view('pageAccueilAdmin',$data);
    } 

    public function deconnexion()
    {
        if(isset($_SESSION['admin'])){
            $data['message'] = 'mandeha le session';
        }
        else{
            $data['message'] = 'tsy mandeha';
        }
        $this->load->view('test',$data);

    }
    public function listedemandeacceptee()
    {
        $this->load->helper('assets');
        $this->load->model('adminmodele');
        $data['listedemandeacceptee'] = $this->adminmodele->getListeDemandeAcceptee();
        $this->load->view('listeDemandeAcceptee',$data);

    }
    public function achat()
    {
        $this->load->helper('assets');
        $this->load->model('adminmodele');
        $data['listematiere'] = $this->adminmodele->getListeMatierePremiere();
        $this->load->view('achatmatierepremiere',$data);
    }
    public function validerachat()
    {
        $this->load->helper('assets');
        $this->load->model('adminmodele');
		$idmatiere = $this->input->post('matiere');
        $qte = $this->input->post('qte');
        $data['listematiere'] = $this->adminmodele->getListeMatierePremiere();
        $this->adminmodele->insertAchatMatiere($idmatiere,$qte);
        $data['listeachat'] = $this->adminmodele->getListeAchat();
        $this->load->view('achatmatierepremiere',$data);

    }
    public function etatstock()
    {
        $this->load->helper('assets');
        $this->load->model('adminmodele');
        $data['etatstock'] = $this->adminmodele->getEtatStock();
        $this->load->view('etatstock',$data);
    }
    public function achatafaire()
    {
        $this->load->helper('assets');
        $this->load->model('adminmodele');
        $data['achatafaire'] = $this->adminmodele->getListeAchatAFaire();
        $this->load->view('listeachatafaire',$data);
    }
    public function listeproduit()
    {
        $this->load->helper('assets');
        $this->load->model('adminmodele');
        $data['listeproduit'] = $this->adminmodele->getListeProduit();
        $this->load->view('saisieFabrication',$data);

    }
    public function fabrication()
    {
        $this->load->helper('assets');
        $this->load->model('adminmodele');
		$idproduit = $this->input->post('produit');
        $qte = $this->input->post('qte');
        $data['detailfabrication'] = $this->adminmodele->getDetailFabrication($idproduit,$qte);
        $data['listeproduit'] = $this->adminmodele->getListeProduit();
        //$data['listepf'] = $this->adminmodele->getListeProduitFiniStock();
        $a=0;
        for($i=0;$i<count($data['detailfabrication']);$i++)
        {
            if($data['detailfabrication'][$i]['reste']<$data['detailfabrication'][$i]['qteilaina'] || $data['detailfabrication'][$i]['reste']==null )
            {
                $a = $a+1;
                $data['qteinsuff'] = 'qte insuffisante ingredient';
                $data['detailfabricationprevision'] = $this->adminmodele->getDetailFabricationPrevision($idproduit,$qte);

                  
                $this->load->view('saisieFabrication',$data);
            }
         
        }
        if($a==0)
        {
            $this->adminmodele->insertStockProduitFini($idproduit,$qte);
            for($j=0;$j<count($data['detailfabrication']);$j++)
            {
               $this->adminmodele->insertStockSortiMatierePremiere($data['detailfabrication'][$j]['qteilaina'],$data['detailfabrication'][$j]['idmatierepremiere']);
            }
            $data['listepf'] = $this->adminmodele->getListeProduitFiniStock1();
            $this->load->view('saisieFabrication',$data);
        }
    } 
    public function stockpf()
    {   
        $this->load->helper('assets');
        $this->load->model('adminmodele');
        $data['listepf'] = $this->adminmodele->getListeProduitFiniStock();
        $this->load->view('stockpf',$data);
    }
    public function crudformule()
    {   
        $this->load->helper('assets');
        $this->load->model('adminmodele');
        $data['listeproduit'] = $this->adminmodele->getListeProduit();
        $this->load->view('choixproduitcrud',$data);
    }
    public function listeformule()
    {
        $this->load->helper('assets');
        $this->load->model('adminmodele');
		$idproduit = $this->input->post('produit');
        $data['listeproduit'] = $this->adminmodele->getListeProduit();
        $data['listeformule'] = $this->adminmodele->getListeFormule($idproduit);
        $data['idproduit'] = $idproduit;
        $this->load->view('choixproduitcrud',$data);
    }
    public function modifier()
    {
        $this->load->helper('assets');
        $this->load->model('adminmodele');
        $idfabrication = $this->input->post('idfabrication');
        $data['fabrication'] = $idfabrication;
        $data['listematiere'] = $this->adminmodele->getListeMatierePremiere();       
        $this->load->view('formmodif',$data);
    }
    public function supprimer()
    {
        $this->load->helper('assets');
        $this->load->model('adminmodele');
        $idfabrication = $this->input->post('idfabrication');
        $data['fabrication'] = $idfabrication;
        $this->adminmodele->deleteMatierePremiereFormule($idfabrication);       
        $data['listeproduit'] = $this->adminmodele->getListeProduit();
        $data['suppr'] = 'matiere premiere supprimer';
        $this->load->view('choixproduitcrud',$data);
    }
    public function ajouter()
    {
        $this->load->helper('assets');
        $this->load->model('adminmodele');
        $idproduit = $this->input->post('idproduit');
        $data['idproduit'] = $idproduit;
        $data['listematiere'] = $this->adminmodele->getListeMatierePremiere();       
        $this->load->view('formajout',$data);
    }
    public function updateformule()
    {
        $this->load->helper('assets');
        $this->load->model('adminmodele');
        $idfabrication = $this->input->post('idfabrication');
        $idmatiereupdate = $this->input->post('idmatiereupdate');
        $qteupdate = $this->input->post('qteupdate');
        $this->adminmodele->updateMatierePremiere($idmatiereupdate,$idfabrication,$qteupdate);
        $data['listeproduit'] = $this->adminmodele->getListeProduit();
        $this->load->view('choixproduitcrud',$data);
    }
    public function ajoutformule()
    {
        $this->load->helper('assets');
        $this->load->model('adminmodele');
        $idproduit = $this->input->post('idproduit');
        $idmatiereajout = $this->input->post('idmatiereajout');
        $qteajout = $this->input->post('qteajout');
        $this->adminmodele->ajoutMatierePremiere($idproduit,$idmatiereajout,$qteajout);
        $data['listeproduit'] = $this->adminmodele->getListeProduit();
        $this->load->view('choixproduitcrud',$data);
    }
    public function ventepf()
    {
        $this->load->helper('assets');
        $this->load->model('adminmodele');
        $data['listeproduit'] = $this->adminmodele->getListeProduit();
        $data['listepfvendu'] = $this->adminmodele->getListeProduitFiniStockVente();
        $this->load->view('ventepf',$data);
    }
    public function verificationvente()
    {
        $this->load->helper('assets');
        $this->load->model('adminmodele');
        $idproduit = $this->input->post('produit');
        $qte = $this->input->post('qte');
        $data['reste'] = $this->adminmodele->getResteProduitFini($idproduit);
        $a=0;
        if($data['reste'][0]['reste']>=$qte)
        {
            $this->adminmodele->insertVente($idproduit,$qte);
            $a=$a+1;
            $data['listepfvendu'] = $this->adminmodele->getListeProduitFiniStockVente();
            $data['listeproduit'] = $this->adminmodele->getListeProduit();
           // $data['reste'] = $data['reste'][0]['reste'];
            $data['message'] = 'vente effectuee';
            $this->load->view('ventepf',$data);   
        }
        if($a==0)
        {
            $data['message'] = 'stock produit fini insuffisant';
            $data['restes'] = $data['reste'][0]['reste'];
            $data['listepfvendu'] = $this->adminmodele->getListeProduitFiniStockVente();
            $data['listeproduit'] = $this->adminmodele->getListeProduit();
            $this->load->view('ventepf',$data); 
        }
 
    }

}