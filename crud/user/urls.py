from django.urls import path
from .views import CreateUserView, SearchResultsView

urlpatterns = [
    path(r'', CreateUserView.as_view(), name="user_create"), 
    path(r'search/', SearchResultsView.as_view(), name='search_results'),
]
