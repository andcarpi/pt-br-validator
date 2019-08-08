# Laravel 5 - Validação em Português

Essa é uma biblioteca com algumas validações brasileiras.

## Instalação

1. Requisite o pacote utilizando o composer:

````
	composer require andcarpi/pt-br-validator
````

2. Adicione o service provider à variável `providers` no arquivo `config/app.php`:

> Do Laravel 5.5 em diante, há o Auto-Discovery dos Packages, então, caso você use uma versão a partir da 5.5, ignore este passo.

```php
andcarpi\PtBrValidator\ValidatorProvider::class,
```

## Utilização

Para utilizar a validação agora, basta fazer o procedimento padrão do `Laravel`.

A diferença é que agora, você terá os seguintes métodos de validação:

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

Então, podemos usar um simples teste:

```php
$validator = Validator::make(
	['telefone' => '(77)9999-3333'],
	['telefone' => 'required|telefone_com_ddd']
);

dd($validator->fails());

```
Já existe nessa biblioteca algumas mensagens padrão para as validações de cada um dos items citados acima. 

Para modificar isso, basta adicionar ao terceiro parâmetro de `Validator::make` um array, contendo o índice com o nome da validação e o valor com a mensagem desejada.

Exemplo:

```php
Validator::make($valor, $regras, ['celular_com_ddd' => 'O campo :attribute não é um celular'])
```

