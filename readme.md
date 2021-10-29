Simples Crud de gatos com Django Rest Framework:

    - Crie seu virtualenv

    - Clone o projeto

    - Instale o requirements.txt

    - Rode as migrations: python manage.py makemigrations - python manage.py migrate

    - Execute o projeto: python manage.py runserver

Rotas:

    - [POST]: http://127.0.0.1:8000/api/v1/cats
    {
        "id": 1,
        "breed": "persa",
        "origin": "ir",
        "length_coat": 23,
        "body_type": "medio",
        "pattern": "comprida"
    },

    - [GET]: http://127.0.0.1:8000/api/v1/cats/1/
    
    api/v1/ cats/<str:breed>/breed/ [name='cat_breed']
    api/v1/ cats/<str:origin>/origin/ [name='cat_origin']
    api/v1/ cats/<int:length_coat>/length_coat/ [name='cat_breed']
    api/v1/ cats/<str:body_type>/body_type/ [name='body_type']
    api/v1/ cats/<str:pattern>/pattern/ [name='pattern']

    - [UPDATE]: http://127.0.0.1:8000/api/v1/cats/1/
    {
        "id": 1,
        "breed": "persa",
        "origin": "ir",
        "length_coat": 10,
        "body_type": "medio",
        "pattern": "comprido"
    },

    - [DELETE]: http://127.0.0.1:8000/api/v1/cats/1/

