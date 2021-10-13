from django.shortcuts import render
from rest_framework.viewsets import ModelViewSet, ViewSet
from .serializers import LivroSerializer, UploadSerializer
from .models import Livro
from rest_framework.views import APIView
from rest_framework.parsers import MultiPartParser
from rest_framework.response import Response
import csv
from rest_framework.renderers import TemplateHTMLRenderer
import os
from django.core.files.storage import default_storage
from django.core.files.base import ContentFile
from django.conf import settings
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



class FileUploadView(APIView):
    parser_classes = [MultiPartParser]

    def post(self, request, format=None):
        file_obj = request.data['file']
        path = default_storage.save('tmp/file.csv', ContentFile(file_obj.read()))
        tmp_file = os.path.join(settings.MEDIA_ROOT, path)
        books = []
        with open(tmp_file, encoding='utf8') as csvfile:
            rows = csv.DictReader(csvfile)
            for row in rows:
                book = Livro(id=row['id'], titulo=row['titulo'], 
                    editora=row['editora'], foto=row['foto'], 
                    autores=row['autores'])
                books.append(book)
        Livro.objects.bulk_create(books)
        return Response(status=204)