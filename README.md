## Laravel 5 - Validações em Português

Esta é uma biblioteca com algumas validações brasileiras.

[![Build Status](https://travis-ci.org/andcarpi/pt-br-validator.svg?branch=master)](https://travis-ci.org/andcarpi/pt-br-validator)

### Instalação

1. Requisite o pacote utilizando o  composer:

    ```
    composer require andcarpi/pt-br-validator
    ```

2. Adicione o service provider à variável `providers` no arquivo `config/app.php`:

    > Do Laravel 5.5 em diante, há o Auto-Discovery dos Packages, então, caso você use uma versão a partir da 5.5, ignore este passo.

    ```php
    andcarpi\PtBrValidator\ValidatorProvider::class,
    ```

### Utilização

Agora, para utilizar a validação, basta fazer o procedimento padrão do `Laravel`.

A diferença é que será possível usar os seguintes métodos de validação:

* **`celular`** - Valida se o campo está no formato (**`99999-9999`** ou **`9999-9999`**)

*  **`celular_com_ddd`** - Valida se o campo está no formato (**`(99)99999-9999`** ou **`(99)9999-9999`** ou **`(99) 99999-9999`** ou **`(99) 9999-9999`**)

* **`cnpj`** - Valida se o campo é um CNPJ válido. É possível gerar um CNPJ válido para seus testes utilizando o site [geradorcnpj.com](http://www.geradorcnpj.com/)

* **`cpf`** - Valida se o campo é um CPF válido. É possível gerar um CPF válido para seus testes utilizando o site [geradordecpf.org](http://geradordecpf.org) 

* **`data`** - Valida se o campo é uma data no formato `DD/MM/YYYY`. Por exemplo: `31/12/1969`.

* **`formato_cnpj`** - Valida se o campo tem uma máscara de CNPJ correta (**`99.999.999/9999-99`**).

* **`formato_cpf`** - Valida se o campo tem uma máscara de CPF correta (**`999.999.999-99`**).

* **`formato_cep`** - Valida se o campo tem uma máscara de correta (**`99999-999`** ou **`99.999-999`**).

* **`telefone`** - Valida se o campo tem umas máscara de telefone (**`9999-9999`**).

* **`telefone_com_ddd`** - Valida se o campo tem umas máscara de telefone com DDD (**`(99)9999-9999`** ou **`(99) 9999-9999`**).

* **`formato_placa_de_veiculo_comum`** - Valida se o campo tem o formato válido de uma placa de veículo no formato antigo. (**` ABC-1D23`**)

* **`formato_placa_de_veiculo_mercosul`** - Valida se o campo tem o formato válido de uma placa de veículo no novo padrão do mercosul.  (**` ABC-1234`**)

* **`formato_placa_de_veiculo`** - Valida se o campo tem o formato válido de uma placa de veículo, podendo ser do formato antigo OU do Mercosul.

* **`renavam`** - Valida se o campo é um Renavam válido. É possível gerar um CNPJ válido para seus testes utilizando o site [http://gerador.info/renavam](http://gerador.info/renavam)

### Testando

Com isso, é possível fazer um teste simples


```php
$validator = Validator::make(
    ['telefone' => '(77)9999-3333'],
    ['telefone' => 'required|telefone_com_ddd']
);

dd($validator->fails());

```

### Customizando as mensagens

Todas as validações citadas acima já contam mensagens padrões de validação, porém, é possível alterar isto usando o terceiro parâmetro de `Validator::make`. Este parâmetro deve ser um array onde os índices sejam os nomes das validações e os valores devem ser as respectivas mensagens.

Por exemplo:


```php
Validator::make($valor, $regras, ['celular_com_ddd' => 'O campo :attribute não é um celular'])
```
