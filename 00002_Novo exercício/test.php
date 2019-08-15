public function testUp(): void {
		$mig = new AddStudioToMovies();
	  
		$mig->up();
		
		$this->assertTrue(isset(Schema::$tableAlter), "Você chamou o método Schema::table dentro da função up?");
		
		$this->assertTrue(is_string(Schema::$tableAlter), "O método Schema::table deveria receber uma string como primeiro parâmetro");
		
		$this->assertTrue(Schema::$tableAlter === "filmes", "A tabela a modificar no método up deveria se chamar 'filmes'. No entanto, foi passado '" . Schema::$tableAlter . "' como nome da tabela");
		
		$this->assertTrue(Schema::$funcAlter instanceof Closure, "O segundo parâmeto recebido pelo método Schema::table deve ser uma função anônima");
		
		$reflection = new ReflectionFunction(Schema::$funcAlter);
		$arguments  = $reflection->getParameters();
	  
		$this->assertTrue(count($arguments) == 1, "A função anônima deve receber um parâmetro");
		
		$this->assertTrue($arguments[0]->getType() && $arguments[0]->getType()->getName() == "Blueprint", "A função anônima deve recever um parâmetro do tipo Blueprint");
		
		$bp = new BluePrint();
		$func = Schema::$funcAlter;
		$func($bp);
		
		$this->assertTrue(!is_null($bp->unsigned), "Você modificou o blueprint com o método unsignedInteger?");
		
		$this->assertTrue(is_string($bp->unsigned) && $bp->unsigned == "estudio_id", "O método unsignedInteger deveria receber a string 'estudio_id'");
		
		$this->assertTrue(!is_null($bp->foreign), "Você modificou o blueprint com o método foreign?");
		
		$this->assertTrue(is_string($bp->foreign) && $bp->foreign == "estudio_id", "O método foreign deveria receber como parâmetro a string 'estudio_id'");
		
		$this->assertTrue(!is_null($bp->references), "Você chamou o método `references` depois do método `foreign`?");
		
		$this->assertTrue(is_string($bp->references) && $bp->references == "id", "O método references deve receber a string 'id' como parâmetro");
		
		$this->assertTrue(!is_null($bp->on), "Você chamou o método `on` depois da chamada do `references`?");
		
		$this->assertTrue(is_string($bp->on) && $bp->on == "estudios", "O método `on` deveria receber a string 'estudios' como parâmetro");
	  }
	  
	  public function testDown(): void {
		$mig = new AddStudioToMovies();
		
		$mig->down();
		
		$this->assertTrue(isset(Schema::$tableAlter), "Você chamou o método Schema::table dentro da função down?");
		
		$this->assertTrue(is_string(Schema::$tableAlter), "O método Schema::table deve receber uma string como ŕimeiro parâmetro.");
		
		$this->assertTrue(Schema::$tableAlter === "movies", "A tabela a modificar com o método `down` deveria se chamar 'filmes'. No entando, está se chamando '" . Schema::$tableAlter . "'");
		
		$this->assertTrue(Schema::$funcAlter instanceof Closure, "O segundo parâmetro recebido por Schema::table deve ser uma função anônima.");
		
		$reflection = new ReflectionFunction(Schema::$funcAlter);
		$arguments  = $reflection->getParameters();
	  
		$this->assertTrue(count($arguments) == 1, "A função anônima deve receber um parâmetro.");
		
		$this->assertTrue($arguments[0]->getType() && $arguments[0]->getType()->getName() == "Blueprint", "A função anônima deve receber um parâmetro do tipo Blueprint");
		
		$bp = new BluePrint();
		$func = Schema::$funcAlter;
		$func($bp);
		
		$this->assertTrue(!is_null($bp->dropForeign), "Você modificou o blueprint com o método dropForeign?");
		
		$this->assertTrue(is_string($bp->dropForeign) && $bp->dropForeign == "filmes_estudio_id_foreign", "O método dropForeign deve receber a string 'filmes_estudio_id_foreign'");
	  }