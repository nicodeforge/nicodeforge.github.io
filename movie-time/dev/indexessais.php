<?
session_start();
// On affiche une phrase résumant les infos sur l'utilisateur courant
$droitdoda=$_SESSION['DROIT'];
$LOGIN    =$_SESSION['LOGIN'];
$couleur=0;
$coul_ligne1 ="#CCCCBB";
$coul_ligne2 ="#CCCCCC";  
$couleur="#FFFFCC";
if ($droitdoda <= 0) 
{
echo "<b>DENIED!</b>";
exit;
}
?>
<!--START HTML-->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="WIP">
      <title>Work In Progress</title>

      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
      <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/cosmo/bootstrap.min.css" rel="stylesheet" integrity="sha256-IF1P9CSIVOaY4nBb5jATvBGnxMn/4dB9JNTLqdxKN9w= sha512-UsfHxnPESse3RgYeaoQ7X2yXYSY5f6sB6UT48+F2GhNLqjbPhtwV2WCUQ3eQxeghkbl9PioaTOHNA+T0wNki2w==" crossorigin="anonymous">
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
<body>
  <div class="container">
    <!--Main content goes here-->
    <div class="jumbotron">
      <h1>Des histoires de pistons, de t&ocirc;les et de boulons qui finissent bien !</h1>
      <p>Pour trouver un essai, faite une recherche par marque, par cylindr&eacute;e ou par type.</p>
    </div>
     <div class="row">
      <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <p class="panlel-title">Rechercher</p>
        </div>
       <form method="post" name="form1" action="essaiselect.php" class="panel-body">
        <p><input type="text" name="marque" placeholder="Marque"></p>
        <p><input type="text" name="cylindree" placeholder="Cylindr&eacute;e"></p>
        <p><input type="text" name="modele" placeholder="Mod&eacute;le"></p>
        <p>
        <input class ="btn btn-sm btn-default" type="reset" name="Submit2" value="R&eacute;initialiser">
        <input class="btn btn-sm btn-primary" type="submit" name="Submit" value="Envoyer">
      </p>
    </form>
      </div>
      </div>
     </div> 
     <div class="row">
    <p class="text-info"><span class="glyphicon glyphicon-info-sign"></span>
      Vous trouverez ici une liste d'essai issus de diverses revues collectionn&eacute;es au fil des ann&eacute;es.
    Une grande partie des essais concernent des motos de 1975 à 1985, mais il y en à aussi d'apr&eacute;s 2000.</p>
     </div>

   

  </div>
  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <!-- Javascript de Bootstrap -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> 
</body>
</html>

<!--END HTML-->

<!-- 
<html>#BeginTemplate "/Templates/modelepage.dwt"
<head>
<title>restauration moto terrot bsa yamaha motobecane</title>
<meta name="Description" content="restauration 125 terrot 350 terrot 250 bsa<">
<meta name="Keywords" content="motorcycle restauration, terrot, 350 hlg, 125 terrot , 350 terrot, hlg, yas1, yas2, 125 yamaha, bsa, 250cc bsa, moto, bsa C11, C11, restauration, réservoir, moteur, boîte de vitesses, motorcycle,250, 250 cc, 350, 125, TERROT, BSA 250 C11">

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<style type="text/css"> 


.menumoto {	border-top: 1px none #333333;
	border-right: thin none #333333;
	border-bottom: 1px none #333333;
	border-left: 1pt none #333333;
	font-size: 9pt;
	font-style: normal;
	color: #FFFFFF;
	font-family: Arial, Helvetica, sans-serif;
}




.thumbnail_border {
border: thin solid #514c39;
}
.photo_boder {
border-top-color: #333333;
	border-right-color: #333333;
	border-bottom-color: #333333;
	border-left-color: #333333;
}
.thumbnail_caption {
font-family: Arial, Helvetica, sans-serif; font-size: 9pt; color: #FFFFFF;
}


</style>


<body>
  <div class="container">
    
  </div>
<div align="center">
  <table width="960" border="0" bordercolor="dccdac" cellspacing="0">
    <tr bgcolor="dccdac" bordercolor="dccdac"> 
      <td colspan="3"><a href="album.htm"><img src="img/bandeau-haut.jpg" width="950" height="150" border="0"></a></td>
    </tr>
    <tr bgcolor="514c39" bordercolor="514c39"> 
      <td width="151" height="18" bordercolor="514c39">
        <div align="center"><a href="index.php"><font face="Arial, Helvetica, sans-serif" size="2" color="dccdac"><b>Retour 
          accueil</b></font></a></div>
      </td>
     
    </tr>
    <tr bgcolor="dccdac" bordercolor="dccdac"> 
      <td width="151" height="668"> 
        
      </td>
      <td width="642" height="668">
        <table width="100%" border="0" cellspacing="0">
          <tr>
            <td>
<title>Motos et passions !</title>
 <bgsound src="images/vroum.wav" loop=1> 
                  <p align="left">&nbsp;</p>
                  <p align="center"> <font face="Comic Sans MS" color="#0000FF"><i><font face="Comic Sans MS" color="#0000FF"><i><font size="+3">Essais 
                    Motos</font></i></font></i></font></p>
                  <blockquote> 
                    <div align="left"> 
                      <p><font face="Comic Sans MS">Vous trouverez ici une liste 
                        d'essai issus de diverses revues collectionn&eacute;es 
                        au fil des ann&eacute;es.</font><font face="Comic Sans MS">Une 
                        grande partie des essais concernent des motos de 1975 
                        &agrave; 1985, mais il y en &agrave; aussi d'apr&eacute;s 
                        2000.</font></p>
                      
                      <p><font face="Comic Sans MS">Pour trouver un essai, faite 
                        une recherche par marque, par cylindr&eacute;e ou par 
                        type.</font></p>
                      <p align="center"><a href="essais_form.htm">Ajouter</a></p>
                      
                      <p>&nbsp;</p>
                    </div>
                  </blockquote>
                  <!-- #EndEditable </td>
          </tr>
        </table>
      </td>
      <td width="153" height="668">&nbsp; </td>
    </tr>
    
  
      <tr bgcolor="dccdac" bordercolor="dccdac"> 
      <td colspan="3" height="17"><img src="img/damierbas.jpg" width="960" height="20"></td>
    </tr>
	</table>
</div>
</body>
<!-- #EndTemplate</html> --><!-- DW6 -->
