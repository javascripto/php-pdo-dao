<?php

namespace App;

// Métodos Mágicos
class Person
{
	private $name;

	public function __set($prop, $value)
	{
		$this->$prop = $value;
	}

	public function __get($prop)
	{
		if (isset($this->$prop)) {
			return $this->$prop;
		}
		return null;
	}

	public function __toString()
	{
		return json_encode(
			get_object_vars($this)
		);
	}

	public function __invoke()
	{
		return print_r(
			get_object_vars($this),
			true
		);
	}

	public function __clone()
	{
		$this->name = '(Copy) ' . $this->name;
	}
}

class MetodosMagicos
{
	public static function main()
	{
		$fulano = new Person();
		$fulano->name = 'Fulano'; // set - private prop
		echo $fulano->name; // get

		echo $fulano; // toString
		echo $fulano(); // invoke


		$fulanoClone = clone $fulano; // clone

		echo $fulano;
		echo $fulanoClone;
	}
}
