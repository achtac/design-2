<?php   
session_start();
 require "connexiondb.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="connexion.css"> 
    <link rel="stylesheet" href="icon/css/all.min.css">   
    <title>Document</title>
</head>
<body>







<?php

$idverif = $_GET['idins'];
 if(isset($_POST['connexion'])){

$mailconnect = htmlspecialchars($_POST['mailconnect']);
$mdpconnect = htmlspecialchars($_POST["mdpconnect"]);

 


          if(!empty($mailconnect) AND
             !empty($mdpconnect))
             {


                $verif = $bdd->prepare("SELECT * FROM client WHERE mail = ? AND mdp = ?");
                  
                 $verif ->execute(array($mailconnect,$mdpconnect));
                 $verifcount = $verif->rowCount();
                 
                 if($verifcount == 1){


                    $up = $verif->fetch();
                    $_SESSION['id'] = $up['id'];
                    $_SESSION['nom'] = $up['nom'];
                    $_SESSION['mdp'] = $up['mdp'];

                    
                    if(isset($idverif)){ 

                    header("location:miseajour.php");
                    } else{
                        
                    header("location:headerclient.php");

                    }
                    

                 }else if($verifcount==0){

                     $erreur="cet utilisateur n existe pas";


                 }


              
                

            
              


          }else{

             $erreur="veuillez remplir tous les champs";

          }



 }





?>

<div id="connexion">
<section>
<br>
 <i style="color:white; positon:absolute; margin-left:48%; margin-top:-15%" class="fas fa-circle"></i>
<br><br>
 <div id="ecran">

<form method="post">
    <h1>Connexion</h1>
    <label>mail:</label>
    <br><br>
    <input type="mail"  name="mailconnect" placeholder="Entez votrwe e-mail">
    <br>
    <br>
        <label>mot de passe:</label>
 <br><br>
        <input type="password" name="mdpconnect"  placeholder="votre mot de passe">
    <br><br>
    <input type="submit" name="connexion" value="connexion">
     <br><br>   
    <input type="reset" value="effacer">
</form>
<p style="color:red;" align="center">
<?php

     if(isset($erreur)){
         echo $erreur;
     }



?>

</p>
</font>
<b></b>
</div>


<div id="btn">
    <i class="fas fa-chevron-left"></i>
    <i class="fas fa-adjust"></i>
    <i class="fas fa-chevron-right"></i>

    
</div>

</section>    
<section>
    <br><br><br><br><br>
    <i style="font-size:55px; color:rbga(10,0,0,1);" class="fas fa-camera"></i>
</section>
<br><br><br>
<button id="voila"><I class="fas fa-chevron-left"></I></button>

</div>










<br><br><br><br>






</body>
</html>
<script>

    kl = document.getElementsByTagName("section")[0];
    kl2 = document.getElementsByTagName("section")[1];

    kl.onclick = ()=>{
        kl2.style.left="35%";
    }

    l = document.getElementById('voila');
    ln = document.getElementById('connexion');
    voila.onclick = ()=>{
        ln.style.left ="100%";
        ln.style.transition ="all 2s";
    }

     lr = document.getElementById('voil');
    lnr = document.getElementById('connexion');
    voil.onclick = ()=>{
         lnr.style.left ="-1%";
         lnr.style.transition ="all 2s";
    }
   
</script>