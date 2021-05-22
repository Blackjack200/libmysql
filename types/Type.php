<?php


namespace libmysql\types;


interface Type {
	public function acceptNULL() : self;

	public function toString() : string;
}