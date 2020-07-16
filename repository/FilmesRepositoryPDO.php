<?php

require "Conexao.php";

class FilmesRepositoryPDO{

    private $conexao;

    public function __construct(){
        $this->conexao =  Conexao::criar();
    }

    public function listarTodos(){
        $filmesLista = array();

        $sql = "SELECT * FROM filmes";
        $filmes = $this->conexao->query($sql);
        if (!$filmes) return false;
        
        while ($filme = $filmes->fetchObject()){
            array_push($filmesLista, $filme);
        }
        return $filmesLista;
    }

    public function salvar($filme):bool{
        $sql = "INSERT INTO filmes (titulo, poster, sinopse, nota) 
        VALUES (:titulo, :poster, :sinopse, :nota)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':titulo', $filme->titulo, PDO::PARAM_STR);
        $stmt->bindValue(':sinopse', $filme->sinopse, PDO::PARAM_STR);
        $stmt->bindValue(':nota', $filme->nota, PDO::PARAM_STR);
        $stmt->bindValue(':poster', $filme->poster, PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function favoritar(int $id){
        $sql = "UPDATE filmes SET favorito = NOT favorito WHERE id=:id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        if($stmt->execute()){
            return "ok";
        }else{
            return "erro";
        }
    }

    public function delete(int $id){
        $sql = "DELETE FROM filmes WHERE id=:id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        if($stmt->execute()){
            return "ok";
        }else{
            return "erro";
        }
    }

}