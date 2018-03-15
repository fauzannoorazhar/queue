<?php

namespace app\migrations;

use yii\db\Migration;

class BaseMigration extends Migration
{
	
	public function tableOptions()
	{
		return 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
	}
}