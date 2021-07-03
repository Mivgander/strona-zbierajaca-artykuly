#include <iostream>
#include <fstream>

using namespace std;

int main()
{
	fstream plik, Olinki, pot;
	string linia, link, tytul;
	char znak;
	plik.open("D:\\KodPython\\stronaOnet.html", ios::in);
	Olinki.open("D:\\KodPython\\linkiOnet.txt", ios::out);
	
	if(plik.good() == false)
	{
		pot.open("D:\\KodPython\\potwierdzenie\\onetNULL.txt");
		pot.close();
		return 0;
	}
	
	while(!plik.eof())
	{
		getline(plik, linia);
		
		size_t game = linia.find("gameplanet");
		size_t found = linia.find("<a data-uuid-ui=");
		if(found != string::npos && game == string::npos)
		{
			size_t href = linia.find("href=\"");
			while(href == string::npos)
			{
				getline(plik, linia);
				href = linia.find("href=\"");
			}
			
			linia = linia.substr(href + 6, linia.length());
			int a = 0;
			do
			{
				znak = linia[a];
				if(znak != '"')
				{
					link += znak;
					a++;
				}
			}
			while(znak != '"');
			
			
			
			size_t title = linia.find("class=\"title\"");
			while(title == string::npos)
			{
				getline(plik, linia);
				title = linia.find("class=\"title\"");
			}
			
			linia = linia.substr(title + 14, linia.length());
			int b = 0;
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
			
			link = "";
			tytul = "";
		}
	}
	
	pot.open("D:\\KodPython\\potwierdzenie\\onet.txt", ios::out);
	pot.close();
	
	plik.close();
	Olinki.close();
	
	return 0;
}
