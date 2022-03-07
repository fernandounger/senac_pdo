CREATE DATABASE aluno_pdo;
	USE aluno_pdo;

CREATE TABLE aluno(
	id INT PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(50) NOT NULL,
	email VARCHAR(100) NOT NULL
);
INSERT INTO aluno(nome , email) VALUES
('Sandra', 'sandra@senac.com'),
('Ronaldo', 'ronaldo@senac.com');

SELECT * FROM aluno;