from datetime import datetime
import dodajStrone

try:
        file = open("D:/KodPython/posortowane/gotowe.txt", "r", encoding="utf_8")

        dodajStrone.usun()
        dodajStrone.autoIncrement()
        a = 1
        tytul = "a"
        link = "b"
        kategoria = "c"

        for linia in file:
                if a % 10 == 1:
                        link = linia.strip()
                elif a % 10 == 2:
                        tytul = linia.strip()
                elif a % 10 == 3:
                        now = datetime.now()
                        kategoria = linia.strip()
                        if kategoria != "":
                                spr = dodajStrone.czyJest(link)
                                if spr == None:
                                        dodajStrone.dodawanie(link, tytul, kategoria, now)
                a = a + 1
                if a == 4:
                        a = 1
        file.close()
        file = open("D:/KodPython/potwierdzenie/dodawanie.txt", "w")
        file.close()
except:
        plik = open("D:/KodPython/potwierdzenie/dodawanieNULL.txt", "w")
        plik.close()