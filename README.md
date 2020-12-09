# Activity History (PHP Package)

Esta lib tem como objetivo integrar os sistemas com o serviço Activity History de uma forma mais simples e eficaz. Com algumas linhas de código, já será possível enviar logs de aplicação.

## Instalação (via composer)

Primeiro, vamos adicionar a dependência e o repositório do pacote no nosso arquivo composer.json:


```json
{
    "require": {
        "eduzz/activity-history-php": "~1.0"
    },
    "repositories": [
        {
            "type": "vcs",
            "url":  "git@github.com:eduzz/activity-history-php.git"
        }
    ]
}
```

Após configurado o composer, utilize o comando abaixo para instalar os pacotes do projeto.

```sh
    composer install
```

## Projetos Laravel

Após realizado os passos anteriores, é necessário realizar o seguinte comando no terminal, que gerará o arquivo **config/activityhistory.php**.

```sh
    php artisan vendor:publish --tag="config"
```

No arquivo **config/app.php**

```php
// ...
'providers' => [
    // ...
    Eduzz\ActivityHistory\ActivityHistoryServiceProvider::class,
],
```

## Projetos Lumen

No Lumen o arquivo config deve ser copiado manualmente. Após a instalação dos pacotes do composer, crie uma pasta **config** na raíz do projeto, e copie o arquivo **vendor/eduzz/activity-history-php/src/config/activityhistory.php** para o diretório criado.

No arquivo **bootstrap/app.php**

```php
// ...
$app->configure('activityhistory');
// ...
$app->register(Eduzz\ActivityHistory\ActivityHistoryServiceProvider::class);
// ...
```
##

## Configurando o Activity History

No arquivo **config/activityhistory.php**, tem duas configurações iniciais a se fazer:

* **ApplicationKey** => é o hash da aplicação que usará o Activity History. Necessário entrar em contato com a equipe para adquirir esta chave.
* **BaseUrl** => Endpoint do Activity History fornecido pela equipe. 

## Usando o Activity History

Para realizar o envio de logs, basta injetar o Activity History em sua classe e setar os dados conforme abaixo:

```php
    $this->activityHistory->setUser(
        'application_user_id'
    );

    $this->activityHistory->setUrl('https://example.com');

    $oldData = [
        'name' => 'old name',
        'email' => 'example@example.com'
    ];
    $beforeData = [
        'name' => 'new name',
        'email' => 'example@example.com'
    ];

    $excerpt = [
        'name' => 'new name'
    ];

    $this->activityHistory->publish(
        new ProductUpdate(
            $excerpt,
            $oldData,
            $beforeData
        )
    );
```
