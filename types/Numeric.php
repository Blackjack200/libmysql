<?php


namespace libmysql\types;


use libmysql\utils\StringBuilder;

class Numeric extends BaseType {
	protected bool $signed = true;

	public function unsigned() : self {
		$this->signed = false;
		return $this;
	}

	public function toString() : string {
		$buf = new StringBuilder();
		$buf->append($this::type);
		if (!$this->signed) {
			$buf->append(' UNSIGNED');
		}
		if ($this->notNULL) {
			$buf->append(' NOT NULL');
		}
		return $buf->buf();
	}
}