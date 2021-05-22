<?php


namespace libmysql\types\impl;


use libmysql\types\Numeric;

class Long extends Numeric {
	protected const type = 'BIGINT';
}