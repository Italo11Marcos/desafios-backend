# Desafio D3 - Predição Casos Covid

## Problema

Dado um número N de dias, predizer o contágio da Covid-19 no mundo

## Como foi feito

Para resolver o problema, fiz uma rápida pesquisa na internet em busca de algum modelo matamático para calcular o avanço do contágio. 

Encontrei nessa [série de artigos](https://caiquecoelho.medium.com/prevendo-o-crescimento-de-casos-de-covid-19-coronavirus-no-brasil-com-an%C3%A1lise-de-dados-gr%C3%A1ficos-33ee525b62f8) a seguinte fórmula:

    m * x + b = y
    m = 1.37664987
    b = -1.434746415542719
    x = NUMEROS_DE_CASOS_HOJE
    y = Total de casos no dia seguinte

Após essa parte, meu objetivo se concentrou em conseguir obter diáriamente o número total de novos casos no mundo, pois utilizar um valor constante não seria uma boa ideia. 

Pensei em duas possibilidades: 

    1. Fazer scrapy de dados em alguma página

    2. Utilizar um endpoint 

A primeira opção não foi bem sucedida, então utilizei um endpoint disponibilizado pelo [Our World in Data](https://github.com/owid/covid-19-data/blob/master/public/data/README.md).

O objetivo do problema é novos casos no ``mundo``, mas como a API disponibiliza somente os dados de cada país, ficou muito inviável e custoso fazer uma requisição e somar todos os novos casos. Então, para mostrar o desafio funcionando, resolvi consumir somente os dados referentes ao ``Brasil``.

Pelo fato do json ser muito grande, o retorno da função acaba demorando alguns segundos.

O arquivo ``covid/predict.py`` é onde faz os calculos da predição.

## Como rodar a aplicação

- Crie seu virtualenv: ``python -m venv env``

- Clone o projeto: ``git clone https://github.com/Italo11Marcos/desafio_d3.git``

- Para executar com docker: ``docker-compose up``

- Para executar fora do docker: ``python manage.py runserver``

    - Se for executar fora do docker, não se esqueça de instalar as dependências: ``python pip -r install requirements.txt``

- Em ambas as opções, acesse a aplicação por ``http://127.0.0.1:8000/``

- Obs: Não precisa rodar as migrations pois não utilizei nenhuma conexão com o banco de dados.

- Após isso, você vai ver uma tela igual a essa:

![Tela inicial](https://github.com/Italo11Marcos/desafio_d3/blob/master/tela_index.png)

## Rodar os testes

- Execute o comando: ``python manage.py test`` ou ``coverage run manage.py test``

## Referências utilizads

- [Coronavirus Pandemic Data Explorer](https://ourworldindata.org/explorers/coronavirus-data-explorer)

- [Data on Covid-19](https://github.com/owid/covid-19-data)

- [Caíque Coelho](https://caiquecoelho.medium.com/prevendo-o-crescimento-de-casos-de-covid-19-coronavirus-no-brasil-com-an%C3%A1lise-de-dados-gr%C3%A1ficos-33ee525b62f8)
