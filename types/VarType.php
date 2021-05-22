<?php


namespace libmysql\types;


use libmysql\utils\StringBuilder;

class VarType extends BaseType {
	protected int $len;

	public function toString() : string {
		$buf = new StringBuilder();
		$buf->append($this::type)
			->append("($this->len)");
		if ($this->notNULL) {
			$buf->append(' NOT NULL');
		}
		return $buf->buf();
	}

	public function len(int $val) : self {
		$this->len = $val;
		return $this;
	}
}