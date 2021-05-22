<?php


namespace libmysql\utils;


class StringBuilder {
	protected string $buf;

	public function __construct(string $initial = '') {
		$this->buf = $initial;
	}

	public function append(string $val) : self {
		$this->buf .= $val;
		return $this;
	}

	public function setBuf(string $buf) : void {
		$this->buf = $buf;
	}

	public function buf() : string {
		return $this->buf;
	}

	public function delete(int $len) : self {
		$this->buf = substr($this->buf, 0, strlen($this->buf) - $len);
		return $this;
	}
}