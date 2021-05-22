<?php


namespace libmysql;


use libmysql\utils\SQLBuilder;

class Select implements SQL {
	protected string $name;
	protected array $filter = [];
	protected string $where;

	public function selectAll() : self {
		$this->filter = ['*'];
		return $this;
	}

	public function select(string $val) : self {
		$this->filter[] = $val;
		return $this;
	}

	public function name(string $val) : self {
		$this->name = $val;
		return $this;
	}

	/** @noinspection SqlNoDataSourceInspection */
	public function get() : string {
		$ret = new SQLBuilder(/** @lang text */
			'SELECT');
		$ret->space();
		if (is_array($this->filter)) {
			$ret->append(implode(',', array_map(static function (string $val) : string {
				if ($val !== '*') {
					return "`$val`";
				}
				return $val;
			}, $this->filter)));
		}
		$ret->space()->append('FROM')
			->space()->append($this->name)
			->space()->append('WHERE')
			->space()->append($this->where)
			->append(';');
		return $ret->buf();
	}

	public function where(string $where) : self {
		$this->where = $where;
		return $this;
	}
}