# Teste_Back_end_php

<img src="public/img/Swagger.png" alt="exemplo imagem">

>Desenvolver uma API RESTful utilizando Laravel ou Lumen.

### Cenário

Em nossa auto peças surgiu a demanda que nossos gerentes pudessem separar nossos clientes em grupos distintos. Nossos gerentes têm dois níveis.

### Requisitos
- [x] Um cliente deve pertencer a apenas um grupo;
- [x] Gerentes precisam estar autenticados;
- [x] Gerentes de nível um pode apenas visualizar grupos, adicionar/remover clientes;
- [x] Gerentes de nível dois são os únicos que podem criar, editar e excluir grupos;
- [x] Não fazer "fork" do repositório;
- [x] Ao finalizar, criar um repositório no github e mandar o link para o email dep.web@drugovich.com.br

### Modelos
- [x] Clientes: Código Único, CNPJ, Nome, Data Fundação;
- [x] Gerentes: Código Único, Nome, E-mail, Nível;
- [x] Grupos: Código Único, Nome;
- [x] Clientes e Gerentes podem ser populados automaticamente.
Objetivo
- [x] Queremos endpoints para operar os grupos e visualizar os clientes de um grupo.

### Ajustes e melhorias

O projeto ainda está em desenvolvimento e as próximas atualizações serão voltadas nas seguintes tarefas:

- [x] implementar todo os requisitos solicitados
- [x] documentar API
- [x] Refatorar o código 
- [ ] Dockerizar o projeto 
- [ ] implementar auteticação SSO com KeyClock[melhoria]
- [ ] realizar deploy para a AWS e diponibilizar um IP público para realização de testes

## 💻 Pré-requisitos

Antes de começar, verifique se você atendeu aos seguintes requisitos:

* Você instalou  a versão PHP 8 
* Composer: O Composer é um gerenciador de pacotes PHP que é usado para instalar e gerenciar as dependências do Laravel.

* Servidor Web: Você precisará de um servidor web para executar seu aplicativo Laravel
* Banco de Dados: Mysql 8.0

* Extensões PHP: Certifique-se de que as extensões PHP necessárias estejam habilitadas no seu servidor. O Laravel pode precisar de extensões como PDO, OpenSSL, Mbstring, Tokenizer, XML, Ctype e JSON.
## 🚀 Instalando teste_back_end_php

Para instalar o teste_back_end_php, siga estas etapas:

```
git clone https://github.com/peacevan/teste-back-end-php-4
cd teste-back-end-php-4
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
http://localhost:8000
```

## ☕ Usando teste_back_end_php

Para usar teste_back_end_php, siga estas etapas:

O servidor estará disponível em:
```
http://localhost:8000
```
A documentação da API está em:

```
http://localhost:8000/api-documentation#
```
através do link  da documentação pode ser realizado os testes.

[⬆ Voltar ao topo](#Teste_Back_end_PHP)<br>
