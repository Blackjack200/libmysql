<?php


namespace libmysql\types;


use libmysql\utils\StringBuilder;

class BaseType implements Type {
	protected const type = '_';
	protected bool $notNULL = true;

	public function toString() : string {
		$buf = new StringBuilder();
		$buf->append($this::type);
		if ($this->notNULL) {
			$buf->append(' NOT NULL');
		}
		return $buf->buf();
	}

	public function acceptNULL() : self {
		$this->notNULL = false;
		return $this;
	}
}