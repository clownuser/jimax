<?php

class m120222_194938_tbl_news extends CDbMigration
{
	public function up()
	{
            //$this->addColumn('tbl_news', 'plus', 'int(11)');
            //$this->addColumn('tbl_news', 'minus', 'int(11)');
           // $this->addColumn('tbl_news', 'minus', 'int(11)');
            //'plus'=>'int(11)',
	}

	public function down()
	{
		echo "m120222_194938_tbl_news does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}