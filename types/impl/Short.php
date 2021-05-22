<?php


namespace libmysql\types\impl;


use libmysql\types\Numeric;

class Short extends Numeric {
	protected const type = 'SMALLINT';
}