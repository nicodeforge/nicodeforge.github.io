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
echo $LOGIN;
include('connexion.php');
$marque=$_POST['marque'];
$cylindree=$_POST['cylindree'];
$modele=$_POST['modele'];


//----


if (1==1) 

{
$lien=mysql_connect(HOTE,USER,PASS)  or die($php_errormsg);
mysql_select_db(BASE,$lien); 

$marque=strtoupper($marque);
$cylindree=strtoupper($cylindree);
$modele=strtoupper($modele);

$query ="select * from x_essais where marque like '%$marque%' and cylindree like '%$cylindree%' and modele like '%$modele%' order by cylindree, marque ";
 //echo $query;
$result=mysql_query($query, $lien);

$nbrows = mysql_num_rows($result); 
$nbfields = mysql_num_fields($result); 

if ($nbrows >=50) {print "il y à plus de 50 réponses, veuillez préciser votre demande .<br>";}
if (($nbrows >=1) and  ($nbrows < 50))
{


print("<table>");
$rang=0;

print("</table>");

mysql_close($lien);
}else
{print("<BR><BR><B> <font size=\"4\" color=\"#FF0000\"> Vous ne pouvez pas accéder à la base de données, accés refusé. Vérifiez votre code ! </B> </font>");
}
?> 


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
    <p class="text-info"><span class="glyphicon glyphicon-info-sign"></span> Il y a <?php echo($nbrows) ?> enregistrements</p>
    <div class="well"><p class="text-muted">Type C = Comparatifs<br>E = Essai<br>P = Pr&eacute;sentation</p></div>

    <table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Marque</th>
      <th>Cylindr&eacute;e</th>
      <th>Mod&eacute;le</th>
      <th>Type</th>
      <th>Code</th>
      <th>Ann&eacute;e</th>
    </tr>
  </thead>
  <tbody>
  <tr>
  <?php
  while ($row=mysql_fetch_array($result))
{
   
   for ($field=0;$field<$nbfields;$field++) 
       { 
       $champ=mysql_fieldname($result, $field);  
   
      if ($champ=='id')
       {
        $numero=$row[$field];
        }
       else
     
       if ($champ=='marque')
       {print("<td>".$row[$field]."</td>");
    $marque=$row[$field]; 
       }
       else
       if ($champ=='cylindree')
       {
        print("<Td>" .$row[$field]. "</td>"); 
        $cyl=$row[$field];
       }
       else  
       if ($champ=='modele')
       {print(" <td>".$row[$field]."</td>"); 
        $mod=$row[$field];
       }
       else  
       if ($champ=='doc')
       {print("<td>".$row[$field]."</td>"); 
       }
       else  
       if ($champ=='classement')
       {print("<td>".$row[$field].$numero."</td>");
       $numero=$row[$field].$numero;
        }     
     else 
      if ($champ=='annee')
       {print("<td>".$row[$field]."</td>"); 
       }
        
      
      }
       print("</tr>");
  
}
}
?>

  
    
  </tbody>
</table> 
  </div>
  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <!-- Javascript de Bootstrap -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> 
</body>
</html>