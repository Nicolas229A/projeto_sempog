<?php

namespace web3\prjsempog\Modelo; 

class Candidato
{
    private ?int $id;
    private string $nome;
    private string $escolaridade;
    private string $instituicao;
    private string $resumo;
    private string $artigo;
    

    public function __construct(
        ?int $id, 
        string $nome, 
        string $escolaridade, 
        string $instituicao,
        string $resumo = "",
        string $artigo = ""
        )
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->escolaridade = $escolaridade;
        $this->instituicao = $instituicao;
        $this->resumo = $resumo;
        $this->artigo = $artigo;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getEscolaridade(): string
    {
        return $this->escolaridade;
    }

    public function getInstituicao(): string
    {
        return $this->instituicao;
    }

    public function getResumo(): string
    {
        return $this->resumo;
    }

    public function getResumoDiretorio(): string
    {
        return $this->resumo ? "pdf/" . $this->resumo : "";
    }


    public function setResumo(string $resumo): void
    {
        $this->resumo = $resumo;
    }

    public function getArtigo(): string
    {
        return $this->artigo;
    }

    public function getArtigoDiretorio(): string
    {
        return $this->artigo ? "pdf/" . $this->artigo : "";
    }


    public function setArtigo(string $artigo): void
    {
        $this->artigo = $artigo;
    }
}