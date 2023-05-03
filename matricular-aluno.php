<?php

use Alura\Arquitetura\Academico\Aplicacao\Aluno\MatricularAluno\MatricularAluno;
use Alura\Arquitetura\Academico\Aplicacao\Aluno\MatricularAluno\MatricularAlunoDto;
use Alura\Arquitetura\Academico\Dominio\Aluno\LogDeAlunoMatriculado;
use Alura\Arquitetura\Academico\Infra\Aluno\RepositorioDeAlunoEmMemoria;
use Alura\Arquitetura\Gamificacao\Aplicacao\GeraSeloDeNovato;
use Alura\Arquitetura\Gamificacao\Infra\Selo\RepositorioDeSeloEmMemoria;
use Alura\Arquitetura\Shared\Dominio\Evento\PublicadorDeEvento;

require 'vendor/autoload.php';

$cpf = $argv[1];
$nome = $argv[2];
$email = $argv[3];
$ddd = $argv[4];
$numero = $argv[5];

$publicador = new PublicadorDeEvento();
$publicador->adicionarOuvinte(new LogDeAlunoMatriculado());
$publicador->adicionarOuvinte(new GeraSeloDeNovato(new RepositorioDeSeloEmMemoria()));

$useCase = new MatricularAluno(new RepositorioDeAlunoEmMemoria(), $publicador);

$useCase->executa(new MatricularAlunoDto($cpf, $nome, $email));
