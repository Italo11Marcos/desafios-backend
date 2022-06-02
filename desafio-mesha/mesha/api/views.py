from django.shortcuts import render
from rest_framework.viewsets import ModelViewSet 
from .serializers import LivroSerializer, AutorSerializer
from .models import Livro, Autor

from rest_framework.renderers import TemplateHTMLRenderer
from rest_framework.response import Response
from rest_framework.views import APIView
from django_filters.rest_framework import DjangoFilterBackend


# Create your views here.
class LivroViewSet(ModelViewSet):
    queryset = Livro.objects.all()
    serializer_class = LivroSerializer


class ObraList(APIView):
    renderer_classes = [TemplateHTMLRenderer]
    template_name = 'obras_list.html'

    def get(self, request):
        queryset = Livro.objects.all()
        filter_backends = [DjangoFilterBackend]
        filterset_fields = ['data_cricao']
        return Response({'obras': queryset})