





Analyse en ontwerpdocument
Thirza Swijnenburg
Bachelor Informatica
Doorstroommodule
Versie 1.1
8 februari 2025




















Inhoud
Inhoud	2
De situatie	3
De huidige situatie	3
De gewenste situatie	4
De Requirements	5
Use Cases	6
Use cases beschrijvingen	7
Klassendiagram (Volgens mvc)	8
Klassen uitgewerkt in PHP	10
Architectuur	11
Sequence diagram	12
ERD (met relationele modellen)	13
Relationeel model	14
De Database	16
Lettertypen en -groottes en kleuren	19
Fonts & lettergroottes	19
De Kleuren	20
Deployment diagram	22
Aanbevelingen over eisen, wensen en kwaliteitseigenschappen van het systeem	23
Acceptatietest	23
Interactief ontwerp	24
Bronnen	24




 
De situatie

Hieronder staan de situaties beschreven om een duidelijk inzicht te krijgen in hetgeen gerealiseerd moet worden en hetgeen al aanwezig/gerealiseerd is.

De huidige situatie

Klanten kunnen een boek lenen. De klanten krijgen een eigen leenkaart waarin staat wie de klant is (naam, geboortedatum) en waarop staat welke boeken zijn geleend en wanneer die ingeleverd moeten worden.

In het huidige systeem wordt in een catalogus door de bibliothecaris bijgehouden welke boeken er zijn , door wie die zijn geleend.
De bibliothecaris kan een boek toevoegen, uit het assortiment halen, een boek uitlenen, de informatie van een boek bijwerken.
 
Figuur 1.Activiteitendiagram: De administratie van het lenen van een boek door een klant in de huidige situatie

De gewenste situatie

De bibliothecaris wilt meer inzicht in welke boeken er zijn geleend door welke klant.
Met  het huidige systeem kan er niet vanaf een afstand een boek (uit) geleend worden. Ook is er niet snel duidelijk wie welke boeken geleend heeft.
Het plan is om een digitaal systeem te maken, waar de klant eenvoudig kan zien welke boeken hij geleend heeft, de details kan vinden van zijn geleende boeken, en de details per boek bekijken. 
Ten opzichte van het oude systeem verandert er wel het een en ander voor de informatie van het boek.
Een boek krijgt nu de status ‘beschikbaar’ of ‘uitgeleend’ in plaats van alleen de klantnaam en wordt toegevoegd aan het overzicht met geleende boeken van de betreffende klant.

Figuur 2.Activiteitendiagram: De administratie van het lenen van een boek door een klant in de nieuwe situatie



De Requirements 

Uit bovenstaande beschrijvingen van de huidige en gewenste situatie kunnen wij de volgende eisen opmaken.

1.	Een klant moet een account kunnen aanmaken. 
2.	Een klant moet kunnen inloggen op het systeem. 
3.	Een klant moet kunnen uitloggen uit het systeem. 
4.	Een klant moet de boekencatalogus kunnen bekijken. 
5.	Een klant moet gedetailleerde informatie van een boek kunnen inzien. 
6.	Een klant moet boeken kunnen lenen. 
7.	Een klant moet boeken kunnen inleveren. 
8.	Een klant moet een overzicht kunnen zien van geleende boeken. 
9.	Het systeem moet de status van een boek updaten bij lenen/inleveren. 
10.	Het systeem moet geleende boeken koppelen aan gebruikersaccounts. 
11.	Het systeem moet de uitleengeschiedenis bijhouden. 
12.	Het systeem moet boetes kunnen berekenen bij te laat inleveren. 
13.	Een klant moet het "Boek van de Maand" kunnen bekijken. 

 
Use Cases

