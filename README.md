# Aplicação de teste Quadritech
Teste de nível técnico do Lenon Platenetti de Melo

# Objetivo
Aplicação de teste desenvolvida para a finalidade de medir o nível de conhecimento técnico do candidato Lenon Platenetti de Melo.
# Desenvolvimento
Para o desenvolvimento da aplicação foram utilizadas as seguintes tecnologias web.
* PHP versão 7.4.16;
* Framework Laravel versão 8.41.0;
* Acesso as APIs via biblioteca GuzzleHttp;
* Framework de estilo CSS Bootstrap versão 4.4.1;
* Estrutura visual com o plugin AdminLTE versão 3.0.5;
* Interação de tela utilizando Javascript com a biblioteca jQuery versão 3.4.1;
* Foram utilizadas as seguintes APIs para listar e mostrar valores.
  * Lista de Pokémons: http://pokeapi.co/api/v2/pokemon/
  * Visualização de cada Pokémon: http://pokeapi.co/api/v2/pokemon/:idDoPokemon/
* Composer versão 2.0.12.
# Ambientes Desenvolvimento – Produção
Pode ser utilizado repositórios e versionamentos no GitHub com a aplicação Jekins para realização de deploys entre os ambientes da seguinte maneira:
* <b>Ambiente de desenvolvimento:</b> Computador local de cada desenvolvedor e um ambiente de dev para os desenvolvedores testarem, o mesmo será uma réplica do ambiente de produção.
* <b>Ambiente de Homologação:</b> Réplica do ambiente de produção, após os desenvolvedores finalizarem 100% os desenvolvimentos e correções de erros, pode ser feito o deploy para o ambiente de homologação e gerar uma nova versão para os próximos desenvolvimentos e correções.
* <b>Ambiente de produção:</b>  Após realizar todos os testes necessários e confirmar 100% que está tudo correto, realizar o deploy para o ambiente de produção, assim será liberado para o cliente.
# Rodar a aplicação
Para rodar a aplicação o ambiente/máquina deverá ter instalado as seguintes aplicações:
* PHP 7.2.x instalado e configurado nas variáveis de ambiente do sistema.
<br><b>OBS:</b> Pode ser instalado através de aplicações com ambientes prontos como Xampp ou Wampp.
* Composer: Para rodar o servidor Artisan.
Deverá seguir os seguintes passos:
* Sincronizar o repositório git do projeto em qualquer pasta;
* Acessar via terminal a pasta \quadritech existente no projeto e rodar o servidor artisan dentro dessa pasta pelo comando:

    <code>php artisan serve</code>
    
* Acessar no navegador o endereço local do servidor mostrado no terminal.

  <code> http://127.0.0.1:8000/ </code>

