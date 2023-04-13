<?php
// Cria as tabelas caso não existam
$pdo->exec("
-- Cria tabela de tipos
CREATE TABLE tipos (
    tipo TEXT PRIMARY KEY
);

-- Insere os tipos na tabela tipos caso não existam
INSERT OR IGNORE INTO tipos (tipo) VALUES
('administrador'),
('aluno'),
('professor');
");

$pdo->exec("
-- Cria tabela de matérias
CREATE TABLE materias (
    materia TEXT PRIMARY KEY
);

-- Insere as matérias do ensino médio na tabela materias caso não existam
INSERT OR IGNORE INTO materias (materia) VALUES
('Artes'),
('Biologia'),
('Educação Física'),
('Filosofia'),
('Física'),
('Geografia'),
('História'),
('Inglês'),
('Matemática'),
('Português'),
('Química'),
('Sociologia');
");

$pdo->exec("
-- Cria tabela de usuários
CREATE TABLE usuarios (
    nome TEXT PRIMARY KEY,
    senha TEXT NOT NULL,
    tipo TEXT NOT NULL,
    FOREIGN KEY (tipo) REFERENCES tipos(tipo)
);

-- Insere usuario admin padrao na tabela usuarios caso não existam
INSERT OR IGNORE INTO usuarios (nome, senha, tipo) VALUES
('admin', 'admin', 'administrador');
");

$pdo->exec("
-- Cria tabela de conteúdos
CREATE TABLE conteudos (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    titulo TEXT NOT NULL,
    conteudo TEXT NOT NULL,
    nome TEXT NOT NULL,
    materia TEXT NOT NULL,
    FOREIGN KEY (nome) REFERENCES usuarios(nome),
    FOREIGN KEY (materia) REFERENCES materias(materia)
);
");
?>
