from rest_framework.serializers import ModelSerializer, Serializer, FileField

from .models import Livro

class LivroSerializer(ModelSerializer):

    class Meta:
        model = Livro
        fields = ('id', 'titulo', 'editora', 'foto', 'autores', 'data_criacao')

class UploadSerializer(Serializer):
    file_uploaded = FileField()
    class Meta:
        fields = ['file_uploaded']