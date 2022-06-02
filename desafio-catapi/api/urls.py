from rest_framework.routers import SimpleRouter

from django.urls import path

from .views import CatViewSet, CatsBreedListAPIView, CatsOriginListAPIView, CatsLengthCoatListAPIView, CatsBodyTypeListAPIView, CatsPatternListAPIView

router = SimpleRouter()
router.register('cats', CatViewSet)


urlpatterns = [
    path('cats/<str:breed>/breed/', CatsBreedListAPIView.as_view(), name='cat_breed'),
    path('cats/<str:origin>/origin/', CatsOriginListAPIView.as_view(), name='cat_origin'),
    path('cats/<int:length_coat>/length_coat/', CatsLengthCoatListAPIView.as_view(), name='cat_breed'),
    path('cats/<str:body_type>/body_type/', CatsBodyTypeListAPIView.as_view(), name='body_type'),
    path('cats/<str:pattern>/pattern/', CatsPatternListAPIView.as_view(), name='pattern'),
]
