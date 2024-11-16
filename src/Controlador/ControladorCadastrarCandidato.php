<?php

namespace web3\prjsempog\Controlador;

use web3\prjsempog\Repositorio\CandidatoRepositorio;
use web3\prjsempog\Modelo\Candidato;

class ControladorCadastrarCandidato
{
    public function __construct(private CandidatoRepositorio $candidatoRepositorio)
    {
    }

    public function processaRequisicao(): void
    {
        if (isset($_POST['cadastro'])) {
            $candidato = new Candidato(
                null,
                $_POST['nome'],
                $_POST['escolaridade'],
                $_POST['instituicao']
            );
        
            // if (isset($_FILES['artigo'])) {
            //     $candidato->setArtigo(uniqid() . $_FILES['artigo']['name']);
            //     move_uploaded_file($_FILES['artigo']['tmp_name'], $candidato->getArtigoDiretorio());

            // }

            if (!empty($_FILES['resumo']['name'])) {
                $nomeArquivo = uniqid() . '_' . $_FILES['resumo']['name'];
                $candidato->setResumo($nomeArquivo);
                move_uploaded_file($_FILES['resumo']['tmp_name'], $candidato->getResumoDiretorio());
            } else {
                $candidato->setResumo('');
            }

            if (!empty($_FILES['artigo']['name'])) {
                $nomeArquivo = uniqid() . '_' . $_FILES['artigo']['name'];
                $candidato->setArtigo($nomeArquivo);
                move_uploaded_file($_FILES['artigo']['tmp_name'], $candidato->getArtigoDiretorio());
            } else {
                $candidato->setArtigo('');
            }
            

            $this->candidatoRepositorio->salvar($candidato);

            header("Location: admin");

        }
    
        require_once __DIR__. "/../../inicio-html.php";
        require_once __DIR__. "/../../cadastrar-candidato.php";
        require_once __DIR__. "/../../fim-html.php";
    }
}

?>