Bovenstaande functionaliteiten resulteren in een aantal use-cases. Een gebruiker kan zich registreren en inloggen om toegang te krijgen tot het systeem. Na het inloggen komt de gebruiker op de homepage, waar de gebruiker verschillende acties kan uitvoeren. De gebruiker kan de boekencatalogus bekijken, waarna hij gedetailleerde informatie over een boek kan opvragen. Vanuit deze informatiepagina kan de gebruiker een boek lenen of inleveren.
Daarnaast kan de gebruiker een overzicht van recente uitleningen bekijken, een boete berekenen of de boek van de maand bekijken. Geleende boeken kunnen bekeken worden op een eigen pagina, waarbij de gebruiker ook de informatie van de boeken kan bekijken. Uitloggen is altijd mogelijk vanuit de homepage. De relaties tussen de use-cases zorgen ervoor dat sommige use cases eerst moeten worden uitgevoerd voordat het mogelijk is een andere use case uit te voeren , zoals dat een boek eerst bekeken moet worden voordat het geleend of ingeleverd kan worden (Include). Optionele uitbreidingen (Extend) , zoals boeteberekening en het bekijken van de boek van de maand, zijn mogelijk vanuit de vorige usecase, bijvoorbeeld boek van de maand bekijken nadat de gebruiker is ingelogd en op de homepagina is terecht gekomen. 

 
Figuur 3. Use case diagram van het bibliotheeksysteem



Use cases beschrijvingen 

Hieronder staat de beschrijving van een use-case uit het diagram dat hierboven beschreven staat.


In deze beschrijving staat de samenvatting van de use-case, en ook de voorwaarden.
De voorwaarden staan er zodat duidelijk wordt wat de gebruiker behoeft te doen of wat er aanwezig moet zijn in het systeem voordat de use case ter sprake komt.
Onder stappen staan de stappen beschreven die de klant dient uit te voeren wil de use case correct verlopen.
Ook staan de reacties van het systeem beschreven.
Onder uitzonderingen vindt u de uitzonderingen die plaats zou kunnen vinden tijdens het uitvoeren van de use-case.
Het systeem dient dit op te vangen.
Uitzonderingen kunnen mogelijk optreden bij verkeerde input of handelingen van de gebruiker, of kunnen voorkomen uit een bug van systeem.





Use-case	2.Een klant kan boeken lenen

Samenvatting	Beschrijving van hoe een klant boeken kan lenen.
Voorwaarde	Er staan boeken in het systeem.
Stappen.	1.klant zoekt boek in de lijst.
2.klant klikt op het boek om het boek weer te geven.
3.systeem geeft informatie weer van boek.
4.klant bekijkt de informatie van het boek.
5.klant klikt op lenen.
6.systeem wijzigt status van boek in ‘geleend’ en voegt de klantid toe aan het boek.
7.Systeem geeft melding ‘U heeft $titel geleend!’.

Resultaat.	De klant heeft  een boek geleend.
Uitzonderingen	-

 
Klassendiagram (Volgens mvc)

In het onderstaande klassendiagram definiëren we de klassen voor de gedefinieerde entiteiten. Dit diagram laat zien dat het bibliotheeksysteem werkt volgens het MVC-patroon. Zo blijft het systeem overzichtelijk, makkelijk uit te breiden en goed te onderhouden.
De DAO’s halen de data uit de database en gebruiken daarbij de models om de data correct te structureren. De controllers regelen de logica en halen via de DAO’s de juiste gegevens op. Doordat ze niet direct met de database werken, hoeven ze niet aangepast te worden als de opslag verandert. Vervolgens sturen ze de data door naar de views, die ervoor zorgen dat de gebruiker alles netjes te zien krijgt.
De models zorgen ervoor dat alles een vaste structuur heeft en dat de informatie correct wordt opgeslagen. 
De views communiceren niet direct met de data omdat zij dan aangepast zullen moeten worden wanneer de data of database wijzigt. Door dit gescheiden te houden, kun je zonder gedoe de UI aanpassen zonder dat het systeem zelf moet veranderen. Dit maakt de hele opzet veel flexibeler en makkelijker te onderhouden.





 
Figuur 4.Het klassendiagram
 

Klassen uitgewerkt in PHP
Hieronder zijn twee klassen uitgewerkt in PHP als zijnde voorbeeld.
De klasse Book bevat de propertjes CatalogNumber, Title, Description, ISBN, IsBorrowed, UserID en Author.
De klasse User bevat de propertjes name, email en password.
 
 
Figuur 5.De twee klassen uitgewerkt in PHP als voorbeeld.


 
Architectuur

Bij dit project maken we gebruik van de mvc-architectuur.
De gebruiker bezoekt een pagina, waarna de view een verzoek naar de controller stuurt om gegevens op te halen. De controller roept de DAO aan, die zorgt voor de communicatie met de database. De DAO gebruikt het model om de query correct te vormen en uit te voeren. Het model stuurt de query door naar de database en ontvangt de ongestructureerde gegevens. Het model structureert deze gegevens en geeft deze terug aan de DAO. De DAO geeft de gestructureerde data door aan de controller, die deze op zijn beurt doorstuurt naar de view. De view laat de data zien aan de gebruiker, die nu de bijgewerkte informatie op de pagina kan zien.

