<?php
	require_once('./aluno.crud.php');

if($_POST['nomeAluno'] == NULL || $_POST['emailAluno'] == NULL){
	header('location: error.php?status=acess-deny');
	die();
}

$aluno = new stdClass();
$aluno->nome = $_POST['nomeAluno'];
$aluno->email = $_POST['emailAluno'];
$register = addAluno($aluno);

    if(!$register){
        header("location: aluno.form.php?status=success");
        die();
    }
    header("location: error.php?status=fail");
        die();

