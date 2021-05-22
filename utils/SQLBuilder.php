<?php


namespace libmysql\utils;


class SQLBuilder extends StringBuilder {
	public function enter() : self {
		$this->buf .= PHP_EOL;
		return $this;
	}

	public function tab() : self {
		$this->buf .= ' ';
		return $this;
	}

	public function space() : self {
		$this->buf .= ' ';
		return $this;
	}
}