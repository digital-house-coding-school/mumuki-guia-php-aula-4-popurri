Vamos dar uma ajuda!

``` php
public function up()
{
    Schema::create('NOME_DA_TABELA', function (Blueprint $table) {
        $table->string('name');
        
        // Faltaria o id e os timestaps
    });
}
```