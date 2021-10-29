from rest_framework import serializers

from .models import Cat

class CatSerializer(serializers.ModelSerializer):

    class Meta:
        model = Cat
        fields = (
            'id',
            'breed',
            'origin',
            'length_coat',
            'body_type',
            'pattern'
        )

        def validate_length_coat(self, value):
            if value < 1:
                raise serializers.ValidationError('Length must be greater than one')
            else:
                return value