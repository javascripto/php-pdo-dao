<?php

namespace App\Model;

class Produto {
	
	private $id;
	private $nome;
	private $descricao;

	public function getId(): int
	{
		return $this->id;
	}

	public function setid(int $id): Produto
	{
		$this->id = $id;
		return $this;
	}

	public function getNome(): string
	{
		return $this->nome;
	}

	public function setNome(string $nome): Produto
	{
		$this->nome = $nome;
		return $this;
	}

	public function getDescricao(): string
	{
		return $this->descricao;
	}

	public function setDescricao(string $descricao): Produto
	{
		$this->descricao = $descricao;
		return $this;
	}
}
