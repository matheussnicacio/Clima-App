# 🌤️ Clima Brasil - Aplicação Web de Consulta Climática

Uma aplicação web simples e moderna desenvolvida em Laravel para consultar informações climáticas de cidades brasileiras em tempo real, utilizando a API do OpenWeatherMap.

## 📋 Sumário

- Sobre o Projeto
- [Tecnologias Utilizadas](#tecnologias-utilizadas)
- [Funcionalidades](#funcionalidades)
- [Pré-requisitos](#pré-requisitos)
- [Instalação e Configuração](#instalação-e-configuração)
- [Como Executar](#como-executar)
- [Estrutura do Projeto](#estrutura-do-projeto)
- [Como Usar](#como-usar)
- [Resolução de Problemas](#resolução-de-problemas)
- [Arquitetura da Solução](#arquitetura-da-solução)

## 🎯 Sobre o Projeto 

O **Clima Brasil** é uma aplicação web que permite aos usuários consultar informações meteorológicas atuais de qualquer cidade brasileira. A aplicação consome dados da API gratuita do OpenWeatherMap e apresenta as informações de forma clara e intuitiva através de uma interface moderna e responsiva.

### Por que foi desenvolvido?

Este projeto foi criado como um exercício prático de desenvolvimento web, demonstrando:
- Consumo de APIs externas
- Desenvolvimento de interfaces responsivas
- Implementação do padrão MVC
- Tratamento de erros e validação de dados
- Boas práticas de desenvolvimento em PHP/Laravel

## 🚀 Tecnologias Utilizadas

### Backend
- **PHP 8.0.23** - Linguagem de programação
- **Laravel 9.x** - Framework PHP para desenvolvimento web
- **Composer** - Gerenciador de dependências do PHP

### Frontend
- **HTML5** - Estrutura das páginas
- **CSS3** - Estilização customizada
- **Bootstrap 5** - Framework CSS responsivo
- **Font Awesome 6** - Biblioteca de ícones
- **Blade Templates** - Sistema de templates do Laravel

### API Externa
- **OpenWeatherMap API** - Fonte dos dados meteorológicos

### Servidor
- **XAMPP** - Ambiente de desenvolvimento local
- **Apache** - Servidor web
- **MySQL** - Banco de dados (não utilizado neste projeto)

## ✨ Funcionalidades

- 🔍 **Busca por cidade brasileira** - Digite apenas o nome da cidade
- 🌡️ **Temperatura atual e sensação térmica** - Dados em Celsius
- 💧 **Informações detalhadas** - Umidade, pressão atmosférica e velocidade do vento
- 🎨 **Interface moderna e responsiva** - Funciona em desktop e mobile
- ⚠️ **Tratamento de erros** - Mensagens claras para o usuário
- 🔄 **Dados em tempo real** - Informações sempre atualizadas
- 🇧🇷 **Focado no Brasil** - Otimizado para cidades brasileiras

## 📋 Pré-requisitos

Antes de começar, certifique-se de ter instalado:

### Obrigatórios
- **PHP 8.0+** - [Download PHP](https://www.php.net/downloads)
- **Composer** - [Download Composer](https://getcomposer.org/download/)
- **XAMPP** (ou outro servidor local) - [Download XAMPP](https://www.apachefriends.org/)

### Verificação
```bash
# Verificar versão do PHP
php --version

# Verificar se o Composer está instalado
composer --version

# Verificar se o cURL está habilitado
php -m | grep curl
```

## 🛠️ Instalação e Configuração

### Passo 1: Clonar ou criar o projeto
```bash
# Opção 1: Criar novo projeto Laravel
composer create-project laravel/laravel clima-app

# Opção 2: Se já tem o código, navegue até a pasta
cd clima-app
```

### Passo 2: Instalar dependências
```bash
# Instalar dependências do Composer
composer install

# Se usar Node.js (opcional para este projeto)
npm install
```

### Passo 3: Configurar ambiente
```bash
# Copiar arquivo de ambiente (se necessário)
cp .env.example .env

# Gerar chave da aplicação
php artisan key:generate
```

### Passo 4: Configurar API Key
Abra o arquivo `.env` e adicione/modifique estas linhas:

```env
WEATHER_API_KEY=6692fda7961ed38dfc6af1450848f943
WEATHER_API_URL=http://api.openweathermap.org/data/2.5/weather
```

### Passo 5: Estrutura de arquivos necessários

Certifique-se de que estes arquivos existem com o conteúdo correto:

```
clima-app/
├── app/Http/Controllers/WeatherController.php
├── resources/views/weather/
│   ├── index.blade.php
│   └── result.blade.php
├── routes/web.php
└── .env
```

### Passo 6: Limpar cache
```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
```

## ▶️ Como Executar

### 1. Iniciar o servidor
```bash
# Na pasta raiz do projeto
php artisan serve
```

### 2. Acessar a aplicação
Abra seu navegador e acesse:
- **URL principal**: http://localhost:8000
- **URL alternativa**: http://127.0.0.1:8000

### 3. Parar o servidor
No terminal onde o servidor está rodando, pressione `Ctrl + C`

## 📁 Estrutura do Projeto

```
clima-app/
├── app/
│   └── Http/
│       └── Controllers/
│           └── WeatherController.php      # Lógica de negócio
├── resources/
│   └── views/
│       └── weather/
│           ├── index.blade.php            # Página inicial
│           └── result.blade.php           # Página de resultados
├── routes/
│   └── web.php                            # Definição das rotas
├── .env                                   # Configurações do ambiente
├── composer.json                          # Dependências do projeto
└── README.md                              # Esta documentação
```

## 🎮 Como Usar

### 1. Acessar a aplicação
- Abra http://localhost:8000 no seu navegador

### 2. Consultar clima
- Digite o nome de uma cidade brasileira (ex: "Joinville", "São Paulo", "Rio de Janeiro")
- Clique em "Consultar Clima"
- Visualize as informações meteorológicas

### 3. Nova consulta
- Na página de resultados, clique em "Consultar Outra Cidade" para voltar

### Exemplos de cidades para testar:
- Joinville
- São Paulo
- Rio de Janeiro
- Florianópolis
- Curitiba
- Porto Alegre

## 🔧 Resolução de Problemas

### Erro: "The GET method is not supported"
**Solução**: Certifique-se de acessar http://localhost:8000 (não /weather)

### Erro: "Chave da API não configurada"
**Solução**: 
1. Verifique se o arquivo `.env` contém a linha `WEATHER_API_KEY=...`
2. Execute `php artisan config:clear`

### Erro: "cURL error 5: Unsupported proxy syntax"
**Solução**: O projeto já inclui tratamento para este erro. Se persistir:
1. Verifique configurações de proxy no `php.ini`
2. Desative temporariamente antivírus/firewall

### Erro: "Cidade não encontrada"
**Solução**: 
- Digite apenas o nome da cidade (sem estado)
- Tente variações do nome (ex: "Sao Paulo" ao invés de "São Paulo")

### Servidor não inicia
**Solução**:
```bash
# Verificar se a porta 8000 está ocupada
netstat -an | grep 8000

# Usar porta alternativa
php artisan serve --port=8080
```

## 🏗️ Arquitetura da Solução

### Padrão MVC Implementado

#### Model (Dados)
- Não utilizamos banco de dados local
- Dados vêm diretamente da API OpenWeatherMap
- Validação de entrada no Controller

#### View (Interface)
- **index.blade.php**: Formulário de consulta
- **result.blade.php**: Exibição dos resultados
- Design responsivo com Bootstrap 5
- Ícones do Font Awesome para melhor UX

#### Controller (Lógica)
- **WeatherController**: Gerencia toda a lógica de negócio
  - `index()`: Exibe formulário inicial
  - `getWeather()`: Processa consulta e chama API

### Fluxo de Funcionamento

1. **Usuário acessa** → Rota `/` → `WeatherController@index` → `index.blade.php`
2. **Usuário submete formulário** → POST para `/weather` → `WeatherController@getWeather`
3. **Controller valida dados** → Faz requisição HTTP para API
4. **API retorna dados** → Controller processa → Redireciona para `result.blade.php`
5. **Erro na API** → Controller trata erro → Retorna com mensagem

### Tratamento de Erros Implementado

- **Validação de entrada**: Campo obrigatório
- **Erro de API**: Códigos HTTP específicos (401, 404, 500)
- **Erro de conexão**: Timeout e problemas de rede
- **Dados inválidos**: Verificação da estrutura JSON
- **Configuração**: Verificação de API key

### Segurança

- **Validação de entrada**: Sanitização automática do Laravel
- **API Key**: Armazenada em variável de ambiente
- **Rate Limiting**: Controlado pela própria API
- **XSS Protection**: Blade templates com escape automático

## 📊 Resumo Técnico

### Como foi construído:

1. **Planejamento**: Definição das funcionalidades e interface
2. **Setup**: Criação do projeto Laravel e configuração do ambiente
3. **Backend**: Desenvolvimento do controller para consumir API
4. **Frontend**: Criação de views responsivas com Bootstrap
5. **Integração**: Conexão entre frontend e backend
6. **Testes**: Validação com diferentes cidades e cenários de erro
7. **Documentação**: Criação desta documentação completa

### Decisões técnicas:

- **Laravel**: Framework robusto e bem documentado
- **Bootstrap**: Desenvolvimento rápido de interface responsiva
- **OpenWeatherMap**: API gratuita e confiável
- **file_get_contents**: Alternativa ao cURL para resolver problemas de proxy
- **Blade**: Sistema de templates nativo do Laravel

### Tempo de desenvolvimento:
- **Planejamento**: 30 minutos
- **Desenvolvimento**: 2-3 horas
- **Testes e correções**: 1 hora
- **Documentação**: 1 hora
- **Total**: ~5 horas

## 👨‍💻 Desenvolvedor

Desenvolvido como exercício teste técnico de Engenharia de Software.


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