Bijvoorbeeld: Wanneer een gebruiker zijn geleende boeken wil bekijken, bezoekt hij de pagina /myBooks. De view stuurt een verzoek naar de controller, die de DAO aanroept om alle boeken op te halen die gekoppeld zijn aan de ingelogde gebruiker. De DAO gebruikt het Book model om een goed gestructureerde query te maken en deze naar de database te sturen.
De database haalt de relevante boeken op en stuurt de ruwe gegevens terug naar het Book model. Het model structureert deze gegevens en geeft deze terug aan de DAO. Vervolgens geeft de DAO de gestructureerde data door aan de controller, die de gegevens doorstuurt naar de view.
De view presenteert de boeken aan de gebruiker, zodat hij een overzicht ziet van zijn geleende boeken op de pagina.

 
Figuur 6. De werking van de mvc architectuur


Sequence diagram

Dit sequence diagram beschrijft de use case "Gebruiker bekijkt geleende boeken".
Wanneer een gebruiker zijn geleende boeken wil bekijken, bezoekt hij de pagina /myBooks. De view stuurt een verzoek naar de controller, die de DAO aanroept om alle boeken op te halen die gekoppeld zijn aan de ingelogde gebruiker. De DAO gebruikt het Book model om een goed gestructureerde query te maken en deze naar de database te sturen.
De database haalt de relevante boeken op en stuurt de ruwe gegevens terug naar het Book model. Het model structureert deze gegevens en geeft deze terug aan de DAO. Vervolgens geeft de DAO de gestructureerde data door aan de controller, die de gegevens doorstuurt naar de view.
De view presenteert de boeken aan de gebruiker, zodat hij een overzicht ziet van zijn geleende boeken op de pagina.


 
Figuur 7.Sequencediagram voor Usecase ‘Klant kan geleende boeken bekijken.’

 
ERD (met relationele modellen)

In het bibliotheeksysteem zijn er drie belangrijke onderdelen: gebruikers, boeken en uitleningen.
Een gebruiker heeft een id, naam en e-mailadres. Daarnaast heeft een gebruiker een wachtwoord voor inloggen en een veld om te controleren of het e-mailadres is geverifieerd. Er zijn ook velden voor de datum waarop de gebruiker is aangemaakt en bijgewerkt.
Een boek heeft een id, een catalogusnummer om het boek in de bibliotheek te identificeren, een titel, een beschrijving, een ISBN-nummer en een auteur. Ook heeft een boek een status die aangeeft of het is uitgeleend en aan wie. Als een boek is uitgeleend, wordt het gekoppeld aan de id van de gebruiker die het heeft geleend. Als het beschikbaar is, blijft dat veld leeg. Er zijn velden om bij te houden wanneer het boek is toegevoegd en voor het laatst is aangepast.
Uitleningen houden bij welke boeken door welke gebruikers zijn geleend. Elke uitlening heeft een id, het id van het boek en de gebruiker, en de data waarop het boek is uitgeleend en teruggebracht. Ook hier zijn velden die aangeven wanneer de uitlening is aangemaakt en bijgewerkt.
De relatie tussen gebruikers en boeken is één-op-veel, wat betekent dat één gebruiker meerdere boeken kan lenen, maar een boek slechts door één gebruiker tegelijk kan worden geleend. Dit wordt bijgehouden via het userID in de boeken tabel, die verwijst naar het id van de gebruiker.
Boeken en uitleningen hebben ook een één-op-veel relatie. Een boek kan meerdere keren worden uitgeleend, maar elke uitlening hoort bij één boek. Dit wordt geregeld via het bookID in de uitleningen tabel.
Tussen gebruikers en uitleningen is er ook een één-op-veel relatie, wat betekent dat een gebruiker meerdere boeken kan lenen, maar elke uitlening aan één gebruiker is gekoppeld via userID.
 
