from django.db import models
from django.contrib.postgres.fields import ArrayField

# Create your models here.
class Livro(models.Model):
    titulo = models.CharField(max_length=200)
    editora = models.CharField(max_length=50)
    foto = models.CharField(max_length=200)
    autores = ArrayField(models.CharField(max_length=200), blank=True)
    data_criacao = models.DateField(auto_now_add=True)

    class Meta:
        ordering = ['titulo']
        verbose_name = 'Livro'
        verbose_name_plural = 'Livros'

    def __str__(self):
        return self.titulo