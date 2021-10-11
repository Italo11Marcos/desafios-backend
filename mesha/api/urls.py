from rest_framework.routers import SimpleRouter
from .views import LivroViewSet


router = SimpleRouter()
router.register('livros', LivroViewSet)