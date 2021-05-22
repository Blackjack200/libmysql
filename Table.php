<?php


namespace libmysql;


use libmysql\types\Type;
use libmysql\utils\SQLBuilder;

class Table implements SQL {
	protected string $name;
	protected bool $notExists = false;
	protected array $columns = [];
	protected string $key;

	public function column(string $name, Type $type) : self {
		$this->columns[$name] = $type->toString();
		return $this;
	}

	public function name(string $val) : self {
		$this->name = $val;
		return $this;
	}

	public function notExists(bool $val) : self {
		$this->notExists = $val;
		return $this;
	}

	public function primary(string $key) : self {
		$this->key = $key;
		return $this;
	}

	/** @noinspection SqlNoDataSourceInspection */
	public function get() : string {
		$ret = new SQLBuilder(/** @lang text */
			'CREATE TABLE');
		$ret->space();
		if ($this->notExists) {
			$ret->append('IF NOT EXISTS')->space();
		}
		$ret->append($this->name)
			->space()
			->append('(')
			->enter();
		foreach ($this->columns as $name => $type) {
			$ret->tab()
				->append("`$name`")->space()->append($type)->append(',')
				->enter();
		}
		$ret->tab()
			->append("PRIMARY KEY (`$this->key`)")->enter()
			->append(')')
			->tab()->append('DEFAULT CHARSET=utf8;');
		return $ret->buf();
	}
}
