<?php

namespace web3\prjsempog\Controlador;

use web3\prjsempog\Repositorio\CandidatoRepositorio;

class ControladorExcluirCandidato  
{
    public function __construct(private CandidatoRepositorio $candidatoRepositorio)
    {
    }

    public function processaRequisicao(): void
    {
        $this->candidatoRepositorio->deletar($_POST['id']);

        header("Location: admin");
    }
}

?>