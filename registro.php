<?php
require 'static/php/system/database.php';
require 'static/php/system/config.php';
$email1 = $_POST['emailr'];
$senha1 = DBEscape(strip_tags(trim(sha1($_POST['senhar']))));
$nomer = $_POST['nomer'];
$pincode = $_POST['pincode'];
$sobrenome = $_POST['sobrenomer'];
function validaEmail($email1) {
	$conta = "^[a-zA-Z0-9\._-]+@";
	$domino = "[a-zA-Z0-9\._-]+.";
	$extensao = "([a-zA-Z]{2,4})$";
	$pattern = $conta.$domino.$extensao;
	if (ereg($pattern, $email1))
	return true;
	else
	return false;
	}

if (!($email1) || !($senha1) || !($nomer)|| !($sobrenome)|| !($pincode)){
    print "<p>Preencha todos os campos!</p>"; exit();
}

if(!validaEmail($email1)){
	print "<p>E-mail invalido</p>"; exit();
}

$dbCheck = DBRead( 'user', "WHERE id and email = '". $email1."'" );

if( $dbCheck ){
	print "<p>Já utilizaram esse email</p>"; exit();
}

else{
//Abrindo Conexao com o banco de dados
$conexao = mysql_pconnect($hostp,$userp,$passwrdp) or die (mysql_error());
$banco = mysql_select_db($dbp);
$thecryed = DBEscape(strip_tags(trim(sha1($_POST['emailr']))));
$form2['email'] = mysql_real_escape_string($email1);
$form2['senha'] = mysql_real_escape_string($senha1);
$form2['inisession'] = date('Y-m-d H:i:s');
$form2['datec'] = date('Y-m-d H:i:s');
$form2['lastlogin'] = date('Y-m-d H:i:s');
$form2['configurado'] = '0';
$form2['nome'] = $nomer;
$form2['sobrenome'] = $sobrenome;
$form2['pin'] = $pincode;
$form2['thecry'] = $thecryed;
$form2['coins'] = "0";
$form2['priv'] = "0";
$form2['admin'] = "0";
$form2['photo'] = "default.png";
$form2['capa'] = "4.jpg";
$form2['background'] = "2.jpg";
$form2['exp'] = "0";
$form2['nivel'] = "0";
$form2['ip']= mysql_real_escape_string($_SERVER['REMOTE_ADDR']);

	if( DBCreate( 'user', $form2 ) ){	
	print "<p>Cadastrado com sucesso!</p>";
	$busca  = "SELECT id FROM pixel_user WHERE email = '".$email1."'";
	$identificacao = mysql_query($busca);
	$retorno = mysql_fetch_array($identificacao);
	$iduser = $retorno['id'];
	$inisession = date('Y-m-d H:i:s');
	$busca2  = "SELECT thecry FROM pixel_user WHERE email = '".$email1."'";
	$identificacao2 = mysql_query($busca2);
	$retorno2 = mysql_fetch_array($identificacao2);
	$idcry = $retorno2['thecry'];
	setcookie("thecry", $idcry);
	setcookie("iduser", $iduser);
	setcookie("inisession", $inisession);
	echo '<script>location.href="/";</script>';
	exit();
	}

}
?>