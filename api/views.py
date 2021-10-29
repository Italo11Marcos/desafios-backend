from rest_framework import viewsets
from rest_framework.decorators import action
from rest_framework.response import Response

from rest_framework.generics import get_object_or_404, RetrieveUpdateDestroyAPIView, ListCreateAPIView

from .models import Cat
from .serializers import CatSerializer


# Create your views here.
class CatViewSet(viewsets.ModelViewSet):
    queryset = Cat.objects.all()
    serializer_class = CatSerializer

class CatsBreedListAPIView(ListCreateAPIView):
    queryset = Cat.objects.all()
    serializer_class = CatSerializer

    def get_queryset(self):
        return self.queryset.filter(breed=self.kwargs.get('breed'))


class CatsOriginListAPIView(ListCreateAPIView):
    queryset = Cat.objects.all()
    serializer_class = CatSerializer

    def get_queryset(self):
        return self.queryset.filter(origin=self.kwargs.get('origin'))


class CatsLengthCoatListAPIView(ListCreateAPIView):
    queryset = Cat.objects.all()
    serializer_class = CatSerializer

    def get_queryset(self):
        return self.queryset.filter(length_coat=self.kwargs.get('length_coat'))


class CatsBodyTypeListAPIView(ListCreateAPIView):
    queryset = Cat.objects.all()
    serializer_class = CatSerializer

    def get_queryset(self):
        return self.queryset.filter(body_type=self.kwargs.get('body_type'))


class CatsPatternListAPIView(ListCreateAPIView):
    queryset = Cat.objects.all()
    serializer_class = CatSerializer

    def get_queryset(self):
        return self.queryset.filter(pattern=self.kwargs.get('pattern'))