<?php

use App\Model;

namespace App\Model;

class ProdutoDAO
{

	public function create(Produto $produto): bool
	{
		$sql = 'INSERT INTO produtos (nome, descricao) VALUES (?, ?)';
		$conn = Conexao::getConexao();

		$stmt = $conn->prepare($sql);
		$stmt->bindValue(1, $produto->getNome());
		$stmt->bindValue(2, $produto->getDescricao());

		return $stmt->execute();
	}

	public function read(): array
	{
		$sql = 'SELECT * FROM produtos';
		$stmt = Conexao::getConexao()->prepare($sql);
		$stmt->execute();

		if (!$stmt->rowCount()) {
			return [];
		}

		return array_map(function ($tuple) {
			extract($tuple);
			return (new Produto())
				->setId($id)
				->setNome($nome)
				->setDescricao($descricao);
		}, $stmt->fetchAll());
	}

	public function update(Produto $produto): ?Produto
	{
		$sql = 'UPDATE produtos SET nome = ?, descricao = ? WHERE id = ?';
		$stmt = Conexao::getConexao()->prepare($sql);
		$stmt->bindValue(1, $produto->getNome());
		$stmt->bindValue(2, $produto->getDescricao());
		$stmt->bindValue(3, $produto->getId());

		if ($stmt->execute()) {
			return $produto;
		}
	}

	public function delete(int $id): bool
	{
		$sql = 'DELETE FROM produtos WHERE id = ?';
		$stmt = Conexao::getConexao()->prepare($sql);
		$stmt->bindValue(1, $id);

		return $stmt->execute();
	}
}