Figuur 8.Entity Relation Diagram voor het bibliotheeksysteem
Relationeel model
Het relationele model bestaat uit drie entiteiten: Users, Books, en Uitleningen, die samen het uitleensysteem van de bibliotheek ondersteunen. Gebruikers kunnen boeken lenen, en elke uitlening wordt geregistreerd in de tabel Uitleningen, die een koppeling maakt tussen een gebruiker en een boek.
Kraaienpootnotatie
De kraaienpootnotatie wordt gebruikt om de relaties weer te geven. Een rechte lijn aan de ene kant en een kraaienpoot aan de andere kant duiden op een 1:N-relatie. Een gebruiker kan meerdere boeken uitlenen, maar een uitlening behoort altijd tot één gebruiker en één boek. De cirkel bij de relatie tussen Books en Users geeft aan dat een boek optioneel aan een gebruiker gekoppeld is, wat betekent dat een boek niet per se uitgeleend hoeft te zijn.
Relaties en use case
Bij de use case "Boek uitlenen" zoekt een gebruiker een boek in de catalogus en leent het uit. Dit wordt vastgelegd in de tabel Uitleningen, waarin de uitleendatum en inleverdatum worden geregistreerd. De relaties zorgen ervoor dat een gebruiker meerdere boeken kan lenen, en elk boek kan meerdere keren worden uitgeleend over tijd.
Gekozen datatypes
•	BigInt voor ID's, vanwege schaalbaarheid.
•	Varchar voor tekstvelden zoals Name, Title en Author, vanwege flexibiliteit.
•	Text voor langere beschrijvingen zoals Description.
•	TinyInt voor de uitleenstatus (IsBorrowed), omdat het slechts 0 of 1 opslaat.
•	Timestamp voor het vastleggen van creatie- en wijzigingsdatums.
•	DateTime voor uitleendata, om exacte tijden vast te leggen.
U:C en D:R toelichting
•	U:C (Unique Constraint) zorgt ervoor dat een waarde uniek is binnen de tabel, zoals Email in de Users-tabel. Niet elke unieke waarde hoeft een primaire sleutel te zijn; bijvoorbeeld een gebruikers-ID is de primaire sleutel, terwijl e-mail uniek is maar geen PK.
•	D:R (Dependency Relationship) geeft een afhankelijkheid aan tussen tabellen via een foreign key. In dit model verwijzen BookID en UserID in Uitleningen naar Books.ID en Users.ID. Dit betekent dat een uitlening afhankelijk is van een bestaand boek en een gebruiker. 

 
Figuur 9.Relationeel Model voor het bibliotheeksysteem




 
De Database
Hieronder heb ik de uitwerking van de database in SQL gezet.

De eerste tabel die wordt gecreëerd is de tabel books, waarin de informatie over de boeken wordt opgeslagen. De tabel bevat kolommen zoals CatalogNumber voor het catalogusnummer van het boek, Title voor de titel, Description voor een korte samenvatting, ISBN voor het internationale boeknummer, IsBorrowed om aan te geven of het boek uitgeleend is en UserID als optionele verwijzing naar de gebruiker die het boek heeft geleend. De kolom IsBorrowed heeft als standaardwaarde 0, wat betekent dat een boek standaard niet is uitgeleend. De primaire sleutel van de tabel is id, die automatisch wordt verhoogd met de eigenschap AUTO_INCREMENT.
Daarna wordt de tabel uitleningen aangemaakt, waarin alle uitgeleende boeken worden bijgehouden. Deze tabel bevat de kolommen UserID en BookID, die respectievelijk verwijzen naar de gebruiker en het boek dat is uitgeleend. De kolommen DatumUitgeleend en DatumIngeleverd slaan de uit- en inleverdata op. De tabel heeft een primaire sleutel ID die automatisch oploopt, en de kolommen UserID en BookID zijn buitenlandse sleutels die respectievelijk verwijzen naar de tabellen users en books. Dankzij de ON DELETE CASCADE constraint worden uitleenrecords automatisch verwijderd als een gebruiker of boek wordt verwijderd.
De tabel users wordt vervolgens aangemaakt om de gegevens van de gebruikers op te slaan. Deze tabel bevat kolommen zoals name voor de naam van de gebruiker, email voor het e-mailadres, password voor het wachtwoord en remember_token voor eventuele sessieherinneringen. De kolom email heeft een unieke index om te voorkomen dat meerdere gebruikers zich registreren met hetzelfde e-mailadres. De primaire sleutel van de tabel is id, die automatisch oploopt.
Na het aanmaken van de tabellen worden de primaire en buitenlandse sleutels gedefinieerd. De kolom id in de tabel books wordt ingesteld als de primaire sleutel, terwijl de kolom UserID wordt ingesteld als een buitenlandse sleutel die verwijst naar de id van de tabel users. Hierdoor kan een boek gekoppeld worden aan een gebruiker wanneer het is uitgeleend. In de tabel uitleningen worden de kolommen UserID en BookID als buitenlandse sleutels ingesteld, wat betekent dat een uitlening altijd gekoppeld moet zijn aan een bestaande gebruiker en een bestaand boek.
Tot slot worden de velden created_at en updated_at toegevoegd aan alle tabellen, waardoor automatisch wordt bijgehouden wanneer een record is aangemaakt of gewijzigd. Dit is handig voor logging en administratie binnen de applicatie.









CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `CatalogNumber` bigint(20) UNSIGNED NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `ISBN` bigint(20) NOT NULL,
  `IsBorrowed` tinyint(1) NOT NULL DEFAULT 0,
  `UserID` bigint(20) UNSIGNED DEFAULT NULL,
  `Author` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `uitleningen` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `UserID` bigint(20) UNSIGNED NOT NULL,
  `BookID` bigint(20) UNSIGNED NOT NULL,
  `DatumUitgeleend` datetime NOT NULL,
  `DatumIngeleverd` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_userid_foreign` (`UserID`);

ALTER TABLE `uitleningen`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `uitleningen_userid_foreign` (`UserID`),
  ADD KEY `uitleningen_bookid_foreign` (`BookID`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `uitleningen`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `books`
  ADD CONSTRAINT `books_userid_foreign` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`);

ALTER TABLE `uitleningen`
  ADD CONSTRAINT `uitleningen_bookid_foreign` FOREIGN KEY (`BookID`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `uitleningen_userid_foreign` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`) ON DELETE CASCADE;


Figuur 11.Uitwerking van de database in een SQL statement. 
Lettertypen en -groottes en kleuren

In dit onderdeel beschrijf ik welke lettertype(n),groottes en kleuren ik ga gebruiken in mijn app.
Dit doe ik zodat bij toekomstig onderhoud en wijzigingen de huisstijl behouden kan worden die zorgt voor een uniforme uitstraling.
Ook beschrijf ik hier mijn gemaakte keuzes, zodat er in de toekomst wanneer er eventuele wijzigingen nodig zijn gekozen kan worden voor een passende vervanger die de uitstraling en identiteit van het bedrijf behoud.
Bij het kiezen van de lettertypen, groottes en kleuren houd ik rekening met de leesbaarheid en de Schaling naar diverse formaten. 
Fonts & lettergroottes

Ik heb gekozen voor font nummer 1 omdat deze voor mij kracht en duidelijkheid uitstraalt, en ik wil dat gebruikers bij het gebruik van mijn website het gevoel moeten hebben dat de app duidelijk is en krachtig is, dus dat hij niet snel crasht en dat ze op mijn website kunnen vertrouwen. Ik hou voor dit font een lettergrootte van 14px aan, zodat het duidelijk leesbaar is. Na onderzoek heb ik gekozen voor deze lettergrootte omdat dit lettertype gemiddeld vaker de voorkeur krijgt en beter leesbaar is.
Voor font nummer 2 heb ik gekozen om die te gebruiken voor mijn teksten die moeten opvallen, zoals quotes en titels. Dit font geeft mij het gevoel van exclusiviteit en een chique gevoel. Ik vind het belangrijk dat mijn website voor mijn gebruikers niet zomaar een website is maar dat de website duidelijk verschilt van andere soortgelijke websites. Ik wil ervoor zorgen dat de gebruikers van mijn website zich gehoord en gezien voelen en dat hoop ik met mijn website door het gebruik van dit font uit te stralen. Daarnaast moet mijn website zich onderscheiden van andere websites en naar mijn mening straalt dit font zich uit als iets exclusiefs, wat weer laat zien dat mijn website zich onderscheidt van de andere vergelijkbare websites. Omdat ik dit lettertype voornamelijk ga gebruiken voor titels en kopjes, krijgt dit lettertype de ‘H1’ en ‘h2’ lettergrootte mee.
De Kleuren
 Als gebruikers op jouw website komen, wil je dat gebruikers zich veilig voelen en uitgenodigd voelen om jouw website verder te bekijken.
Omdat gebruikers als eerste de kleuren zien is dit naast het gebruik van je fonts van grootste belang om deze kleuren met zorg uit te zoeken.
 
Figuur 12.De kleur blauw
Ik heb als eerste gekozen voor bovenstaande kleur blauw omdat de kleur blauw staat voor de kernwaarden betrouwbaar, rustgevend, en stabiliteit.
Dit zijn de kernwaarden die ik mee wil geven aan de gebruikers van mijn website, zodat zij zich welkom voelen om mijn website te bezoeken.
 
Figuur 13.De tweede kleur, wit
Als tweede kleur heb ik gekozen voor de kleur wit.
De kleur wit staat voor helderheid, elegantie, vrede.
Ik wil dat het voor mijn gebruikers duidelijk is waar de website voor dient (helderheid; het inzien van de geleende boeken in één oogopslag) en dat de website een gevoel geeft van het bijzonder (in de positieve vorm) te zijn (elegantie), en dat de website veilig is om te bezoeken (vrede).

De bedoeling is dat de hoofdkleur wit wordt, en de tekstkleur de blauwe kleur.

Daarnaast heb ik nog een paar extra kleuren die een bijzondere actie markeren.
Als de gebruikers op mijn website een actie ondernemen die niet correct is, wordt de melding gemarkeerd met een rode kleur (#007BFF).
Wanneer het nodig is om de aandacht van de gebruiker te vestigen op een bepaalde actie zal de melding oranje kleuren(#FFC107).
Wanneer de situatie het vraagt zal er een bevestiging aan de gebruiker gegeven worden zodat de gebruiker kennis heeft van de gebeurde situatie en het succesvolle resultaat daarvan.
De kleur van deze bevestiging zal een groen zijn (#28A745).
   
Figuur 14.De kleuren voor de bijzondere situaties (#007BFF,#FFC107,#28A745 (op volgorde))
Deployment diagram

Voor een volledige duidelijkheid van de werking van de website, heb ik een deployment diagram gemaakt, waarin beschreven staat welke hardware er nodig is voor het gebruik van de website en hoe de website en het systeem erachter in elkaar zit en met elkaar communiceert.
 
 
De gebruiker opent de webapplicatie in een browser op een laptop of computer. Dit apparaat draait lokaal en gebruikt XAMPP als serveromgeving. De browser stuurt een HTTP-verzoek naar de Apache Web Server, die de Laravel-applicatie uitvoert. De applicatie verwerkt het verzoek en haalt indien nodig gegevens op uit de MySQL-database via poort 3306. De opgehaalde data wordt verwerkt en als een teruggestuurd naar de browser. Wanneer een gebruiker bijvoorbeeld een boek leent stuurt Laravel een update naar de database, zodat de wijzigingen worden opgeslagen en later opnieuw kunnen worden opgehaald. 




 

Aanbevelingen over eisen, wensen en kwaliteitseigenschappen van het systeem

Om de kwaliteit van het systeem te garanderen beschrijf ik hier de eisen, wensen en kwaliteitseigenschappen waaraan het systeem voldoet.

Om de kwaliteit van de gebruikers van de website te garanderen adviseer ik om  bij het inloggen gebruikte maken van recaptcha, en om te zorgen voor een geldig certificaat zodat gebruikers de website vertrouwen en er minder toegang is voor zogenoemde bots.
Daarnaast adviseer ik om de wachtwoorden van de gebruikers te hashen wanneer deze worden opgeslagen in de database. Op die manier maken hackers geen kans mochten deze onverhoopt toegang krijgen tot de database.
Daarnaast adviseer ik om rekening te houden met de laadtijd van de website zodat gebruikers snel de website kunnen bekijken wanneer opgevraagd.
Dit komt het aantal potentiële bibliotheekklanten ten goede, gezien zij sneller de website bezoeken als deze snel geladen is.
Wanneer dit niet het geval is, zullen de bezoekers de website eerder weg klikken.
 

Acceptatietest

Om met zekerheid te kunnen zeggen dat het systeem compleet is en naar tevredenheid werkt,is er een acceptatie test vereist.
Met deze test kunnen we bewijzen dat het systeem werkt zoals gewenst.
Test
ID	Beschrijving	Acceptatie
criteria	Testgegevens	Verwachte resultaten	Test
resultaten	Opmerkingen	Getest door:
1	Een klant moet een account kunnen aanmaken	Een klant kan succesvol een account registreren	Naam, e-mail, wachtwoord	Account wordt aangemaakt en gebruiker ontvangt bevestiging			
2	Een klant moet kunnen inloggen op het systeem	Een klant kan succesvol inloggen met juiste gegevens	Geldige gebruikersnaam en wachtwoord	Toegang tot het systeem wordt verleend			
3	Een klant moet kunnen uitloggen uit het systeem	De klant kan zich succesvol afmelden	Ingelogde sessie	De gebruiker wordt afgemeld en teruggeleid naar de inlogpagina			
4	Een klant moet de boekencatalogus kunnen bekijken	De catalogus is zichtbaar en doorzoekbaar	Cataloguspagina openen	Een lijst van beschikbare boeken wordt weergegeven			
5	Een klant moet gedetailleerde informatie van een boek kunnen inzien	Klant kan details per boek bekijken	Boek selecteren uit catalogus	Boektitel, auteur, ISBN en status worden weergegeven			
6	Een klant moet boeken kunnen lenen	Klant kan een beschikbaar boek uitlenen	Geselecteerd boek, ingelogde gebruiker	Het boek wordt gemarkeerd als uitgeleend en gekoppeld aan de klant			
7	Een klant moet boeken kunnen inleveren	Klant kan een uitgeleend boek terugbrengen	Boek dat aan klant is gekoppeld	Boekstatus wordt gewijzigd naar "beschikbaar"			
8	Een klant moet een overzicht kunnen zien van geleende boeken	Klant kan een lijst met geleende boeken inzien	Ingelogde klant, geleende boeken	Een lijst met alle momenteel geleende boeken wordt weergegeven			
9	Het systeem moet de status van een boek updaten bij lenen/inleveren	Status moet correct veranderen	Actie: boek lenen/inleveren	Boekstatus verandert naar "geleend" of "beschikbaar"			
10	Het systeem moet geleende boeken koppelen aan gebruikersaccounts	Geleende boeken zijn gekoppeld aan de juiste gebruiker	Boek-ID, Gebruiker-ID	Het boek wordt gelinkt aan de juiste klant			
11	Het systeem moet de uitleengeschiedenis bijhouden	Alle eerdere uitleningen blijven geregistreerd	Eerdere uitleningen bekijken	Geschiedenis van geleende en teruggebrachte boeken zichtbaar			
12	Het systeem moet boetes kunnen berekenen bij te laat inleveren	Boete wordt correct berekend	Boektitel, uitleendatum, inleverdatum	Boete wordt getoond indien boek te laat is ingeleverd			
13	Een klant moet het "Boek van de Maand" kunnen bekijken	De klant kan het aanbevolen boek bekijken	Ingelogde klant	"Boek van de Maand" wordt correct weergegeven			



 


Interactief ontwerp

Het interactief ontwerp vindt u hier: https://xd.adobe.com/view/fbc8fa06-dd3f-4304-a35c-8417dda0b68a-ae9b/.

Bronnen
Voor naslagwerk en een garantie van de transparantie van mijn werk, heb ik hieronder de bronnen genoteerd.
De bronnen die ik heb gebruikt, zijn de volgende:
 	Chatgpt, ter ondersteuning.
 	Fonts.google.com
 	Wikipedia
 	Google images
 	Colorpicker (ingebouwd in de Google Chrome browser.)
 	https://www.sbdesignscreations.nl/de-betekenis-van-kleuren-kleurenmagie/ >> Voor informatie over de blauwe kleur.
 	https://toetontwerp.nl/kleuren/#:~:text=Wit%20staat%20voor%20helderheid%2C%20zuiverheid,met%20goedheid%2C%20onschuld%20en%20maagdelijkheid. >> Voor informatie over de witte kleur.
 	https://sysplatform.nl/website-maken/font-lettertype/#:~:text=Wil%20je%20de%20leesbaarheid%20van,een%20stuk%20vaker%20de%20voorkeur. >> Voor informatie over de lettertype grootte.
 	https://bloomsite.nl/website-maken-kennisbank/leesbaarheid/juiste-lettertype-grootte/ >> Voor nog meer informatie over de lettertype grootte.
