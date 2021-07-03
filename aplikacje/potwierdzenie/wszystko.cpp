#include <iostream>
#include <fstream>
#include <ctime>
#include <cstdio>
#include <string.h>

using namespace std;

void Czekaj(float seconds)
{
	clock_t end;
	end = clock() + seconds * CLOCKS_PER_SEC;
	while(clock() < end) {}
}

int main()
{
	string error = "";
	fstream raport;
	raport.open("D:\\KodPython\\potwierdzenie\\raportxd.txt", ios::out);
	time_t czas;
	struct tm * data;
	char godzina[80];
	system("del D:\\KodPython\\potwierdzenie\\raport.txt");
	
	for(int i=0; i<1; i++)
	{
		fstream plik, plikNULL;
		bool jest = false, null = false;
		
		system("D:\\KodPython\\venv\\Scripts\\python.exe D:\\KodPython\\PobierzStrony.py"); //pobieranie
		while(true)
		{
			plik.open("D:\\KodPython\\potwierdzenie\\pobieranie.txt", ios::in);
			if(plik.good() == true)
			{
				jest = true;
				break;
			}
			plikNULL.open("D:\\KodPython\\potwierdzenie\\pobieranieNULL.txt", ios::in);
			if(plikNULL.good() == true)
			{
				null = true;
				break;
			}
			plik.close();
			plikNULL.close();
			Czekaj(0.5);
		}
		plik.close();
		plikNULL.close();
		
		if(jest == true)
		{
			system("del D:\\KodPython\\potwierdzenie\\pobieranie.txt");
			time(&czas);
			data = localtime(&czas);
			strftime(godzina, 80, "[%H:%M:%S]", data);
			strcat(godzina , "    Pobrano strony");
			raport<<godzina<<endl;
		}
		
		if(null == true)
		{
			system("del D:\\KodPython\\potwierdzenie\\pobieranieNULL.txt");
			error = "pobieranie";
			break;
		}
		
		jest = false;
		null = false;
		
		system("D:\\KodPython\\programySzukajace\\SzukanieGRY.exe"); //gry
		while(true)
		{
			plik.open("D:\\KodPython\\potwierdzenie\\gry.txt", ios::in);
			if(plik.good() == true)
			{
				jest = true;
				break;
			}
			plikNULL.open("D:\\KodPython\\potwierdzenie\\gryNULL.txt", ios::in);
			if(plikNULL.good() == true)
			{
				null = true;
				break;
			}
			plik.close();
			plikNULL.close();
			Czekaj(0.5);
		}
		plik.close();
		plikNULL.close();
		
		if(jest == true)
		{
			system("del D:\\KodPython\\potwierdzenie\\gry.txt");
			time(&czas);
			data = localtime(&czas);
			strftime(godzina, 80, "[%H:%M:%S]", data);
			strcat(godzina , "    Wybrano linki z gry");
			raport<<godzina<<endl;
		}
		
		if(null == true)
		{
			system("del D:\\KodPython\\potwierdzenie\\gryNULL.txt");
			error = "gry";
			break;
		}
		
		jest = false;
		null = false;
		
		system("D:\\KodPython\\programySzukajace\\SzukanieGRYpt.2.exe"); //gry pt2
		while(true)
		{
			plik.open("D:\\KodPython\\potwierdzenie\\grypt2.txt", ios::in);
			if(plik.good() == true)
			{
				jest = true;
				break;
			}
			plikNULL.open("D:\\KodPython\\potwierdzenie\\grypt2NULL.txt", ios::in);
			if(plikNULL.good() == true)
			{
				null = true;
				break;
			}
			plik.close();
			plikNULL.close();
			Czekaj(0.5);
		}
		plik.close();
		plikNULL.close();
		
		if(jest == true)
		{
			system("del D:\\KodPython\\potwierdzenie\\grypt2.txt");
			time(&czas);
			data = localtime(&czas);
			strftime(godzina, 80, "[%H:%M:%S]", data);
			strcat(godzina , "    Wybrano linki z grypt2");
			raport<<godzina<<endl;
		}
		
		if(null == true)
		{
			system("del D:\\KodPython\\potwierdzenie\\grypt2NULL.txt");
			error = "grypt2";
			break;
		}
		
		jest = false;
		null = false;
		system("D:\\KodPython\\venv\\Scripts\\python.exe D:\\KodPython\\konwertowanie.py");
		
		system("D:\\KodPython\\programySzukajace\\SzukanieAuto.exe"); //auto
		while(true)
		{
			plik.open("D:\\KodPython\\potwierdzenie\\auto.txt", ios::in);
			if(plik.good() == true)
			{
				jest = true;
				break;
			}
			plikNULL.open("D:\\KodPython\\potwierdzenie\\autoNULL.txt", ios::in);
			if(plikNULL.good() == true)
			{
				null = true;
				break;
			}
			plik.close();
			plikNULL.close();
			Czekaj(0.5);
		}
		plik.close();
		plikNULL.close();
		
		if(jest == true)
		{
			system("del D:\\KodPython\\potwierdzenie\\auto.txt");
			time(&czas);
			data = localtime(&czas);
			strftime(godzina, 80, "[%H:%M:%S]", data);
			strcat(godzina , "    Wybrano linki z auto");
			raport<<godzina<<endl;
		}
		
		if(null == true)
		{
			system("del D:\\KodPython\\potwierdzenie\\autoNULL.txt");
			error = "auto";
			break;
		}
		
		jest = false;
		null = false;
		
		system("D:\\KodPython\\programySzukajace\\SzukanieO2.exe"); //o2
		while(true)
		{
			plik.open("D:\\KodPython\\potwierdzenie\\o2.txt", ios::in);
			if(plik.good() == true)
			{
				jest = true;
				break;
			}
			plikNULL.open("D:\\KodPython\\potwierdzenie\\o2NULL.txt", ios::in);
			if(plikNULL.good() == true)
			{
				null = true;
				break;
			}
			plik.close();
			plikNULL.close();
			Czekaj(0.5);
		}
		plik.close();
		plikNULL.close();
		
		if(jest == true)
		{
			system("del D:\\KodPython\\potwierdzenie\\o2.txt");
			time(&czas);
			data = localtime(&czas);
			strftime(godzina, 80, "[%H:%M:%S]", data);
			strcat(godzina , "    Wybrano linki z o2");
			raport<<godzina<<endl;
		}
		
		if(null == true)
		{
			system("del D:\\KodPython\\potwierdzenie\\o2NULL.txt");
			error = "o2";
			break;
		}
		
		jest = false;
		null = false;
		
		system("D:\\KodPython\\programySzukajace\\szukanieSportWP.exe"); //sportWP
		while(true)
		{
			plik.open("D:\\KodPython\\potwierdzenie\\sportWP.txt", ios::in);
			if(plik.good() == true)
			{
				jest = true;
				break;
			}
			plikNULL.open("D:\\KodPython\\potwierdzenie\\sportWPNULL.txt", ios::in);
			if(plikNULL.good() == true)
			{
				null = true;
				break;
			}
			plik.close();
			plikNULL.close();
			Czekaj(0.5);
		}
		plik.close();
		plikNULL.close();
		
		if(jest == true)
		{
			system("del D:\\KodPython\\potwierdzenie\\sportWP.txt");
			time(&czas);
			data = localtime(&czas);
			strftime(godzina, 80, "[%H:%M:%S]", data);
			strcat(godzina , "    Wybrano linki z sportWP");
			raport<<godzina<<endl;
		}
		
		if(null == true)
		{
			system("del D:\\KodPython\\potwierdzenie\\sportWPNULL.txt");
			error = "sportWP";
			break;
		}
		
		jest = false;
		null = false;
		
		system("D:\\KodPython\\programySzukajace\\SzukanieWP.exe"); //wp
		while(true)
		{
			plik.open("D:\\KodPython\\potwierdzenie\\wp.txt", ios::in);
			if(plik.good() == true)
			{
				jest = true;
				break;
			}
			plikNULL.open("D:\\KodPython\\potwierdzenie\\wpNULL.txt", ios::in);
			if(plikNULL.good() == true)
			{
				null = true;
				break;
			}
			plik.close();
			plikNULL.close();
			Czekaj(0.5);
		}
		plik.close();
		plikNULL.close();
		
		if(jest == true)
		{
			system("del D:\\KodPython\\potwierdzenie\\wp.txt");
			time(&czas);
			data = localtime(&czas);
			strftime(godzina, 80, "[%H:%M:%S]", data);
			strcat(godzina , "    Wybrano linki z wp");
			raport<<godzina<<endl;
		}
		
		if(null == true)
		{
			system("del D:\\KodPython\\potwierdzenie\\wpNULL.txt");
			error = "wp";
			break;
		}
		
		jest = false;
		null = false;
		
		system("D:\\KodPython\\programySzukajace\\SzukanieOnet.exe"); //onet
		while(true)
		{
			plik.open("D:\\KodPython\\potwierdzenie\\onet.txt", ios::in);
			if(plik.good() == true)
			{
				jest = true;
				break;
			}
			plikNULL.open("D:\\KodPython\\potwierdzenie\\onetNULL.txt", ios::in);
			if(plikNULL.good() == true)
			{
				null = true;
				break;
			}
			plik.close();
			plikNULL.close();
			Czekaj(0.5);
		}
		plik.close();
		plikNULL.close();
		
		if(jest == true)
		{
			system("del D:\\KodPython\\potwierdzenie\\onet.txt");
			time(&czas);
			data = localtime(&czas);
			strftime(godzina, 80, "[%H:%M:%S]", data);
			strcat(godzina , "    Wybrano linki z onet");
			raport<<godzina<<endl;
		}
		
		if(null == true)
		{
			system("del D:\\KodPython\\potwierdzenie\\onetNULL.txt");
			error = "onet";
			break;
		}
		
		jest = false;
		null = false;
		
		system("D:\\KodPython\\posortowane\\wszystkoRazem.exe"); //razem
		while(true)
		{
			plik.open("D:\\KodPython\\potwierdzenie\\razem.txt", ios::in);
			if(plik.good() == true)
			{
				jest = true;
				break;
			}
			plik.close();
			Czekaj(0.5);
		}
		plik.close();
		
		if(jest == true)
		{
			system("del D:\\KodPython\\potwierdzenie\\razem.txt");
			time(&czas);
			data = localtime(&czas);
			strftime(godzina, 80, "[%H:%M:%S]", data);
			strcat(godzina , "    Polaczono wszystko razem");
			raport<<godzina<<endl;
		}
		
		jest = false;
		
		system("D:\\KodPython\\posortowane\\ostateczneSortowanie.exe"); //ostateczne
		while(true)
		{
			plik.open("D:\\KodPython\\potwierdzenie\\ostateczne.txt", ios::in);
			if(plik.good() == true)
			{
				jest = true;
				break;
			}
			plik.close();
			Czekaj(0.5);
		}
		plik.close();
		
		if(jest == true)
		{
			system("del D:\\KodPython\\potwierdzenie\\ostateczne.txt");
			time(&czas);
			data = localtime(&czas);
			strftime(godzina, 80, "[%H:%M:%S]", data);
			strcat(godzina , "    Dodano kategorie");
			raport<<godzina<<endl;
		}
		
		jest = false;
		null = false;
		
		system("D:\\KodPython\\venv\\Scripts\\python.exe D:\\KodPython\\bazaDanych.py"); //dodawanie do bazy
		while(true)
		{
			plik.open("D:\\KodPython\\potwierdzenie\\dodawanie.txt", ios::in);
			if(plik.good() == true)
			{
				jest = true;
				break;
			}
			plikNULL.open("D:\\KodPython\\potwierdzenie\\dodawanieNULL.txt", ios::in);
			if(plikNULL.good() == true)
			{
				null = true;
				break;
			}
			plik.close();
			plikNULL.close();
			Czekaj(0.5);
		}
		plik.close();
		plikNULL.close();
		
		if(jest == true)
		{
			system("del D:\\KodPython\\potwierdzenie\\dodawanie.txt");
			time(&czas);
			data = localtime(&czas);
			strftime(godzina, 80, "[%H:%M:%S]", data);
			strcat(godzina , "    Dodano linki do bazy");
			raport<<godzina<<endl;
		}
		
		if(null == true)
		{
			system("del D:\\KodPython\\potwierdzenie\\dodawanieNULL.txt");
			error = "dodawanie";
			break;
		}
		
		jest = false;
		null = false;
	}
	
	if(error == "pobieranie") //bledy
	{
		time(&czas);
		data = localtime(&czas);
		strftime(godzina, 80, "[%H:%M:%S]", data);
		strcat(godzina , "    Blad z pobraniem strony");
		raport<<godzina<<endl;
	}
	else if(error == "auto")
	{
		time(&czas);
		data = localtime(&czas);
		strftime(godzina, 80, "[%H:%M:%S]", data);
		strcat(godzina , "    Blad z auto");
		raport<<godzina<<endl;
	}
	else if(error == "gry")
	{
		time(&czas);
		data = localtime(&czas);
		strftime(godzina, 80, "[%H:%M:%S]", data);
		strcat(godzina , "    Blad z gry");
		raport<<godzina<<endl;
	}
	else if(error == "grypt2")
	{
		time(&czas);
		data = localtime(&czas);
		strftime(godzina, 80, "[%H:%M:%S]", data);
		strcat(godzina , "    Blad z grypt2");
		raport<<godzina<<endl;
	}
	else if(error == "wp")
	{
		time(&czas);
		data = localtime(&czas);
		strftime(godzina, 80, "[%H:%M:%S]", data);
		strcat(godzina , "    Blad z wp");
		raport<<godzina<<endl;
	}
	else if(error == "sportWP")
	{
		time(&czas);
		data = localtime(&czas);
		strftime(godzina, 80, "[%H:%M:%S]", data);
		strcat(godzina , "    Blad z sportWP");
		raport<<godzina<<endl;
	}
	else if(error == "o2")
	{
		time(&czas);
		data = localtime(&czas);
		strftime(godzina, 80, "[%H:%M:%S]", data);
		strcat(godzina , "    Blad z o2");
		raport<<godzina<<endl;
	}
	else if(error == "onet")
	{
		time(&czas);
		data = localtime(&czas);
		strftime(godzina, 80, "[%H:%M:%S]", data);
		strcat(godzina , "    Blad z onet");
		raport<<godzina<<endl;
	}
	else if(error == "dodawanie")
	{
		time(&czas);
		data = localtime(&czas);
		strftime(godzina, 80, "[%H:%M:%S]", data);
		strcat(godzina , "    Blad z dodawaniem linków do bazy");
		raport<<godzina<<endl;
	}
	else if(error != "")
	{
		time(&czas);
		data = localtime(&czas);
		strftime(godzina, 80, "[%H:%M:%S]", data);
		strcat(godzina , "    Blad nieznany");
		raport<<godzina<<endl;
	}
	
	raport.close();
	system("rename D:\\KodPython\\potwierdzenie\\raportxd.txt raport.txt");
	
	return 0;
}
