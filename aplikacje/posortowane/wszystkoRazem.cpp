#include <iostream>
#include <fstream>
#include <cstdlib>
#include <ctime>

using namespace std;

int main()
{
	string linia;
	char tab[] = {'y', 'y', 'y', 'y', 'y', 'y'}; //tu zmiana
	fstream wp, o2, onet, gry, sportWP, lauto, wszystko, pot;
	wp.open("D:\\KodPython\\linkiWP.txt", ios::in);
	o2.open("D:\\KodPython\\linkiO2.txt", ios::in);
	onet.open("D:\\KodPython\\linkiOnet.txt", ios::in);
	gry.open("D:\\KodPython\\linkiGRYt.txt", ios::in);
	sportWP.open("D:\\KodPython\\linkiSportWP.txt", ios::in);
	lauto.open("D:\\KodPython\\linkiAuto.txt", ios::in);
	wszystko.open("D:\\KodPython\\posortowane\\wszystko.txt", ios::out);
	
	srand(time(NULL));
	for(int i=0; i<6; i++) //tu zmiana
	{
		bool jest = false;
		while(jest == false)
		{
			int a = rand()%6; //tu zmiana
			switch(a)
			{
				case 0:
					if(tab[a] == 'n') break;
					while(!wp.eof())
					{
						getline(wp, linia);
						if(linia != "")
						{
							wszystko<<linia<<endl;
						}
					}
					wp.close();
					tab[a] = 'n';
					jest = true;
					break;
				case 1:
					if(tab[a] == 'n') break;
					while(!lauto.eof())
					{
						getline(lauto, linia);
						if(linia != "")
						{
							wszystko<<linia<<endl;
						}
					}
					lauto.close();
					tab[a] = 'n';
					jest = true;
					break;
				case 2:
					if(tab[a] == 'n') break;
					while(!onet.eof())
					{
						getline(onet, linia);
						size_t game = linia.find("gameplanet");
						if(linia != "" && game == string::npos)
						{
							wszystko<<linia<<endl;
						}
						else
						{
							getline(onet, linia);
						}
					}
					onet.close();
					tab[a] = 'n';
					jest = true;
					break;
				case 3:
					if(tab[a] == 'n') break;
					while(!o2.eof())
					{
						getline(o2, linia);
						if(linia != "")
						{
							wszystko<<linia<<endl;
						}
					}
					o2.close();
					tab[a] = 'n';
					jest = true;
					break;
				case 4:
					if(tab[a] == 'n') break;
					while(!gry.eof())
					{
						getline(gry, linia);
						if(linia != "")
						{
							wszystko<<linia<<endl;
						}
					}
					gry.close();
					tab[a] = 'n';
					jest = true;
					break;
				case 5:
					if(tab[a] == 'n') break;
					while(!sportWP.eof())
					{
						getline(sportWP, linia);
						if(linia != "")
						{
							wszystko<<linia<<endl;
						}
					}
					sportWP.close();
					tab[a] = 'n';
					jest = true;
					break;
			}
		}
	}
	
	pot.open("D:\\KodPython\\potwierdzenie\\razem.txt", ios::out);
	pot.close();
	
	wszystko.close();
	return 0;
}
