import pymongo
import json

myclient = pymongo.MongoClient("mongodb://localhost:27017/")
mydb = myclient["personal_animal"]
mycol = mydb["neko"]
mydict1 = '{ "ID" : "04","animal_kind" : "貓","animal_type" : "波斯貓","animal_owner" : "王耀","animal_place" : "台中","animal_status" : True }'
mydict = { "ID" : "04",
    "animal_kind" : "貓",
    "animal_type" : "波斯貓",
    "animal_owner" : "王耀",
    "animal_place" : "台中",
    "animal_status" : True }
x = mycol.insert_one(mydict)
f = open("animal.json", "a")
f.write(mydict1)
f.write("\n")
f.close()


