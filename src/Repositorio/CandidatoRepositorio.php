<?php

namespace web3\prjsempog\Repositorio; 

use PDO;
use web3\prjsempog\Modelo\Candidato;       

class CandidatoRepositorio
{
    private PDO $pdo;

    /**
     * @param PDO $pdo
     */

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function buscarTodos(): array {
        $sql = "SELECT * FROM candidato ORDER BY id";
        $statement3 = $this->pdo->query($sql);
        $candidatoTodos = $statement3->fetchAll(PDO::FETCH_ASSOC);

        $dadosTodos = array_map(function ($todos) {
            return $this->formarObjeto($todos);
        }, $candidatoTodos);

        return $dadosTodos;
    }

    public function buscar(int $id)
    {
        $sql = "SELECT * FROM candidato WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id);
        $statement->execute();

        $dados = $statement->fetch(PDO::FETCH_ASSOC);

        return $this->formarObjeto($dados);
    }

    private function formarObjeto($dados)
    {
        return new Candidato(
            $dados['id'],
            $dados['nome'],
            $dados['escolaridade'],
            $dados['instituicao'],
            $dados['resumo'],
            $dados['artigo']
        );
    }

    public function salvar(Candidato $candidato) 
    {
        $sql = "INSERT INTO candidato (nome, escolaridade, instituicao, resumo, artigo) VALUES (?, ?, ?, ?, ?)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $candidato->getNome());
        $statement->bindValue(2, $candidato->getEscolaridade());
        $statement->bindValue(3, $candidato->getInstituicao());
        $statement->bindValue(4, $candidato->getResumo());
        $statement->bindValue(5, $candidato->getArtigo());
        $statement->execute();
    }

    public function deletar(int $id)
    {
        $sql = "DELETE FROM candidato WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id);
        $statement->execute();
    }

    public function atualizar(Candidato $candidato)
    {
        $sql = "UPDATE candidato SET nome = ?, escolaridade = ?, instituicao = ?, resumo = ?, artigo = ? WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $candidato->getNome());
        $statement->bindValue(2, $candidato->getEscolaridade());
        $statement->bindValue(3, $candidato->getInstituicao());
        $statement->bindValue(4, $candidato->getResumo());
        $statement->bindValue(5, $candidato->getArtigo());
        $statement->bindValue(6, $candidato->getId());
        $statement->execute();
    }
}