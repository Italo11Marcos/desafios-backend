
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

