from rest_framework.routers import SimpleRouter
from .views import LivroViewSet, FileUploadView, ObraList
from django.urls import path
from django.conf import settings
from django.conf.urls.static import static



router = SimpleRouter()
router.register('obras', LivroViewSet)

urlpatterns = [
    path('file-obras/', ObraList.as_view(), name="file-obras"),
    path('upload-obras/', FileUploadView.as_view())
]

if settings.DEBUG:
    urlpatterns += static(settings.MEDIA_URL, document_root=settings.MEDIA_ROOT)