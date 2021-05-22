<?php


namespace libmysql;


use libmysql\utils\SQLBuilder;

class Update implements SQL {
	protected string $name;
	/** @var string[] */
	protected array $values = [];
	protected string $where = '';

	public function get() : string {
		$buf = new SQLBuilder('UPDATE');
		$buf->space()->append($this->name)
			->space()->append('SET');
		foreach ($this->values as $key => $val) {
			$buf->space()->append("`$key`='$val',");
		}
		$buf->delete(1)->space()
			->append('WHERE')->space()
			->append($this->where)->append(';');
		return $buf->buf();
	}

	public function name(string $name) : self {
		$this->name = $name;
		return $this;
	}

	public function values(array $values) : self {
		$this->values = $values;
		return $this;
	}

	public function where(string $where) : self {
		$this->where = $where;
		return $this;
	}
}