<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class AdminModele extends CI_Model{
public function estValiderAdmin($identifiant,$mdp){

    $sql = "select * from superadmin";  //perf : manao where de isaina
    $query = $this->db->query($sql);
		$admin= array();
		foreach($query->result_array() as $key) {
			$admin[] = $key;
        }
        for($i = 0; $i<count($admin);$i++)
        {
            if($admin[$i]['identifiant']==$identifiant && $admin[$i]['mdp']==$mdp)
            {
                return true;
            }
        }
		return false;
	}

    public function getListeUtilisateur()
    {
        $sql = "select * from utilisateurnonvalide unv join utilisateur u on unv.idutilisateur=u.id"; 
    //    $sql = sprintf($sql,$this->db->escape($email));
		$query = $this->db->query($sql);
		$liste = array();
		foreach ($query->result_array() as $key) {
			$liste[] = $key;
		}
		return $liste;

    }
    public function validerInscription($id)
    {
        $sql = "INSERT into utilisateurvalide values(null,%s)";
        $sql = sprintf($sql,$this->db->escape($id));
		$this->db->query($sql);
    }
    public function deleteDemandeInscription($id)
    {
        $sql = "DELETE FROM utilisateurnonvalide where idutilisateur=%s";
        $sql = sprintf($sql,$this->db->escape($id));
		$this->db->query($sql);
    }
    public function getListeDemandeAcceptee()
    {
        
        $sql = "select * from utilisateurvalide unv join utilisateur u on unv.idutilisateur=u.id"; 
    //    $sql = sprintf($sql,$this->db->escape($email));
		$query = $this->db->query($sql);
		$liste = array();
		foreach ($query->result_array() as $key) {
			$liste[] = $key;
		}
		return $liste;
     }
     public function getListeMatierePremiere()
     {
         
         $sql = "select * from matierepremiere"; 
     //    $sql = sprintf($sql,$this->db->escape($email));
         $query = $this->db->query($sql);
         $liste = array();
         foreach ($query->result_array() as $key) {
             $liste[] = $key;
         }
         return $liste;
      }
      public function insertAchatMatiere($idmatiere,$qte)
      {
        $formated_DATE = date('Y-m-d');
        $sql = "INSERT into stock values(null,%s,%s,0,%s)";
        $sql = sprintf($sql,$this->db->escape($idmatiere),$this->db->escape($qte),$this->db->escape($formated_DATE));
		$this->db->query($sql);
    }
    public function getListeAchat()
    {
        $sql = "select * from stock s join matierepremiere mp on s.idmatierepremiere=mp.id where qtesortie=0"; 
        //    $sql = sprintf($sql,$this->db->escape($email));
            $query = $this->db->query($sql);
            $liste = array();
            foreach ($query->result_array() as $key) {
                $liste[] = $key;
            }
            return $liste;

    }
    public function getEtatStock()
    {
        $sql = "select * from v_etatstock"; 
        //    $sql = sprintf($sql,$this->db->escape($email));
            $query = $this->db->query($sql);
            $liste = array();
            foreach ($query->result_array() as $key) {
                $liste[] = $key;
            }
            return $liste;
    }
    public function getEmail($id)
    {
        $sql = "select email from utilisateur where id=%s"; 
        $sql = sprintf($sql,$this->db->escape($id));
            $query = $this->db->query($sql);
            $liste = array();
            foreach ($query->result_array() as $key) {
                $liste[] = $key;
            }
            return $liste;
    }
    
    public function getListeAchatAFaire()
    {
        $sql = "SELECT reste, seuil,nom
        from v_verifseuil
        where reste < seuil or reste is null"; 
        //    $sql = sprintf($sql,$this->db->escape($email));
            $query = $this->db->query($sql);
            $liste = array();
            foreach ($query->result_array() as $key) {
                $liste[] = $key;
            }
            return $liste;
    }
    public function getListeProduit()
    {
        $sql = "select * from produit"; 
        
            $query = $this->db->query($sql);
            $liste = array();
            foreach ($query->result_array() as $key) {
                $liste[] = $key;
            }
            return $liste;

    }
    public function insertStockProduitFini($idproduit,$qte)
    {
        $formated_DATE = date('Y-m-d');
        $sql = "INSERT into stockproduitfini values(null,%s,%s,%s,%s)";
        $qtesortie = 0;
        $sql = sprintf($sql,$this->db->escape($idproduit),$this->db->escape($qte),$this->db->escape($qtesortie),$this->db->escape($formated_DATE));
		$this->db->query($sql); 
    }
    public function getListeProduitFiniStock()
    {
        $qtesortie = 0;
        $sql = "select reste,nomproduit from v_etatstockproduitfini";
        $sql = sprintf($sql,$this->db->escape($qtesortie));
        
        $query = $this->db->query($sql);
        $liste = array();
        foreach ($query->result_array() as $key) {
            $liste[] = $key;
        }
        return $liste;

    }
    public function getListeProduitFiniStock1()
    {
        $qtesortie = 0;
        $sql = "select * from stockproduitfini s join produit p on s.idproduit=p.id where qtesortie=%s";
        $sql = sprintf($sql,$this->db->escape($qtesortie));
        
        $query = $this->db->query($sql);
        $liste = array();
        foreach ($query->result_array() as $key) {
            $liste[] = $key;
        }
        return $liste;

    }
    public function getListeFabrication()
    {
        $sql = "select * from v_fabrication"; 
        
        $query = $this->db->query($sql);
        $liste = array();
        foreach ($query->result_array() as $key) {
            $liste[] = $key;
        }
        return $liste;

    }
    public function getDetailFabrication($idproduit,$qte)
    {
        $sql = "select f.idproduit,f.idmatierepremiere,mp.nom,reste,(f.qte*%s)/100 as qteilaina from 
        fabrication f left join v_etatstock v 
        on f.idmatierepremiere=v.idmatierepremiere 
        join matierepremiere mp on f.idmatierepremiere = mp.id 
        join produit p on 
        f.idproduit=p.id where f.idproduit=%s"; 
        $sql = sprintf($sql,$this->db->escape($qte),$this->db->escape($idproduit));
        $query = $this->db->query($sql);
        $liste = array();
        foreach ($query->result_array() as $key) {
            $liste[] = $key;
        }
        return $liste;
}

       public function insertStockSortiMatierePremiere($qteilaina,$idmatierepremiere)
        {
            
            $formated_DATE = date('Y-m-d');
            
                $sql = "insert into stock values(null,%s,0,%s,%s)"; 
                $sql = sprintf($sql,$this->db->escape($idmatierepremiere),$this->db->escape($qteilaina),$this->db->escape($formated_DATE));
                $query = $this->db->query($sql);       
            
        }
        public function getListeFormule($idproduit)
        {
            $sql = "select * from v_fabrication where idproduit=%s"; 
            $sql = sprintf($sql,$this->db->escape($idproduit));
                $query = $this->db->query($sql);
                $liste = array();
                foreach ($query->result_array() as $key) {
                    $liste[] = $key;
                }
                return $liste;          
        }
        public function updateMatierePremiere($idmatiereupdate,$idfabrication,$qteupdate)
        {
            $sql = "update fabrication set idmatierepremiere=%s,qte=%s where id=%s"; 
            $sql = sprintf($sql,$this->db->escape($idmatiereupdate),$this->db->escape($qteupdate),$this->db->escape($idfabrication));
            $query = $this->db->query($sql);  
        
        }
        public function deleteMatierePremiereFormule($idfabrication)
        {
            $sql = "delete from fabrication where id=%s"; 
            $sql = sprintf($sql,$this->db->escape($idfabrication));
            $query = $this->db->query($sql);  
        }
        public function ajoutMatierePremiere($idproduit,$idmatiereajout,$qteajout)
        {
            $sql = "insert into fabrication values(null,%s,%s,%s)"; 
            $sql = sprintf($sql,$this->db->escape($idproduit),$this->db->escape($idmatiereajout),$this->db->escape($qteajout));
            $query = $this->db->query($sql);  
        }
        public function getListeProduitFiniStockVente()
        {
            $qteentree = 0;
            $sql = "select * from stockproduitfini s join produit p on s.idproduit=p.id where s.qteentree=%s";
            $sql = sprintf($sql,$this->db->escape($qteentree));
            
            $query = $this->db->query($sql);
            $liste = array();
            foreach ($query->result_array() as $key) {
                $liste[] = $key;
            }
            return $liste;          
        }
        public function getResteProduitFini($idproduit)
        {
            $sql = "select reste from v_etatstockproduitfini where idproduit=%s"; 
            $sql = sprintf($sql,$this->db->escape($idproduit));
                $query = $this->db->query($sql);
                $liste = array();
                foreach ($query->result_array() as $key) {
                    $liste[] = $key;
                }
                return $liste;            
        }
        public function insertVente($idproduit,$qte)
        {
            $qteentree = 0;
            $formated_DATE = date('Y-m-d');
            $sql = "insert into stockproduitfini values(null,%s,%s,%s,%s)"; 
            $sql = sprintf($sql,$this->db->escape($idproduit),$this->db->escape($qteentree),$this->db->escape($qte),$this->db->escape($formated_DATE));
            $query = $this->db->query($sql);  
        }
        public function getDetailFabricationPrevision($idproduit,$qte)
        {
            $sql = "select f.idproduit,f.idmatierepremiere,mp.nom,reste,(f.qte*%s)/100 
            as qteilaina,(reste*%s)/((f.qte*%s)/100) 
            as vitanymp 
            from fabrication f 
            left join v_etatstock v 
            on f.idmatierepremiere=v.idmatierepremiere 
            join matierepremiere mp 
            on f.idmatierepremiere = mp.id 
            join produit p 
            on f.idproduit=p.id
            where f.idproduit=%s ORDER BY vitanymp asc"; 
            $sql = sprintf($sql,$this->db->escape($qte),$this->db->escape($qte),$this->db->escape($qte),$this->db->escape($idproduit));
                $query = $this->db->query($sql);
                $liste = array();
                foreach ($query->result_array() as $key) {
                    $liste[] = $key;
                }
                return $liste; 
        }

      }
?>