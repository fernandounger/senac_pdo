<?php
    define("__HOST__", "localhost");
    define("__USER__", "root"); 
    define("__PASS__", "");
    define("__DATABASE__", "aluno_pdo");

    function getConnection()
    {
        try {
            $key = 'strval';
            $con = new PDO("mysql:host={$key(__HOST__)};dbname={$key(__DATABASE__)}", __USER__, __PASS__) or die("Erro ao tentar conectar ao banco.");
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $con;
        } catch (PDOException $error) {
            echo "Erro ao conectar no banco. Erro: {$error->getMessage()}";
            exit;
        }
    }
    getConnection();

