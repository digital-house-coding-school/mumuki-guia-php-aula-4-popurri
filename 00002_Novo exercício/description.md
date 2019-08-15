Agora que criamos a tabela de estudio, vamos relacioná-la à tabela de filmes.

Ou seja, a tabela **filmes** deve ter uma chave estrangeira para a tabela **estudios** para indicar essa proporção de 1 para muitos.

Neste caso nós já lhe damos parte da migration montada (**note que o método `Schema::table` é usado para modificar uma tabela**) e é seu trabalho completar as funções anônimas com as seguintes especificações:

> **A.** A função `up` deve criar primeiro a coluna que será a chave estrangeira. Para isto você deve usar o método da classe ``Blueprint`` (isto é, a variável `$table`) chamada` unsignedInteger` que receberá o nome da coluna. Neste caso, vamos chamá-lo **estudio_id**

> **B.** A função `up` também deve criar a relação entre as tabelas usando o seguinte método:

``` php
$table->foreign('FK')->references('PK')->on('TABELA');
```

> onde o FK deve indicar o nome da chave estrangeira (studio_id), PK o nome da chave primária na tabela a ser relacionada (id) e TABELA o nome da tabela a ser relacionada (estúdios)

> **C.** A função `down` deve remover a chave estrangeira e sua coluna. O Laravel resolve isso por um único método da classe `Blueprint` (isto é, a variável` $table`) chamada `dropForeign`. Este método recebe uma string com a convenção TABELA_COLUNA_foreign. Nesse caso, você deve enviar **filmes_estudio_id_foreign**
