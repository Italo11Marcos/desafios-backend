from django import forms
from django.core.exceptions import ValidationError
from django.utils.translation import ugettext_lazy as _
from .models import User

class UserForm(forms.ModelForm):
    class Meta:
        model = User
        fields = ['name']

    def clean_name(self):
        name = self.cleaned_data['name']

        if len(name) < 5:
            raise ValidationError(_('Limite mínimo de 2 caracteres'))

        return name