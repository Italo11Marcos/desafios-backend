from django.db import models
from django.core.validators import MaxValueValidator, MinValueValidator

# Create your models here.
class Cat(models.Model):
    breed = models.CharField(max_length=50)
    origin = models.CharField(max_length=3)
    length_coat = models.PositiveIntegerField(default=10, validators=[MinValueValidator(1), MaxValueValidator(10)])
    body_type = models.CharField(max_length=50)
    pattern = models.CharField(max_length=50)
