<?php
require_once ('./conexao.php');

function addAluno($aluno)
{
    try {
        $con = getConnection();
        $stmt = $con->prepare("INSERT INTO aluno(nome, email) VALUES (:nome, :email)");
        $stmt->bindParam(":email", $aluno->email);
        $stmt->bindParam(":nome", $aluno->nome);
        if ($stmt->execute())
            echo "Aluno foi cadastrado com sucesso!";
    } catch (PDOException $error) {
        echo "Erro ao cadastrar esse aluno. Erro: {$error->getMessage()}";
    } finally {
        unset($con);
        unset($stmt);
    }
}
function listarAluno()
{
    try {
        $con = getConnection();
        $rs = $con->query("SELECT nome, email FROM aluno");
        while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            echo $row->nome . "<br>";
            echo $row->email . "<br>";
        }
    } catch (PDOException $error) {
        echo "Erro ao listar os alunos. Erro: {$error->getMessage()}";
    } finally {
        unset($con);
        unset($rs);
    }
}
function buscarAluno($nome)
{
    try {
        $con = getConnection();
        $stmt = $con->prepare("SELECT nome, email FROM aluno WHERE nome LIKE :nome");
        $stmt->bindValue(":nome", "%{$nome}%");

        if($stmt->execute()) {
            if($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                    echo $row->nome . "<br>";
                    echo $row->email . "<br>";
                }
            }
        }
    } catch (PDOException $error) {
        echo "Erro ao buscar o aluno '{$nome}'. Erro: {$error->getMessage()}";
    } finally {
        unset($con);
        unset($stmt);
    }
}
function atualizarAluno($aluno)
{
    try {
        $con = getConnection();
        $stmt = $con->prepare("UPDATE aluno SET nome = :nome, email = :email WHERE id = :codigo");
        $stmt->bindParam(":codigo", $aluno->codigo);
        $stmt->bindParam(":nome", $aluno->nome);
        $stmt->bindParam(":email", $aluno->email);
        if ($stmt->execute())
            echo "Aluno foi atualizado com sucesso!";
    } catch (PDOException $error) {
        echo "Erro ao atualizar esse aluno. Erro: {$error->getMessage()}";
    } finally {
        unset($con);
        unset($stmt);
    }
}
function deletarAluno($cod)
{
    try {
        $con = getConnection();
        $stmt = $con->prepare("DELETE FROM aluno WHERE id = ?");
        $stmt->bindParam(1, $cod);
        if ($stmt->execute())
            echo "Aluno deletado!";
    } catch (PDOException $error) {
        echo "Erro ao deletar o aluno. Erro: {$error->getMessage()}";
    } finally {
        unset($con);
        unset($stmt);
    }
}
listarAluno();