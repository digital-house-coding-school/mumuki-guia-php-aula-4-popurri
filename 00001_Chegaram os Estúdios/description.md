Embora já conheçamos o sistema que gerencia Atores, Gêneros e Filmes administram, os estúdios cinematográficos ficaram com ciúmes e querem ter sua própria tabela no banco de dados.

Dado isso, pedimos que você conclua o arquivo de migração com as seguintes especificações:

> 1. O método `up` deve criar uma tabela chamada ** studios **. Para isso você deve usar o método `Schema :: create` que receberá 2 parâmetros. O primeiro parâmetro deve ser uma string especificando o nome da tabela a ser criada. O segundo parâmetro deve ser uma função anônima especificada abaixo.

> 2. A função anônima que recebe `Schema :: create` recebe um parâmetro do tipo` Blueprint` e internamente deve definir uma coluna ** id ** para a tabela usando o método `incrementements` e uma coluna chamada ** name * * usando o método `string`. Finalmente, as colunas ** created_at ** e ** updated_at ** devem ser atribuídas à tabela usando o método `timestamps`.

> 3. O método `down` deve apagar a tabela usando o método` Schema :: drop` que recebe o nome da tabela a ser deletada como parâmetro.

Na faixa abaixo, deixamos um exemplo incompleto da solução, caso você precise