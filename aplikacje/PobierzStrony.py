import requests

try:
    strony = open("D:/KodPython/jakieStrony.txt", "r")
    for link in strony:
        link = link.strip()
        tab = link.split(" ")
        file = requests.get(tab[0])
        open(tab[1], 'wb').write(file.content)
    strony.close()
    plik = open("D:/KodPython/potwierdzenie/pobieranie.txt", "a")
    plik.close()
except:
    plik = open("D:/KodPython/potwierdzenie/pobieranieNULL.txt", "a")
    plik.close()