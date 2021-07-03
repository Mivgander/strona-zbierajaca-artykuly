#include <iostream>
#include <fstream>

using namespace std;

int main()
{
	fstream plik, Olinki, pot;
	string linia, link, linkt, tytul, stala = "https://www.o2.pl";
	char znak;
	plik.open("D:\\KodPython\\stronaO2.html", ios::in);
	Olinki.open("D:\\KodPython\\linkiO2.txt", ios::out);
	
	if(plik.good() == false)
	{
		pot.open("D:\\KodPython\\potwierdzenie\\o2NULL.txt");
		pot.close();
		return 0;
	}
	
	while(!plik.eof())
	{
		getline(plik, linia);
		
		size_t found = linia.find("href=\"");
		while(found != string::npos)
		{
			linia = linia.substr(found + 6, linia.length());
			int a = 0;
			do
			{
				znak = linia[a];
				if(znak != '"')
				{
					linkt += znak;
					a++;
				}
			}
			while(znak != '"');
			
			if(linkt[0] != 'h')
			{
				link += stala;
			}
			
			link += linkt;
			
			if(link.length() >= 60 && link.length() < 300)
			{
				size_t title = linia.find("<span");
				while(title == string::npos)
				{
					getline(plik, linia);
					title = linia.find("<span");
				}
				
				linia = linia.substr(title, linia.length());
				znak = linia[0];
				int b = 1;
				
				while(znak != '>')
				{
					znak = linia[b];
					b++;
				}
				
				do
				{
					znak = linia[b];
					if(znak != '<')
					{
						tytul += znak;
						b++;
					}
				}
				while(znak != '<');
				
				if(tytul != "")
				{
				Olinki<<link<<endl;
				Olinki<<tytul<<endl;	
				}
			}
			
			found = linia.find("href=\"", found+20);
			link = "";
			linkt = "";
			tytul = "";
		}
	}
	
	pot.open("D:\\KodPython\\potwierdzenie\\o2.txt", ios::out);
	pot.close();
	
	plik.close();
	Olinki.close();
	
	return 0;
}
