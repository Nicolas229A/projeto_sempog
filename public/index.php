<?php

require_once __DIR__."/../vendor/autoload.php";

use web3\prjsempog\ConexaoBd;  
use web3\prjsempog\Modelo\Candidato;
use web3\prjsempog\Repositorio\CandidatoRepositorio;
use web3\prjsempog\Controlador\ControladorAdmin;
use web3\prjsempog\Controlador\ControladorCadastrarCandidato;
use web3\prjsempog\Controlador\ControladorExcluirCandidato;
use web3\prjsempog\Controlador\ControladorEditarCandidato;
use web3\prjsempog\Controlador\ControladorGeradorPdf;


$conexaoBd = new ConexaoBd();
$pdo = $conexaoBd->conexao();

$candidatoRepositorio = new CandidatoRepositorio($pdo);

if (!array_key_exists('PATH_INFO', $_SERVER)  || $_SERVER["PATH_INFO"] == "/") {
    $controlador = new ControladorCadastrarCandidato($candidatoRepositorio);
    $controlador->processaRequisicao();
} elseif ($_SERVER["PATH_INFO"] == "/admin"){
    $controlador = new ControladorAdmin($candidatoRepositorio);
    $controlador->processaRequisicao();
} elseif ($_SERVER["PATH_INFO"] == "/excluir") {
    $controlador = new ControladorExcluirCandidato($candidatoRepositorio);
    $controlador->processaRequisicao();
} elseif ($_SERVER["PATH_INFO"] == "/editar") {
    $controlador = new ControladorEditarCandidato($candidatoRepositorio);
    $controlador->processaRequisicao();
} elseif ($_SERVER["PATH_INFO"] == "/relatorio") {
    $controlador = new ControladorGeradorPdf($candidatoRepositorio);
    $controlador->processaRequisicao();
}  

?>
