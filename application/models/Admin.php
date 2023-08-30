<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Admin extends CI_Model{
public function estValiderAdmin($nom,$mdp){

    $sql = "select * from gerant";
    //$sql = sprintf($sql,$this->db->escape($idP));

		$query = $this->db->query($sql);
		$admin = array();
		foreach($query->result_array() as $key) {
			$admin[] = $key;
        }
        for($i = 0; $i<count($admin);$i++)
        {
            if($admin[$i]['identifiant']==$nom && $admin[$i]['mdp']==$mdp)
            {
                return true;
            }
        }
		return false;
	}
    public function ajouterCategorie($nomCategorie)
    {
        $sql = "INSERT into categorie value(null,%s)";
        $sql = sprintf($sql,$this->db->escape($nomCategorie));
		$this->db->query($sql);
    }
    public function ajouterProduit($nomP,$idC,$sary,$qteStock,$prixU)
    {
        $sql = "INSERT into produit value(null,%s,%s,%s,%s,%s)";
        $sql = sprintf($sql,$this->db->escape($nomP),$this->db->escape($idC),$this->db->escape($sary),$this->db->escape($qteStock),$this->db->escape($prixU));
		$this->db->query($sql);
    }
	public function getListeCategorie()
    {
        $sql = "SELECT * FROM categorie";
        $query = $this->db->query($sql);
		$categorie = array();
        foreach($query->result_array() as $key) {
			$categorie[] = $key;
        }
        return $categorie;
    }
    public function supprimerProduit($idP)
    {
        $sql = "DELETE FROM produit where idProduit = %s";
        $sql = sprintf($sql,$this->db->escape($idP));
        $this->db->query($sql);
    }
    public function deleteCategorie($idC)
    {
        $sql = "DELETE FROM categorie where idCategorie = %s";
        $sql = sprintf($sql,$this->db->escape($idC));
        $this->db->query($sql);
    }
    public function updateProduit($idProduit,$nomP,$idC,$sary,$qteStock,$prixU)
    {
        $sql = "UPDATE produit set nomProduit = %s,idCategorie = %s,saryProduit = %s,QteStock = %s,prixUnitaire = %s WHERE idProduit = %s";
        $sql = sprintf($sql,$this->db->escape($nomP),$this->db->escape($idC),$this->db->escape($sary),$this->db->escape($qteStock),$this->db->escape($prixU),$this->db->escape($idProduit));
        $this->db->query($sql);
    }
}
?>