from django.shortcuts import render

# Create your views here.
def index(request):
    days = 0
    if request.method == 'POST':
        days = request.POST.get('days', False)
    context = {'days': days}
    return render(request, 'index.html', context)
