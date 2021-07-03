#include <iostream>
#include <fstream>

using namespace std;

int main()
{
	string linia, link, tytul;
	char znak;
	bool end = false;
	fstream plik, linkiAuto, pot;
	plik.open("D:\\KodPython\\stronaAuto.html", ios::in);
	linkiAuto.open("D:\\KodPython\\linkiAuto.txt", ios::out);
	
	if(plik.good() == false)
	{
		pot.open("D:\\KodPython\\potwierdzenie\\autoNULL.txt", ios::out);
		pot.close();
		return 0;
	}
	
	while(!plik.eof())
	{
		getline(plik, linia);
		size_t found = linia.find("<ul class=\"col-lg-12");
		if(found != string::npos)
		{
			while(true)
			{
				size_t koniec = linia.find("<div style=\"clear:both\">");
				if(koniec != string::npos)
				{
					cout<<"Powinien byc koniec"<<endl;
					end = true;
					break;
				}
				
				size_t find = linia.find("<a href=\"");
				while(find == string::npos)
				{
					getline(plik, linia);
					find = linia.find("<a href=\"");
					koniec = linia.find("<div class=\"col-xs-12");
					if(koniec != string::npos)
					{
						end = true;
						break;
					}
				}
				if(end == true) break;
				linia = linia.substr(find + 9, linia.length());
				
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
				
				if(link.length() >= 60 && link.length() < 400)
				{
					size_t title = linia.find("title=\"");
					if(title != string::npos)
					{
						linia = linia.substr(title + 7, linia.length());
						int b = 0;
						do
						{
							znak = linia[b];
							if(znak != '"')
							{
								tytul += znak;
								b++;
							}
						}
						while(znak != '"');
					}
					
					linkiAuto<<link<<endl;
					linkiAuto<<tytul<<endl;
				}
				link = "";
				tytul = "";
				getline(plik, linia);
			}
		}
		if(end == true) break;
	}
	plik.close();
	linkiAuto.close();
	link = "";
	tytul = "";
	
	plik.open("D:\\KodPython\\stronaAuto.html", ios::in);
	linkiAuto.open("D:\\KodPython\\linkiAuto.txt", ios::app);
	while(!plik.eof())
	{
		getline(plik, linia);
		size_t find = linia.find("<div class=\"default-title\">");
		size_t found = linia.find("<a href=\"");
		
		if(find != string::npos && found != string::npos)
		{
			linia = linia.substr(found + 9, linia.length());
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
			
			if(link.length() >= 60 && link.length() < 400)
			{
				size_t title = linia.find("title=\"");
				if(title != string::npos)
				{
					linia = linia.substr(title + 7, linia.length());
					int b = 0;
					do
					{
						znak = linia[b];
						if(znak != '"')
						{
							tytul += znak;
							b++;
						}
					}
					while(znak != '"');
				}
				
				linkiAuto<<link<<endl;
				linkiAuto<<tytul<<endl;
			}
		}
		getline(plik, linia);
		link = "";
		tytul = "";
	}
	pot.open("D:\\KodPython\\potwierdzenie\\auto.txt", ios::out);
	pot.close();
	
	plik.close();
	linkiAuto.close();
	return 0;
}
