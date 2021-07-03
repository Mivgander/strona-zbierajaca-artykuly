#include <iostream>
#include <fstream>

using namespace std;

int main()
{
	string link, tytul, klucz;
	fstream wszystko, kluczeGry, kluczeSport, kluczePolska, kluczeEsport, kluczeMotoryzacja, plik, pot;
	wszystko.open("D:\\KodPython\\posortowane\\wszystko.txt", ios::in);
	kluczeGry.open("D:\\KodPython\\kluczeGry.txt", ios::in);
	kluczeSport.open("D:\\KodPython\\kluczeSport.txt", ios::in);
	kluczePolska.open("D:\\KodPython\\kluczePolska.txt", ios::in);
	kluczeEsport.open("D:\\KodPython\\kluczeEsport.txt", ios::in);
	kluczeMotoryzacja.open("D:\\KodPython\\kluczeMotoryzacja.txt", ios::in);
	plik.open("D:\\KodPython\\posortowane\\gotowe.txt", ios::out);
	
	while(!wszystko.eof())
	{
		getline(wszystko, link);
		getline(wszystko, tytul);
		
		if(link == "" || tytul == "")
		{
			continue;
		}
		
		plik<<link<<endl;
		plik<<tytul<<endl;
		while(!kluczeGry.eof())
		{
			getline(kluczeGry, klucz);
			
			size_t found = link.find(klucz);
			size_t found2 = tytul.find(klucz);
			
			if(found != string::npos || found2 != string::npos)
			{
				plik<<"gry ";
				break;
			}
		}
		
		while(!kluczeMotoryzacja.eof())
		{
			getline(kluczeMotoryzacja, klucz);
			
			size_t found = link.find(klucz);
			size_t found2 = tytul.find(klucz);
			
			if(found != string::npos || found2 != string::npos)
			{
				plik<<"motoryzacja ";
				break;
			}
		}
		
		while(!kluczeSport.eof())
		{
			getline(kluczeSport, klucz);
			
			size_t found = link.find(klucz);
			size_t found2 = tytul.find(klucz);
			
			if(found != string::npos || found2 != string::npos)
			{
				plik<<"sport ";
				break;
			}
		}
		
		while(!kluczeEsport.eof())
		{
			getline(kluczeEsport, klucz);
			
			size_t found = link.find(klucz);
			size_t found2 = tytul.find(klucz);
			
			if(found != string::npos || found2 != string::npos)
			{
				plik<<"esport ";
				break;
			}
		}
		
		while(!kluczePolska.eof())
		{
			getline(kluczePolska, klucz);
			
			size_t found = link.find(klucz);
			size_t found2 = tytul.find(klucz);
			
			if(found != string::npos || found2 != string::npos)
			{
				plik<<"polska ";
				break;
			}
		}
		plik<<endl;
		
		kluczeGry.close();
		kluczePolska.close();
		kluczeSport.close();
		kluczeEsport.close();
		kluczeMotoryzacja.close();
		kluczeMotoryzacja.open("D:\\KodPython\\kluczeMotoryzacja.txt", ios::in);
		kluczeGry.open("D:\\KodPython\\kluczeGry.txt", ios::in);
		kluczeSport.open("D:\\KodPython\\kluczeSport.txt", ios::in);
		kluczePolska.open("D:\\KodPython\\kluczePolska.txt", ios::in);
		kluczeEsport.open("D:\\KodPython\\kluczeEsport.txt", ios::in);
	}
	
	pot.open("D:\\KodPython\\potwierdzenie\\ostateczne.txt", ios::out);
	pot.close();
	
	wszystko.close();
	plik.close();
	
	return 0;
}
