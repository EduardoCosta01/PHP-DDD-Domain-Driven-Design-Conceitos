<?php

namespace Alura\Arquitetura\Gamificacao\Dominio\Selo;

use Alura\Arquitetura\Shared\Dominio\Cpf;

class Selo
{
    private Cpf $cpfAluno;
    private string $nome;

    public function __construct(Cpf $cpfAluno, string $nome)
    {
        $this->cpfAluno = $cpfAluno;
        $this->nome = $nome;
    }

    public function cpfAluno(): Cpf
    {
        return $this->cpfAluno;
    }

    public function __toString(): string
    {
        return $this->nome;
    }
}
