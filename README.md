# HR
## Aplicatie web pentru departamentul de HR al unei firme

### Pasi de urmat pentru dezvoltarea locala:<br/>

1. Generare ssh key:
	1. Descarcare PuTTYGen.exe , de la adresa urmatoare: [external link](https://www.chiark.greenend.org.uk/~sgtatham/putty/latest.html)

	2. Pentru sistem de operare WINDOWS:
		* Trebuie creat folder-ul .ssh in C:\Users[username]
		* Trebuie sa salveze cheia ssh in folderul de mai sus , cu numele ID_rsa 
		* Cheia public (ID_rsa.pub) trebuie trimisa la adresa de e-mail: 
		stefan.smarandache96@gmail.com / sau anuntat pe discord faptul ca v-ati generat cheia si vreti sa o adugati in _repo_ pentru clonare 
		
	3. Pentru sisteme de operare Linux/Ubuntu/MacOS : ssh-keygen. Nu introduci nici un pass-phrase sau orice altceva , doar o trimiti catre adresa de mai sus

2. Instalare server local: 

	* Windows: XAMPP/WAMP
	* Linux: LAMP/Servicii separate(Apache,Nginx,Sql)
	* MacOS: MAMP/Servicii separate

3. In folderul htdocs, aflat in directorul serverului local, se cloneaza proiectul folosind urmatoarea comanda:
	* git clone git@github.com:ClubulDeInformatica/HR.git 

4. Creare branch local nou, folosind:
	* git branch FE_x/BE_x 

		(**FE** - Task-uri FrontEnd , **BE** - Task-uri BackEnd, **X** - reprezinta numarul taskului atribuit pe github).

5. Dupa terminarea task-ului trebuie folosite si urmarite in ordinea urmatoare, comenzile:
	1. git add .
	2. git commit -m "FE_x/BE_x: mesaj"
	3. Pentru primul push pe noul branch, trebuie folosita urmatoarea comanda:

	    * git push --set-upstream origin [**nume_branch_nou_setat_la_punctul_4**]
		
	4. Pentru a aduce la zi( update) branch-ul **develop**: 
		1. git checkout develop 
		2. git pull
