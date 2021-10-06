# Teste Morpheus Tecnologia

Infelizmente não consegui fazer o desafio utilizando o Vue no front-end. 

Meu objetivo principal era fazer o back-end utilizando o framework FastAPI e no front utilizando o Vue.

No entando, não deu certo, e para não deixar de mandar nada, fiz o crud solicitado utilizando somente o framework Django.

<b>Obs:</b> Os arquivos de banco de dados já estão no projeto. O arquivo referente ao crud em django é o ``crud/db.sqlite3`` e ao FastApi é o ``/sql_app.db``.

## Rodar a aplicação:

- Clone o projeto:
    - git clone https://github.com/Italo11Marcos/desafio-morpheus.git

- Crie seu virtualenv python:
    - ``python -m venv env``

- Instale as depêndencias do projeto:
    - ``pip install -r requirements.txt``

- Entre na pasta do crud com django:
    - cd crud

- Execute a aplicação:
    - ``python manage.py runserver``

## Caso queira acessar a API feita com FastAPI:

- Dentro da pasta raiz do projeto, execute:
    - ``uvicorn user_app.main:app --reload``
    - Acesse: [http://127.0.0.1:8000/docs](http://127.0.0.1:8000/docs)

