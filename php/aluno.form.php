<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Formulário de Cadastro de Alunos</title>
</head>
<body style="background-color: #24aabd;">
    <header>
        <?php include_once './navbar.php';?>
    </header>
    <div class="container col-6">
        <fieldset>
            <legend class="text-white">Cadastro de Aluno</legend>
            <form action="./aluno.cadastro.php" method="post">
                <div class="form-group mb-3">
                    <label for="nomeAluno" class="form-label text-white">Nome:</label>
                    <input class="form-control" type="text" name="nomeAluno" id="nomeAluno" placeholder="Digite o nome do aluno" required>
                </div>
                <div class="form-group mb-3">
                    <label for="emailAluno" class="form-label text-white">Email:</label>
                    <input class="form-control" type="text" name="emailAluno" id="emailAluno" placeholder="email@dominio.com" required>
                </div>
                <button class="btn btn-dark" type="submit">Cadastrar Aluno</button>
            </form>
        </fieldset>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>