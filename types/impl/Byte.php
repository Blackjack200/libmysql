<?php


namespace libmysql\types\impl;


use libmysql\types\Numeric;

class Byte extends Numeric {
	protected const type = 'TINYINY';
}