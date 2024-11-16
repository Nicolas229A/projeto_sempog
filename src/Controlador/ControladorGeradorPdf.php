<?php

namespace web3\prjsempog\Controlador;

use web3\prjsempog\Repositorio\CandidatoRepositorio;
use web3\prjsempog\Modelo\Candidato;
use Dompdf\Dompdf;

class ControladorGeradorPdf 
{
    public function __construct(private CandidatoRepositorio $candidatoRepositorio)
    {
    }

    public function processaRequisicao(): void
    {
        /**
         * https://packagist.org/ - Local padrão de dependências do PHP
         * pesquisar por dompdf/dompdf
         * Instalação:  composer requiredompdf/dompdf
         */
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $candidatos = $this->candidatoRepositorio->buscarTodos();
        /**
         * ob_start() inicia um buffer de saída
         */
        ob_start();
        
        require_once __DIR__. "/../../conteudo-pdf.php";
        /**
         * ob_get_clean() Pega o conteúdo renderizado e atribui na variável $html e limpa o buffer
         */
        $html = ob_get_clean();

        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
    }
}

?>