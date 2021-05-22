<?php


namespace libmysql;


use libmysql\utils\SQLBuilder;

class Delete implements SQL {
	protected string $name;
	protected string $where = '';

	public function get() : string {
		$buf = new SQLBuilder('DELETE FROM');
		$buf->space()->append($this->name)
			->space()->append('WHERE')
			->space()->append($this->where)->append(';');
		return $buf->buf();
	}

	public function name(string $name) : self {
		$this->name = $name;
		return $this;
	}

	public function where(string $where) : self {
		$this->where = $where;
		return $this;
	}
}