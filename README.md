# Laravel API - Consulta de CEP

Este projeto é uma API RESTful desenvolvida em Laravel para consulta de endereços a partir de um CEP (Código de Endereçamento Postal).

## 🚀 Funcionalidades

- Consulta de endereço pelo CEP usando a API externa ViaCEP
- Retorno de dados em formato JSON
- Tratamento de erros e CEPs inválidos

## 🧑‍💻 Tecnologias utilizadas

- PHP 8+
- Laravel 11
- PHPUnit (para testes unitários)

## ⚙️ Como usar

### 1. Clone o repositório

```bash
git clone https://github.com/viniblack/laravel-api-cep.git
cd laravel-api-cep
```

### 2. Instale as dependências 
```bash
composer install
```

### 3. Configure o ambiente
Copie o arquivo `.env.example` para `.env` e edite as variáveis conforme necessário:
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Execute as migrações
```bash
php artisan migrate
```

### 5. Inicie o servidor
```bash
php artisan serve
```
A API estará disponível em: `http://localhost:8000`

## 📡 Exemplo de uso
### Consulta de CEP
`GET /api/cep/{cep}`

#### Exemplo:
```bash
curl http://localhost:8000/api/cep/01001000
```

#### Resposta:
```bash
{
  "cep": "06243-110",
  "logradouro": "Rua Rocha Pombo",
  "complemento": "",
  "unidade": "",
  "bairro": "Jardim Elvira",
  "localidade": "Osasco",
  "uf": "SP",
  "estado": "São Paulo",
  "regiao": "Sudeste",
  "ibge": "3534401",
  "gia": "4923",
  "ddd": "11",
  "siafi": "6789"
}

```

## 🧪 Testes
Para rodar os testes:
```bash
php artisan test
```
