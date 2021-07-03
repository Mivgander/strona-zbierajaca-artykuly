#include <iostream>
#include <fstream>

using namespace std;

int main()
{
	fstream plik, Glinki, pot;
	string linia, link, linkt, tytul, stala = "https://www.gry-online.pl";
	char znak;
	plik.open("D:\\KodPython\\stronaGRY.html", ios::in);
	Glinki.open("D:\\KodPython\\linkiGRY.txt", ios::app);
	
	if(plik.good() == false)
	{
		pot.open("D:\\KodPython\\potwierdzenie\\grypt2NULL.txt");
		pot.close();
		return 0;
	}
	
	while(!plik.eof())
	{
		getline(plik, linia);
		
		size_t found = linia.find("<a  href=\"");
		if(found != string::npos)
		{
			linia = linia.substr(found + 10, linia.length());
			int a = 0;
			do
			{
				znak = linia[a];
				if(znak != '"')
				{
					linkt += znak;
				}
				a++;
			}
			while(znak != '"');
			
			if(linkt[0] != 'h')
			{
				link += stala;
			}
			link += linkt;
			
			size_t tls = linia.find("tls3\"");
			while(tls == string::npos)
			{
				getline(plik, linia);
				tls = linia.find("tls3\"");
			}
			
			linia = linia.substr(tls + 6, linia.length());
			a = 0;
			do
			{
				znak = linia[a];
				if(znak != '<')
				{
					tytul += znak;
				}
				a++;
			}
			while(znak != '<');
			
			if(tytul != "")
			{
				Glinki<<link<<endl;
				Glinki<<tytul<<endl;	
			}
			
			found = linia.find("<a  href=\"", found+10);
			link = "";
			linkt = "";
			tytul = "";
		}
	}
	
	system("D:\\KodPython\\venv\\Scripts\\python.exe D:\\KodPython\\konwertowanie.py");
	pot.open("D:\\KodPython\\potwierdzenie\\grypt2.txt", ios::out);
	pot.close();
	
	plik.close();
	Glinki.close();
	
	return 0;
}
