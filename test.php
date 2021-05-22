<?php

use libmysql\Delete;
use libmysql\Insert;
use libmysql\Select;
use libmysql\Table;
use libmysql\types\impl\VarChar;
use libmysql\types\impl\VarInt;
use libmysql\Update;


require 'utils/StringBuilder.php';
require 'utils/SQLBuilder.php';

require 'types/Type.php';
require 'types/BaseType.php';
require 'types/Numeric.php';
require 'types/VarType.php';
require 'types/impl/VarInt.php';
require 'types/impl/VarChar.php';

require 'SQL.php';
require 'Table.php';
require 'Insert.php';
require 'Update.php';
require 'Select.php';
require 'Delete.php';

{
	$chr = new VarChar();
	$chr->len(16);
	$int = new VarInt();
	$int->unsigned();
	$table = new Table();
	$table->name('joke')
		->column('name', $chr)
		->column('kill', $int)
		->column('death', $int)
		->primary('name')
		->notExists(true);
	echo $table->get(), "\n";
}
{
	$insert = new Insert();
	$insert->name('joke')
		->set(['name' => 'idiot', 'kill' => 1, 'death' => 2]);
	echo $insert->get(), "\n";
}
{
	$update = new Update();
	$update->name('joke')
		->values(['name' => 'idiot', 'kill' => 1, 'death' => 2])
		->where("`name`='ID'");
	echo $update->get(), "\n";
}
{
	$select = new Select();
	$select->name('joke')
		->selectAll()
		->where("`name`='test'");
	echo $select->get(), "\n";
}
{
	$select = new Select();
	$select->name('joke')
		->select('kill')
		->select('death')
		->where("`name`='test'");
	echo $select->get(), "\n";
}
{
	$delete = new Delete();
	$delete->name('joke')->where("`name`='id'");
	echo $delete->get(), "\n";
}