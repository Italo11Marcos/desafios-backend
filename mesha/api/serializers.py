from rest_framework.serializers import ModelSerializer

from .models import Autor, Livro

class AutorSerializer(ModelSerializer):

    class Meta:
        model = Autor
        fields = ('id', 'nome')


class LivroSerializer(ModelSerializer):

    autores = AutorSerializer(many=True)

    class Meta:
        model = Livro
        fields = ('id', 'titulo', 'editora', 'autores')

    def create_autores(self, autores, livro):
        for autor in autores:
            obj = Autor.objects.create(**autor)
            livro.autores.add(obj)

    def create(self, validated_data, **kwargs):
        autores = validated_data.pop('autores')

        livro = Livro.objects.create(**validated_data)
        self.create_autores(autores, livro)

        return livro