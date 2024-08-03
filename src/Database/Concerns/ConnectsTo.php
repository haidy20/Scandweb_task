<?php

namespace Src\Database\Concerns;

use Src\Database\Managers\Contract\DatabaseManager;

class ConnectsTo
{
	public static function connect(DatabaseManager $manager)
	{
		return $manager->connect();
	}
}