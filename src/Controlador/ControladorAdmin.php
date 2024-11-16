<?php

namespace web3\prjsempog\Controlador;

use web3\prjsempog\Repositorio\CandidatoRepositorio;

class ControladorAdmin
{
    public function __construct(private CandidatoRepositorio $candidatoRepositorio)
    {
    }

    public function processaRequisicao(): void
    {
        $dados = $this->candidatoRepositorio->buscarTodos();
        require_once __DIR__."/../../admin.php";
    }
}

?>