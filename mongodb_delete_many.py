import pymongo

myclient = pymongo.MongoClient("mongodb://localhost:27017/")
mydb = myclient["personal_animal"]
mycol = mydb["neko"]

myquery = { "ID": "04" }

x = mycol.delete_many(myquery)

print(x.deleted_count, "documents deleted")
