# Desafio Vesti

Desenvolver uma API REST utilizando Laravel 8

## Banco de dados

    ![Modelagem de dados](https://github.com/Italo11Marcos/desafio-vesti/blob/master/bd-desafio-vesti.png)

## Como rodar a aplicação:

    1. Clone o projeto:
        - git clone https://github.com/Italo11Marcos/desafio-vesti.git

    2. Atualize o composer:
        - composer update

    3. Configure seu .env
        cp .env-example .env

    4. Coloque suas credenciais de acesso ao banco de dados
    
    5. Execute: php artisan jwt:secret para gerar a key
        - Caso o JWT não dê certo, execute os passos: https://jwt-auth.readthedocs.io/en/develop/laravel-installation

    6. Execute as migrations:
        - php artisan migrate
    
## Rotas:

* O usuário deve estar autenticado para realizar as operações
* Para pegar o token:
    - Faça uma requisição POST para: ``/api/login`` com os seguintes dados:
    {
        'email': 'italo@teste.com'
        'password: '123456789'
    }
* O Token obtido deve ser passado pelo ``Cliente`` da seguinte forma:
    - No ``Header`` coloque: ``Authorization``: ``bearer seuToken``
* O ``Header`` também deve ter: ``Accept``: ``application/json`` 


    <hr>
    //Categorias

    * GET /api/v1/categorias #Retorna todas as categorias

    * GET /api/v1/categorias/{id} #Retorna a categoria com o id informado

    * POST /api/v1/categorias #Insere os dados cadastrar uma categoria

    * PUT/PATCH /api/v1/categorias/{id} #Atualiza a categoria com o id informado

    * DELETE /api/v1/categorias/{id} #Delete a categoria informada
    <hr>
    //Composicaos
    
    * GET /api/v1/composicaos #Retorna todas as composicaos

    * GET /api/v1/composicaos/{id} #Retorna a composicao com o id informado

    * POST /api/v1/composicaos #Insere os dados cadastrar uma composicao

    * PUT/PATCH /api/v1/composicaos/{id} #Atualiza a composicao com o id informado

    * DELETE /api/v1/composicaos/{id} #Delete a composicao informada

    <hr>
    //Produtos

    * GET /api/v1/produtos #Retorna todas as produtos

    * GET /api/v1/produtos/{id} #Retorna a produto com o id informado

    * POST /api/v1/produtos #Insere os dados cadastrar uma produto

    * PUT/PATCH /api/v1/produtos/{id} #Atualiza a produto com o id informado

    * DELETE /api/v1/produtos/{id} #Delete a produto informada

Obs: Não conseguir usar nenhuma lib para gerar a documentação da API