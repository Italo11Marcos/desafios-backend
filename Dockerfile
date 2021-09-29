FROM python:3.8

#Para não gerar arquivos .pyc
ENV PYTHONDONTWRITEBYTECODE 1
#Para as mensagens de log não ficarem armazenadas no buffer
ENV PYTHONUNBUFFERED 1

WORKDIR /code

COPY requirements.txt .
RUN pip install -r requirements.txt

COPY . .