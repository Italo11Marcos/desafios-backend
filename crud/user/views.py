from django.shortcuts import render
from django.views.generic import CreateView, ListView
from .models import User
from .forms import UserForm
from django.contrib import messages
from django.urls import reverse_lazy

# Create your views here.
class CreateUserView(CreateView):
    model = User
    form_class = UserForm
    template_name = 'index.html'
    success_url = reverse_lazy('user_create')

    def get_context_data(self, **kwargs):
        context = super(CreateUserView, self).get_context_data(**kwargs)
        context['users'] = User.objects.all()
        return context

    def form_valid(self, form, *args, **kwargs):
        messages.success(self.request, 'User created!')
        return super(CreateUserView, self).form_valid(form)

    def form_invalid(self, form, *args, **kwargs):
        messages.error(self.request, 'Try again!')
        return super(CreateUserView, self).form_invalid(form)

class SearchResultsView(ListView):
    model = User
    template_name = 'index.html'

    def get_queryset(self): # new
        query = self.request.GET.get('search')
        object_list = User.objects.filter(
            name__icontains=query
        )
        return object_list