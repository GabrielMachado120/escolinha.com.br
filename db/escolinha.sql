create database if not exists dbescola
character set utf8bm4
collate utf8mb4_unicode_ci;

use dbescola;

create table alunos (
    id_aluno int auto_increment primary key,
    nome varchar(100) not null,
    cpf char(32) not null,
    curso varchar(100) not null,
    login varchar(50) not null unique,
    senha char(32) not null
);

create table professores (
    id_professor int auto_increment primary key,
    nome varchar(100) not null,
    cpf char(32) not null,
    curso varchar(100) not null,
    login varchar(50) not null unique,
    senha char(32) not null
);