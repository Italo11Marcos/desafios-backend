from django.test import TestCase
from django.test import Client

# Create your tests here.
class IndexViewTestCase(TestCase):

    def setUp(self):
        self.dados = {
            'days': 5
        }
        self.client = Client()

    #verifica se o response da 200
    def test_index_post(self):
        response = self.client.post('', self.dados)

        self.assertEqual(response.status_code, 200)

    #verifica se o response context retorna a quantidade certa
    def test_return_post(self):
        response = self.client.post('', self.dados)

        self.assertEqual(len(response.context['news_cases']), 5)
