import requests
from math import ceil

def predict(days):
    
    url = "https://covid.ourworldindata.org/data/owid-covid-data.json"

    r = requests.get(url)

    last_indice = len(r.json()['BRA']['data']) - 1

    new_cases = r.json()['BRA']['data'][last_indice]['new_cases']

    m = 1.37664987
    b = -1.434746415542719
    next_cases = []

    days = int(days)

    for i in range(days):
        new_cases = m * new_cases + b
        next_cases.append(ceil(new_cases))

    return next_cases

