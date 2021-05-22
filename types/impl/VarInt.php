<?php


namespace libmysql\types\impl;


use libmysql\types\Numeric;

class VarInt extends Numeric {
	protected const type = 'INT';
}