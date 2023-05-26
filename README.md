# catalog-server 
Este projeto é uma API rest que servirá como back-end para a aplicação Catalog, desenvolvida em Laravel e utilizando a linguagem PHP e banco de dados Mysql.

### Catalog

Visando uma melhor experiencia para os clientes, e donos de loja, o catalog permite que as pessoas tenham mais comorbidade ao visualizar e comprar preços de produtos, de um determinado estabelecimento, sendo um mesmo uma vitrine em suas mãos para pesquisar, produtos, preços, e criar cadastro na loja. Este projeto será desenvolvido por meio da criação de um aplicativo em Flutter e uma API em Laravel como back-end. É uma parceria entre as disciplinas Programação para Dispositivos Móveis e Laboratório de Programação Avançada dos professores Marcos David e Alex Rogaleski.

## Objetivos
- [x] 1. Criação do repositório - 24/02
- [x] 2. Criação do projeto - 24/02
- [x] 3. Criação do modelo de dados ER - 24/03
- [x] 4. Criação da aplicação e upload para o repositório - 24/03
- [x] 5. Criação das classes, controllers e endpoints - 31/03
- [x] 6. Conclusão da API - 05/05
- [ ] 7. Criação da documentação - 26/05
- [ ] 8. Entreda da API + APP - 19/06

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>  

## Por que Laravel  

Há uma variedade de ferramentas e estruturas disponíveis para você ao criar um aplicativo da web. No entanto, acreditamos que o Laravel é a melhor escolha para criar aplicativos da Web modernos e completos, por possuir:  

- Uma Estrutura Progressiva. 
- Uma Estrutura Escalável. 
- Um Quadro Comunitário.

## Primeiro projeto Laravel 

Antes de criar seu primeiro projeto Laravel, você deve garantir que sua máquina local tenha o PHP e o Composer instalados.
Depois de instalar o PHP e o Composer, você pode criar um novo projeto Laravel através do create-projectcomando Composer: 

```bash
composer create-project laravel/laravel example-app
```
Ou você pode criar novos projetos Laravel instalando globalmente o instalador do Laravel via Composer: 

```bash
composer global require laravel/installer
 
laravel new example-app
``` 
## Aprendendo Laravel

O Laravel tem a mais extensa e completa [documentação](https://laravel.com/docs) e uma biblioteca de tutoriais em vídeo de todos os frameworks modernos de aplicações web, tornando fácil começar a usar o framework.

Se você não quiser ler, [Laracasts](https://laracasts.com) pode ajudar. Laracasts contém mais de 1500 tutoriais em vídeo sobre uma variedade de tópicos, incluindo Laravel, PHP moderno, teste de unidade e JavaScript. Aumente suas habilidades explorando nossa abrangente biblioteca de vídeos. 

## Criação das Classes 

Para cada entidade presente no modelo de banco de dados foi criadado: 

- Model (app/Models)
- Migration (database/migrations)
- Controller (app/Http/Controllers)
- Resource (app/Http/Resources)
- Request (app/Http/Requests)
- Rotas (routes/api.php) 

Utilizando os seguintes comandos 

- Criar Model e Migration:  
 ```bash
php artisan make:model NomeDoModel -m
```
- Criar Controller:  
 ```bash
php artisan make:controller NomeDoModelController -r --api
```
- Criar Resource:  
 ```bash
php artisan make:resource NomeDoModelResource
```
- Criar Request:  
```bash
php artisan make:request NomeDoModelRequest
``` 
## Autenticação 

Autenticar usuários é tão simples quanto adicionar um middleware de autenticação à sua definição de rota do Laravel: 

```bash
Route::get('/profile', ProfileController::class)
    ->middleware('auth');
```  

Depois que o usuário é autenticado, você pode acessar o usuário autenticado por meio da Authfachada: 

```bash
use Illuminate\Support\Facades\Auth;
 
// Get the currently authenticated user...
$user = Auth::user();
```  
Claro, você pode definir seu próprio middleware de autenticação, permitindo personalizar o processo de autenticação.

Para mais informações sobre os recursos de autenticação do Laravel, confira a documentação de autenticação(https://laravel.com/docs).



