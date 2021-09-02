from rest_framework import serializers

from .models import PackageRelease, Project

import requests


class PackageSerializer(serializers.ModelSerializer):
    class Meta:
        model = PackageRelease
        fields = ['name', 'version']
        extra_kwargs = {'version': {'required': False, 'default': ''}}

    def validate_name(self, name):
        status_code = 0
        try:
            r = requests.get('https://pypi.python.org/pypi/{}/json'.format(name))
            r.raise_for_status()
        except  requests.exceptions.RequestException as err:
            pass
        else:
            status_code = r.status_code

        if status_code == 200:
            return name
        raise serializers.ValidationError()

class ProjectSerializer(serializers.ModelSerializer):
    class Meta:
        model = Project
        fields = ['name', 'packages']

    packages = PackageSerializer(many=True)

    def create(self, validated_data, **kwargs):
        # TODO
        # - Processar os pacotes recebidos
        # - Persistir informações no banco
        #packages = validated_data['packages']
        #return Project(name=validated_data['name'])

        package_validated_data = validated_data.pop('packages')
        project = Project.objects.create(**validated_data)
        package_set_serializer = self.fields['packages']
        for pack in package_validated_data:
            r = requests.get('https://pypi.python.org/pypi/{}/json'.format(pack['name'])) 
            if pack['version'] != '' and pack['version'] not in r.json()['releases']:
                raise serializers.ValidationError()
            if pack['version'] == '': 
                pack['version'] = r.json()['info']['version']
            pack['project'] = project
        package = package_set_serializer.create(package_validated_data)
        return project
