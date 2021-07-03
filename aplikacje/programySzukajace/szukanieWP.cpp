#include <iostream>
#include <fstream>

using namespace std;

int main()
{
	fstream plik, WPlinki, pot;
	string linia, link, tytul;
	char znak;
	plik.open("D:\\KodPython\\stronaWP.html", ios::in);
	WPlinki.open("D:\\KodPython\\linkiWP.txt", ios::out);
	
	if(plik.good() == false)
	{
		pot.open("D:\\KodPython\\potwierdzenie\\wpNULL.txt");
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
					link += znak;
					a++;
				}
			}
			while(znak != '"');
			
			if(link.length() >= 60 && link.length() < 400)
			{
				size_t title = linia.find("<!-- -->"); //class="lclzf3-0 egPcYF"
				size_t titlev2 = linia.find("class=\"lclzf3-0 egPcYF\"");
				if(title != string::npos && titlev2 != string::npos)
				{
					if(title < titlev2)
					{
						linia = linia.substr(title + 8, linia.length());
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
					}
					else if(titlev2 < title)
					{
						linia = linia.substr(titlev2 + 24, linia.length());
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
					}
				}
				else if(title != string::npos)
				{
					linia = linia.substr(title + 8, linia.length());
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
				}
				else if(titlev2 != string::npos)
				{
					linia = linia.substr(titlev2 + 24, linia.length());
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
				}
				
				if(tytul != "")
				{
					WPlinki<<link<<endl;
					WPlinki<<tytul<<endl;	
				}
			}
			
			found = linia.find("href=\"", found+20);
			link = "";
			tytul = "";
		}
	}
	
	pot.open("D:\\KodPython\\potwierdzenie\\wp.txt", ios::out);
	pot.close();
	
	plik.close();
	WPlinki.close();
	
	return 0;
}
