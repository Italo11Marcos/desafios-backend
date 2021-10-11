from django.shortcuts import render
from rest_framework.viewsets import ModelViewSet 
from .serializers import LivroSerializer, AutorSerializer
from .models import Livro, Autor

# Create your views here.
class LivroViewSet(ModelViewSet):
    queryset = Livro.objects.all()
    serializer_class = LivroSerializer