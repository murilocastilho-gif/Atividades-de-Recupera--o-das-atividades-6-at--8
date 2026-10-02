# Sistema de Gestão de Brinquedos

Projeto desenvolvido como recuperação das atividades 6 até 8. Consiste num sistema web em PHP e MySQL para a gestão de brinquedos de uma loja. 

## Funcionalidades
O sistema implementa as quatro operações fundamentais de um CRUD:
- Cadastrar um novo brinquedo
- Listar os brinquedos cadastrados
- Editar os dados de um brinquedo
- Excluir um brinquedo

## Tecnologias e Requisitos
- PHP e MySQL
- Uso exclusivo de Prepared Statements (via MySQLi) em todas as operações na base de dados.
- Validação dos dados recebidos e organização dos ficheiros.

## Instruções de Execução
1. Importe o ficheiro `.sql` incluído neste repositório para o seu servidor MySQL para criar a base de dados e a tabela de brinquedos.
2. Copie todos os ficheiros PHP para o diretório raiz do seu servidor web local (ex: pasta `htdocs` se estiver a utilizar XAMPP).
3. Se necessário, edite as credenciais de acesso à base de dados no ficheiro `conexao.php`.
4. Abra o navegador e aceda ao caminho correspondente (ex: `http://localhost/sua-pasta/index.php`) para utilizar o sistema.