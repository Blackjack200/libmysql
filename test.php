<?php

use libmysql\Insert;
use libmysql\Table;
use libmysql\types\impl\VarChar;
use libmysql\types\impl\VarInt;
use libmysql\Update;

require 'SQL.php';
require 'Insert.php';
require 'Update.php';
require 'utils/StringBuilder.php';
require 'utils/SQLBuilder.php';
require 'Table.php';
require 'types/Type.php';
require 'types/BaseType.php';
require 'types/Numeric.php';
require 'types/VarType.php';
require 'types/impl/VarInt.php';
require 'types/impl/VarChar.php';

$chr = new VarChar();
$chr->len(16);
$i = new VarInt();
$i->unsigned();
$table = new Table();
$table->name('joke')
	->column('name', $chr)
	->column('kill', $i)
	->column('death', $i)
	->primary('name')
	->notExists(true);

echo $table->get(), "\n";

{
	$row = new Insert();
	$row->name('joke')
		->set(['name' => 'idiot', 'kill' => 1, 'death' => 2]);
	echo $row->get(), "\n";
}

{
	$row = new Update();
	$row->name('joke')
		->values(['name' => 'idiot', 'kill' => 1, 'death' => 2])
		->where("player_name='ID'");
	echo $row->get(), "\n";
}