<?php
session_start();

if (isset($_POST['login']) && isset($_POST['password'])) {
	echo "success";
}else{
	echo "failure";
}
?>