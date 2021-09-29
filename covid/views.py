from django.shortcuts import render
from .predict import predict

# Create your views here.
def index(request):
    news_cases = 0
    if request.method == 'POST':
        days = request.POST.get('days', False)
        news_cases = predict(days)
    context = {'news_cases': news_cases}
    return render(request, 'index.html', context)
