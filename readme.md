# PDO - Atividade 01
- Criação da função que irá persistir os dados de aluno usando PDO.
~~~php
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
~~~
- Criação da função que irá listar todos os alunos usando PDO.
~~~php
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
~~~
- Criação da função que irá buscar um aluno específico usando PDO.
~~~php
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
~~~
- Criação da função que irá atualizar os dados de aluno usando PDO.
~~~php
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
~~~
- Criação da função que irá deletar o aluno usando PDO.
~~~php
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
~~~

## Iniciando o Git no projeto e o enviando par ao GitHub.
![](https://media.discordapp.net/attachments/938167867017396295/950428337996714034/unknown.png?width=312&height=428)
![](https://media.discordapp.net/attachments/938167867017396295/950428505584328774/unknown.png)
### Repositório no GitHub.
![GitHub](https://media.discordapp.net/attachments/938167867017396295/950426722816364614/unknown.png)