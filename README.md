Passo a Passo para Instalar o Projeto Usando XAMPP
1. Baixar e Instalar o XAMPP
Faça o download do XAMPP em https://www.apachefriends.org/index.html.
Siga as instruções para instalação de acordo com seu sistema operacional (Windows, Linux ou macOS).
2. Configurar o Banco de Dados MySQL no XAMPP
Abra o painel de controle do XAMPP e inicie os serviços Apache e MySQL.
Clique em Admin ao lado de MySQL para abrir o phpMyAdmin no navegador.
No phpMyAdmin, crie o banco de dados do projeto:
Vá até a aba Banco de Dados.
Crie um novo banco de dados chamado desafio.
Após a criação, clique no nome do banco de dados desafio para começar a adicionar as tabelas.
3. Criar as Tabelas no Banco de Dados
Dentro do phpMyAdmin, vá até a guia SQL e cole o script de criação das tabelas que está na raiz do projeto. 


Execute o script para criar as tabelas necessárias (associados, anuidades, cobrancas).

4. Configurar a Conexão com o Banco de Dados
Abra o arquivo de configuração config/connection.php no seu editor de código e insira os detalhes de conexão com o banco de dados MySQL:

php
Copy code
<?php
$host = 'localhost';
$dbname = 'desafio';  // Nome do banco de dados que você criou
$username = 'root';   // Usuário padrão do XAMPP
$password = '';       // Senha em branco, pois o XAMPP usa um banco sem senha

try {
    // Conecta ao banco de dados MySQL usando PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Configura o PDO para lançar exceções
} catch (PDOException $e) {
    // Exibe a mensagem de erro se a conexão falhar
    echo "Erro de conexão: " . $e->getMessage();
}
?>
5. Colocar o Projeto no Diretório do XAMPP
Após clonar o projeto para sua máquina local, mova o diretório do projeto para a pasta htdocs do XAMPP (geralmente localizada em C:\xampp\htdocs no Windows).
O caminho do seu projeto deverá ser algo como C:\xampp\htdocs\seu-projeto.
6. Iniciar o Servidor PHP Local
Abra o terminal ou o prompt de comando no diretório raiz do seu projeto.

Execute o servidor PHP usando o comando abaixo para rodar o sistema localmente:

bash
Copy code
php -S localhost:8000
Isso iniciará o servidor PHP na URL http://localhost:8000.

7. Testar o Sistema
Agora você pode abrir o navegador e acessar o sistema em http://localhost:8000. O sistema deverá funcionar, e você poderá:

Cadastrar associados.
Cadastrar anuidades.
Gerenciar cobranças.
Verificar o status de pagamento das anuidades.
8. Gerenciar as Anuidades
Cadastro de Associados: Adicione associados com seus dados de filiação.
Cadastro de Anuidades: Adicione anuidades para cada ano com os valores a serem cobrados.
Cobranças: As cobranças serão geradas automaticamente baseadas nas anuidades devidas, e você poderá marcar como pagas.
Conclusão
Este é o processo básico para instalar e rodar o projeto localmente usando o XAMPP como banco de dados. Após seguir esses passos, seu sistema estará pronto para ser utilizado e testado localmente. Se você encontrar algum problema durante o processo, verifique se as configurações de banco de dados e conexão estão corretas.
