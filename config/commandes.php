<?php

//GESTION DES UTILISATEURS
function ajouterUser($pseudo, $email, $password)
{
  if(require("connexion.php"))
  {
    $req = $access->prepare("INSERT INTO users (pseudo, email, passwordbdd) VALUES (?, ?, ?)");
    $req->execute(array($pseudo, $email, $password));

    return true;

    $req->closeCursor(); //sert a fermer db
  }
}
function verifUser($pseudo, $passwordsaisi){
  
	if(require("connexion.php")){

		$req = $access->prepare("SELECT * FROM users where pseudo=?");
		$req->execute(array($pseudo));
		if($req->rowCount() == 1){
		$data = $req->fetch();
		$pseudobdd=$data['pseudo'];
		if($pseudobdd== $pseudo AND password_verify($passwordsaisi, $data['passwordbdd']))
		{
         return $data;
		}
       else{
           return false;
      }
    }
	}
}
//FIN GESTION UTILISATEURS


function afficherUnProduit($id)
{
	if(require("connexion.php"))
	{
		$req=$access->prepare("SELECT * FROM produits WHERE id_film=?");

        $req->execute(array($id));

        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return $data;

        $req->closeCursor();
	}
}

function afficher_films($critere)
{
	if(require("connexion.php"))
	{
			$req=$access->prepare("SELECT * FROM films WHERE title like '%".$critere."%' or realisateur like '%".$critere."%' ORDER BY id_film DESC");
			$req->execute();

		
        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return $data;

        $req->closeCursor();
	}
}

function afficher_categorie($critere)
{
	if(require("connexion.php"))
	{

		$req=$access->prepare("SELECT * FROM films WHERE  categorie like '%".$critere."%' ORDER BY id_film DESC");
		$req->execute();
		
        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return $data;

        $req->closeCursor();
	}
}


function afficher_all()
{
	if(require("connexion.php"))
	{

		$req=$access->prepare("SELECT * FROM films ORDER BY id_film DESC");
		$req->execute();

        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return $data;

        $req->closeCursor();
	}
}

function afficher_1($id_film)
{
	if(require("connexion.php"))
	{

		$req=$access->prepare("SELECT * FROM films WHERE id_film=? ");
		$req->execute(array($id_film));

        $data = $req->fetch();

        return $data;

        $req->closeCursor();
	}
}


//Retourne le panier actif
function return_cart($id_user){
	if(require("connexion.php"))
	{
		$req=$access->prepare("SELECT * FROM cart where pseudo=?");
		$req->execute(array($id_user));
        $data = $req->fetch();
	    if ($req->rowCount()==0){
		return 0;}
		else{
		return $data;}
        $req->closeCursor();
	}
};
//Création d'un panier
function create_cart($id_user,$total){
    if(require("connexion.php"))
    {
      $req = $access->prepare("INSERT INTO cart (pseudo,total_amount) VALUES (?,?)");

      $req->execute(array($id_user,$total));
	  return true;
      $req->closeCursor();
    }	
};
//Voir le panier
function show_cart($id_cart){
	if(require("connexion.php"))
	{
			$req=$access->prepare("SELECT * FROM cart WHERE id_cart=?");
			$req->execute(array($id_cart));
			$data = $req->fetchAll(PDO::FETCH_OBJ);
			return $data;
			$req->closeCursor();
	}
};
//Voir le détail du panier
function show_cart_details($id_cart){
	if(require("connexion.php"))
	{
			$req=$access->prepare("SELECT * FROM cart_details WHERE id_cart=?");
			$req->execute(array($id_cart));
			$data = $req->fetchAll(PDO::FETCH_OBJ);
			return $data;
			$req->closeCursor();
	}
};
//Suppression d'un panier
function delete_cart_details($id_cart,$pseudo){
	if(require("connexion.php"))
	{
		//Supression details
		$req=$access->prepare("DELETE FROM cart_details WHERE id_cart=$id_cart and pseudo='$pseudo'");

		$req->execute();
		return true;
		$req->closeCursor();
	}
};
//Calcul du total d'un panier
function total_price($id_cart){
	if(require("connexion.php"))
    {
      //Calcul total
	  $req = $access->prepare("SELECT SUM(price) as total FROM cart_details WHERE id_cart=?");
      $req->execute(array($id_cart));
	  $data = $req->fetch();
	  $total=$data['total'];
      $req->closeCursor();
	  //Mise à jour total
	  $req = $access->prepare("UPDATE cart set total_amount=? WHERE id_cart=?");
      $req->execute(array($total,$id_cart));
	  return true;
	  $req->closeCursor();
    }	
};
//Ajoute un film
function add_films($id_cart,$id_film,$title,$price,$pseudo){
    if(require("connexion.php"))
    {
      $req = $access->prepare("INSERT INTO cart_details (id_cart,id_film,title,price,pseudo) VALUES (?,?,?,?,?)");

      $req->execute(array($id_cart,$id_film,$title,$price,$pseudo));
	  return true;
      $req->closeCursor();
    }	
};

//Supprime un film
function delete_films($id_ligne,$pseudo){
		if(require("connexion.php"))
		{
		//Supression details
		$req=$access->prepare("DELETE FROM cart_details WHERE id_lignes=$id_ligne and pseudo='$pseudo'");

		$req->execute();
		return true;
		$req->closeCursor();
		}
};

?>