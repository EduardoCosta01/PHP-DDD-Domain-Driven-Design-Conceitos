<?php

namespace Alura\Arquitetura\Academico\Testes\Dominio\Aluno;

use Alura\Arquitetura\Academico\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Shared\Dominio\Cpf;
use Alura\Arquitetura\Academico\Dominio\Email;
use PHPUnit\Framework\TestCase;

class AlunoTest extends TestCase
{
    private Aluno $aluno;

    protected function setUp(): void
    {
        $this->aluno = new Aluno(
            $this->createStub(Cpf::class),
            '',
            $this->createStub(Email::class)
        );
    }

    public function testAdicionarMaisDe2TelefonesDeveLancarExcecao()
    {
        $this->expectException(\DomainException::class);

        $this->aluno->adicionarTelefone('24', '22222222');
        $this->aluno->adicionarTelefone('24', '999999999');
        $this->aluno->adicionarTelefone('24', '12345678');
    }

    public function testAdicionar1TelefoneDeveFuncionar()
    {
        $this->aluno->adicionarTelefone('24', '22222222');

        $this->assertCount(1, $this->aluno->telefones());
    }

    public function testAdicionar2TelefonesDeveFuncionar()
    {
        $this->aluno->adicionarTelefone('24', '22222222');
        $this->aluno->adicionarTelefone('24', '999999999');

        $this->assertCount(2, $this->aluno->telefones());
    }
}
