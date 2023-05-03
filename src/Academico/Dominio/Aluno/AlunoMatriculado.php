<?php

namespace Alura\Arquitetura\Academico\Dominio\Aluno;

use Alura\Arquitetura\Shared\Dominio\Cpf;
use Alura\Arquitetura\Shared\Dominio\Evento\Evento;

class AlunoMatriculado implements Evento
{
    private \DateTimeImmutable $momento;
    private Cpf $cpfAluno;

    public function __construct(Cpf $cpfAluno)
    {
        $this->momento = new \DateTimeImmutable();
        $this->cpfAluno = $cpfAluno;
    }

    public function cpfAluno(): Cpf
    {
        return $this->cpfAluno;
    }

    public function momento(): \DateTimeImmutable
    {
        return $this->momento;
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
