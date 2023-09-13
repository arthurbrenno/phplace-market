
![home](https://media.discordapp.net/attachments/815753127537410102/1150507267301589042/image.png?width=1162&height=651)

# Introdução
Este é um projeto de um sistema web para um supermercado fictício chamado PHPlace. Originalmente, um trabalho simples da Universidade de Uberaba, que se tornou um grande aprendizado, uma vez que os conceitos utilizados agregam bastante no conhecimento.

# Conceitos utilizados:
* Models
* Views
* Controllers
* Rotas
* Request
* Response
* URLs Dinâmicas
* Validação de cadastro
* Validação de login

## Bora cadastrar?
![tela de cadastro](https://media.discordapp.net/attachments/815753127537410102/1150493341750939719/image.png?width=1260&height=621)

### Nota
```php
echo 'Clone o projeto e divirta-se!';
```

## Como clonar:
```bash
git clone https://github.com/arthurbrenno/phplace-market.git
```



## Como as Requests/Responses estão sendo feitas (extremamente resumido):
```php
// Depois de configurar uma rota, lançamos uma Response
$route->addGetRoute('/produtos', [
    function() {
        return new Response(200, Pages\Produtos::getProdutos());
    }
]);
```
