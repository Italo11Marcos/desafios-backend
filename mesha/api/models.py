from django.db import models

# Create your models here.
class Autor(models.Model):
    nome = models.CharField(max_length=200)

    def __str__(self):
        return self.nome

class Livro(models.Model):
    titulo = models.CharField(max_length=200)
    editora = models.CharField(max_length=50)
    foto = models.URLField()
    autores = models.ManyToManyField(
        Autor,
        verbose_name='autores'
    )

    class Meta:
        ordering = ['titulo']
        verbose_name = 'Livro'
        verbose_name_plural = 'Livros'

    def __str__(self):
        return self.titulo
    