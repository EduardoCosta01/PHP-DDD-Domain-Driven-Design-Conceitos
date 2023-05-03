<?php

namespace Alura\Arquitetura\Academico\Aplicacao\Indicacao;

use Alura\Arquitetura\Academico\Dominio\Aluno\Aluno;

interface EnviaEmailIndicacao
{
    public function enviaPara(Aluno $alunoIndicado): void;
}
