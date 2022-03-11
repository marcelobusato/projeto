<?php

	require "conexao.php";

	foreach ($_POST as $key => $value) {
		$_POST[$key] = Conexao::anti_injection($value);
	}
	foreach ($_GET as $key => $value) {
		$_GET[$key] = Conexao::anti_injection($value);
	}

	$nome_pessoa = utf8_decode($_POST['nome-pessoa']);
	$naturalidade_pessoa = utf8_decode ($_POST['naturalidade-pessoa']);
	$nascimento_pessoa = utf8_decode($_POST['nascimento-pessoa']);
	
	$selectOption = $_POST['taskOption'];
	$ocupacao = $_POST['ocupacao'];
	$escolaridade = $_POST['escolaridade'];
	$situacao = $_POST['situacao'];
	$curso = $_POST['curso'];

	$rg_pessoa = utf8_decode($_POST['rg-pessoa']);
	$cpf_pessoa = utf8_decode($_POST['cpf-pessoa']);
	$nomeresp_pessoa = utf8_decode($_POST['nomeresp-pessoa']);
	$cpfresp_pessoa = utf8_decode($_POST['cpfresp-pessoa']);
	$nascimentoresp_pessoa = utf8_decode($_POST['nascimentoresp-pessoa']);
	$naturalidaderesp_pessoa = utf8_decode($_POST['naturalidaderesp-pessoa']);
	$enderecorua_pessoa = utf8_decode($_POST['enderecorua-pessoa']);
	$bairro_pessoa = utf8_decode($_POST['bairro-pessoa']);
	$cidade_pessoa = utf8_decode($_POST['cidade-pessoa']);
	$estado_pessoa = utf8_decode($_POST['estado-pessoa']);
	$cep_pessoa = utf8_decode($_POST['cep-pessoa']);
	$fone_pessoa = utf8_decode($_POST['fone-pessoa']);
	$fonerec_pessoa = utf8_decode($_POST['fonerec-pessoa']);
	$fonecomercial_pessoa = utf8_decode($_POST['fonecomercial-pessoa']);
	$fonefixo_pessoa = utf8_decode($_POST['fonefixo-pessoa']);
	
	$con = Conexao::getInstance(1);
	$query = "INSERT INTO alunos3 VALUES (NULL, '$nome_pessoa', '$naturalidade_pessoa' , '$nascimento_pessoa' , '$selectOption' , '$rg_pessoa' 
	, '$cpf_pessoa' , '$nomeresp_pessoa' , '$cpfresp_pessoa' , '$nascimentoresp_pessoa' , '$naturalidaderesp_pessoa' , '$enderecorua_pessoa' 
	, '$bairro_pessoa' , '$cidade_pessoa' , '$estado_pessoa' , '$cep_pessoa' , '$fone_pessoa' 
	, '$fonerec_pessoa' , '$fonecomercial_pessoa' , '$fonefixo_pessoa' , '$ocupacao' , '$escolaridade' , '$situacao' , '$curso')";
	$stmt = $con->prepare($query);
	$stmt->execute();
	
	if($stmt->errorCode() != 0){
		Header("Location:http://localhost/web/teste/?" . "form=ERRO&nome-pessoa=" . $_POST['nome-pessoa'] . "&naturalidade-pessoa=" . $_POST['naturalidade-pessoa']);
		die();
	}else{
		Header("Location:http://localhost/web/teste/?" . "form=OK&nome-pessoa=" . $_POST['nome-pessoa'] . "&naturalidade-pessoa=" . $_POST['naturalidade-pessoa']);
		die();
	}


?>