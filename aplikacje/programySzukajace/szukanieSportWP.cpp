#include <iostream>
#include <fstream>

using namespace std;

int main()
{
	fstream sport, plik;
	string linia, link, linkt, tytul;
	sport.open("D:\\KodPython\\stronaSportWP.html", ios::in);
	plik.open("D:\\KodPython\\linkiSportWP.txt", ios::out);
	
	while(!sport.eof())
	{
		getline(sport, linia);
		size_t found = linia.find("class=\"bluelink\"");
		if(found != string::npos)
		{
			getline(sport, linia);
			size_t find = linia.find("href=\"");
			if(find != string::npos)
			{
				linia = linia.substr(find + 6, linia.length());
				int b = 0;
				char znak;
				do
				{
					znak = linia[b];
					if(znak != '"')
					{
						linkt += znak;
						b++;
					}
				}
				while(znak != '"');
				
				if(linkt.length() < 20)
				{
					link = "";
					linkt = "";
					tytul = "";
					continue;	
				}
				
				if(linkt[0] != 's') link += "www.sportowefakty.wp.pl";
				
				link += linkt;
				getline(sport, tytul);
				
				plik<<link<<endl;
				plik<<tytul<<endl;
			}
		}
		
		link = "";
		linkt = "";
		tytul = "";
	}
	
	fstream pot;
	pot.open("D:\\KodPython\\potwierdzenie\\sportWP.txt", ios::out);
	pot.close();
	
	sport.close();
	return 0;
}
