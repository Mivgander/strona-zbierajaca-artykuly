#include <iostream>
#include <fstream>

using namespace std;

int main()
{
	fstream plik, Glinki, pot;
	string linia, link, linkt, tytul, stala = "https://www.gry-online.pl";
	char znak;
	plik.open("D:\\KodPython\\stronaGRY.html", ios::in);
	Glinki.open("D:\\KodPython\\linkiGRY.txt", ios::out);
	
	if(plik.good() == false)
	{
		pot.open("D:\\KodPython\\potwierdzenie\\gryNULL.txt", ios::out);
		pot.close();
		return 0;
	}
	
	while(!plik.eof())
	{
		getline(plik, linia);
		
		size_t found = linia.find("onclick=\"hot_01_impression");
		if(found != string::npos)
		{
			size_t href = linia.find("href=\"");
			if(href != string::npos)
			{
				linia = linia.substr(href + 6, linia.length());
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
				
				size_t elo = linia.find("class=\"s600");
				while(elo == string::npos)
				{
					getline(plik, linia);
					elo = linia.find("class=\"s600");
				}
				
				linia = linia.substr(elo + 11, linia.length());
				a = 0;
				
				do
				{
					znak = linia[a];
					a++;
				}
				while(znak != '>');
				
				do
				{
					znak = linia[a];
					if(znak != '<' && znak != '>')
					{
						tytul += znak;
					}
					a++;
				}
				while(znak != '<');
			}
			else
			{
				link = "Nie ma";
			}
			
			if(tytul != "")
			{
				Glinki<<link<<endl;
				Glinki<<tytul<<endl;	
			}
			
			found = linia.find("onclick=\"hot_01_impression", found+10);
			link = "";
			linkt = "";
			tytul = "";
		}
	}
	
	pot.open("D:\\KodPython\\potwierdzenie\\gry.txt", ios::out);
	pot.close();
	
	plik.close();
	Glinki.close();
	
	return 0;
}
