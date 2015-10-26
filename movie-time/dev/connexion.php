<?
$maison=0;
$onweb=1;
$table_essais='x_essais';

if ($maison==1)
{
define ("HOTE","localhost");
define ("USER","userweb");
define ("PASS","userweb");
define ("BASE","db_xd");
} else
if ($onweb==1)
{
define ("HOTE","cl2-sql2");  // 
define ("USER","deforge3");
define ("PASS","ch2tz=5");
define ("BASE","deforge3");
}

?>
