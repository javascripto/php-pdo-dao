<?php

require __dir__ . '/../vendor/autoload.php';

use App\Model\Produto;
use App\Model\ProdutoDAO;


// App\MetodosMagicos::main();

$produto = new Produto();
$produtoDAO = new ProdutoDAO();

$produto
	->setId(1)
	->setNome('Notebook')
	->setDescricao('Intel Core i5, 16GB, SSD 256GB');

// $produtoDAO->create($produto);
// $produtoDAO->update($produto);
// $produtoDAO->delete(2);
// $products = $produtoDAO->read();

// print_r($products);
