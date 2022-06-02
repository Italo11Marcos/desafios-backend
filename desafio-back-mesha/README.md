## Comentários

- Para poder inserir uma lista, precisei utilizar o banco de dados postgresql

- Utilizei o docker com uma imagem do postgresql para poder executar

- Caso não utilize o docker, configure uma conexão com o postgresql, caso contrário não irá rodar.

- A princípio não estava conseguindo inserir uma lsita, então estava fazendo utilizando [Nested Relationships](https://www.django-rest-framework.org/api-guide/relations/#nested-relationships)

- O repositório da primera tentativa é esse: https://github.com/Italo11Marcos/desafios-backend/tree/master/desafio-mesha. Nele, os commits estão da forma mais correta.

    - Esse repositório possui possui todas as rotas desse, exceto a [POST] /upload-obras/

    - Exemplo de como a requisição post estava sendo executada:

    {
        "id": 1, 
        "titulo": "Senhor dos Aneis", 
        "editora": "Bravo",
        "foto": "https://i.imgur.com/UfH3IPXwer.jpg", 
        "autores": [{"nome": "Tolkien"}]
    }

## Como rodar a aplicação

- Crie seu virtualenv: ``python -m venv env``

- Clone o projeto: ``https://github.com/Italo11Marcos/desafio-back-mesha.git``

- Para executar com docker: ``docker-compose up``

- Para executar fora do docker: ``python manage.py runserver``

    - Se for executar fora do docker, não se esqueça de instalar as dependências: ``python pip -r install requirements.txt``

    - Também é necessário configurar sua conexão com banco de dados postgresql.

- Execute as migrations:

    - docker-compose exec web python manage.py makemigrations

    - docker-compose exec web python manage.py migrate

- Em ambas as opções, acesse a aplicação por ``http://127.0.0.1:8000/``

## Rotas

- [POST] /obras/ : Cadastra uma obra

- [POST] /upload-obras/ : Recece um arquivo csv, salvando em massa no banco de dados

- [GET] /obras : Lista todas as obras

- [GET] /file-obras/ : Retorna um arquivo HTML, podendo filtrar pela data de criação

    - É necessário colocar no ``Header``: ``Accept``: ``text\html``

- [PUT] /obras/:id : Atualiza uma obra

- [DELETE] /obras/:id : Deleta uma obra
