file = open("D:/KodPython/linkiGRY.txt", "r", encoding="mbcs")
f = open("D:/KodPython/linkiGRYt.txt", "a", encoding="utf_8")
for l in file:
    f.write(l)
file.close()
f.close()