<?php


namespace libmysql;


use libmysql\utils\SQLBuilder;

class Insert implements SQL {
	protected string $name;
	protected bool $ignore = false;
	/** @var string[] */
	protected array $values = [], $keys = [];

	public function ignore() : self {
		$this->ignore = true;
		return $this;
	}

	public function get() : string {
		$buf = new SQLBuilder('INSERT');
		if ($this->ignore) {
			$buf->space()->append('IGNORE');
		}
		$buf->space()->append('INTO')
			->space()->append($this->name);
		if (count($this->keys) > 0) {
			$buf->space()->append('(')
				->append(implode(',',
					array_map(static function ($val) : string {
						return "`$val`";
					}, $this->keys)))
				->append(')');
		}
		$buf->space()->append('VALUES')
			->space()->append('(')
			->append(implode(',',
				array_map(static function ($val) : string {
					return "'$val'";
				}, $this->values)))
			->append(');');
		return $buf->buf();
	}

	public function name(string $name) : self {
		$this->name = $name;
		return $this;
	}

	public function set(array $val) : self {
		$this->keys(array_keys($val))->values(array_values($val));
		return $this;
	}

	public function values(array $values) : self {
		$this->values = $values;
		return $this;
	}

	public function keys(array $keys) : self {
		$this->keys = $keys;
		return $this;
	}
}