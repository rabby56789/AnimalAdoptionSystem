"""
Definition of models.
"""

from django.db import models
import uuid

# Create your models here.
class User(models.Model):
   userID=models.UUIDField(primary_key=True,default=uuid.uuid4)
   username=models.CharField(max_length=50,null=False)
   GENDER_CHOICES = (
        ('Man', '男'),
        ('Woman', '女'),
        ('unknow', '無法告知'),
    )
   gender=models.CharField(max_length=6,choices=GENDER_CHOICES,default='請選擇',null=False)
   account=models.EmailField(max_length=254, unique=True,null=False)
   psd=models.CharField(max_length=20,unique=True,null=False)
   IDNumber=models.CharField(max_length=10,unique=True)
   address=models.CharField(max_length=200)
   phone=models.CharField(max_length=10)

class Opet(models.Model):
    o_id=models.UUIDField(primary_key=True,default=uuid.uuid4)
    pet_type = models.CharField(max_length=10,default='狗')
    pet_name  = models.CharField(max_length=60)
    Opet_GENDER_CHOICES = (
        ('Man', '男'),
        ('Woman', '女'),
        ('unknow', '無法告知'),
    )
    gender = models.CharField(max_length=200,choices=Opet_GENDER_CHOICES,default='請選擇',null=False)
    userID=models.ForeignKey('User',on_delete=models.SET_NULL,null=True)
    AREA_CHOICES =(
        ('基隆市','基隆市'), ('台北市','台北市'),
        ('新北市','新北市'), ('桃園市','桃園市'),
        ('新竹市','新竹市'), ('新竹縣','新竹縣'),
        ('苗栗縣','苗栗縣'), ('台中市','台中市'),
        ('彰化縣','彰化縣'), ('南投縣','南投縣'),
        ('雲林縣','雲林縣'), ('嘉義市','嘉義市'),
        ('嘉義縣','嘉義縣'), ('台南市','台南市'),
        ('高雄市','高雄市'), ('屏東縣','屏東縣'),
        ('台東縣','台東縣'), ('花蓮縣','花蓮縣'),
        ('宜蘭縣','宜蘭縣'), ('澎湖縣','澎湖縣'),
        ('金門縣','金門縣'), ('連江縣','連江縣'),
        )
    area=models.CharField(max_length=200,choices=AREA_CHOICES,default='請選擇',null=False)
    isAdopted=models.BooleanField(null=False)

