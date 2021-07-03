import mysql.connector
from datetime import datetime

def dodawanie(link, tytul, kategoria, data):
    mydb = mysql.connector.connect(host="localhost", user="root", password="", database="strona")
    cursor = mydb.cursor()
    query = "INSERT INTO wszystko " \
            "VALUES('', %s, %s, %s, %s)"
    args = (link, tytul, kategoria, data)
    cursor.execute(query, args)
    mydb.commit()
    cursor.close()
    mydb.close()

def czyJest(link):
    mydb = mysql.connector.connect(host="localhost", user="root", password="", database="strona")
    cursor = mydb.cursor()
    query = "SELECT * FROM wszystko WHERE link = '{}'".format(link)
    cursor.execute(query)
    result = cursor.fetchone()
    return result
    cursor.close()
    mydb.close()

def usun():
    mydb = mysql.connector.connect(host="localhost", user="root", password="", database="strona")
    cursor = mydb.cursor()
    query = "DELETE FROM wszystko WHERE datediff(wszystko.dataDodania, now()) < -7"
    cursor.execute(query)
    mydb.commit()
    cursor.close()
    mydb.close()

def autoIncrement():
    mydb = mysql.connector.connect(host="localhost", user="root", password="", database="strona")
    cursor = mydb.cursor()
    query = "ALTER TABLE wszystko AUTO_INCREMENT = 1"
    cursor.execute(query)
    cursor.close()
    mydb.close()