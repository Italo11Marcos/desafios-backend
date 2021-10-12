from rest_framework.serializers import ModelSerializer

from .models import Autor, Livro

class AutorSerializer(ModelSerializer):

    class Meta:
        model = Autor
        fields = ['nome']


class LivroSerializer(ModelSerializer):

    autores = AutorSerializer(many=True)

    class Meta:
        model = Livro
        fields = ('id', 'titulo', 'editora', 'foto', 'autores')

    def create_autores(self, autores, livro):
        for autor in autores:
            obj = Autor.objects.create(**autor)
            livro.autores.add(obj)

    def create(self, validated_data):
        autores = validated_data.pop('autores')

        livro = Livro.objects.create(**validated_data)
        self.create_autores(autores, livro)

        return livro

    def update(self, instance, validated_data):
        autores_data = validated_data.pop('autores')
        instance = super(LivroSerializer, self).update(instance, validated_data)

        for autor_data in autores_data:
            autor_qs = Autor.objects.filter(nome__iexact=autor_data['nome'])

            if autor_qs.exists():
                autor = autor_qs.first()
            else:
                autor = Autor.objects.create(**autor_data)

            instance.autores.add(autor)

        return instance