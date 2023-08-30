<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class UtilisateurModele extends CI_Model{
public function estValiderUtilisateur($emailU,$mdpU){

    $sql = "select * from utilisateurvalide uv join utilisateur u on u.id=uv.idutilisateur";  //perf : manao where de isaina
    $query = $this->db->query($sql);
		$utilisateur = array();
		foreach($query->result_array() as $key) {
			$utilisateur[] = $key;
        }
        for($i = 0; $i<count($utilisateur);$i++)
        {
            if($utilisateur[$i]['email']==$emailU && $utilisateur[$i]['mdp']==$mdpU)
            {
                return true;
            }
        }
		return false;
	}

    public function insertioninscription($nom,$prenom,$email,$sexe,$dtn,$mdp)
    {
        $sql = "INSERT into utilisateur values(null,%s,%s,%s,%s,%s,%s)";
        $sql = sprintf($sql,$this->db->escape($nom),$this->db->escape($prenom),$this->db->escape($sexe),$this->db->escape($email),$this->db->escape($dtn),$this->db->escape($mdp));
		$this->db->query($sql);
    }
    public function getLastId()
    {
        $sql = "select max(id) as id from utilisateur";
        $query = $this->db->query($sql);
		
        
		$somme = array();
		foreach ($query->result_array() as $key) {
			$somme[] = $key;
		}
		return $somme;
    }
    public function insertioninscriptionnonvalide($id)
    {
        $sql = "INSERT into utilisateurnonvalide values(null,%s)";
        $sql = sprintf($sql,$this->db->escape($id));
		$this->db->query($sql);
    }

    public function getNomUtilisateur($email)
    {
        $sql = "select nom,prenom from utilisateurvalide uv join utilisateur u on u.id=uv.idutilisateur where u.email=%s";  //perf : manao where de isaina
        $sql = sprintf($sql,$this->db->escape($email));
		$query = $this->db->query($sql);
		$detail = array();
		foreach ($query->result_array() as $key) {
			$detail[] = $key;
		}
		return $detail;
    }
}
?>