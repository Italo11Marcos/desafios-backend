from rest_framework.routers import SimpleRouter
from .views import LivroViewSet, ObraList
from django.urls import path


router = SimpleRouter()
router.register('obras', LivroViewSet)

urlpatterns = [
    path('file-obras/', ObraList.as_view(), name="file-obras"),
]