<?php require_once('includes/header.php') ?>

    <div class="container valuation-container">
        <h1>Vrednovanje</h1>

        <h6>Izrada klijentskog dela web aplikacije</h6>
        <div class="table-responsive">
            <table class="table ">
                <thead>
                <tr>
                    <th scope="col">Broj</th>
                    <th scope="col">Zahtev</th>
                    <th scope="col">Ispunjenost</th>
                    <th scope="col">Poena</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Izrada responzivnog Web-sajta, sa najmanje 6 Web-stranice kojima se pristupa iz horizontalnog
                        menija
                    </td>
                    <td>Da</td>
                    <td>1</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Pristupna stranica treba da sadrži „slajder“ (karusel) sa mogućnošću pristupa određenim Web
                        sadržajima
                    </td>
                    <td>Da</td>
                    <td>1</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Realizovati odgovarajuću stilizaciju Web stranica za 3 prelomne tačke (mobilni, tablet i desktop
                        računar).
                    </td>
                    <td>Da</td>
                    <td>1</td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>Kreirati kontakt forme na Web stranicama (registracija, prijavljivanje korisnika i pretraživanje
                        aplikacione baze podataka) sa ispitivanje unetog sadržaja u input poljima na klijentskoj strani
                        koristeći JavaScript i nove HTML 5 događaje.
                    </td>
                    <td>Da</td>
                    <td>1</td>
                </tr>
                <tr>
                    <th scope="row">5</th>
                    <td>Web-stranica Vrednovanje treba da sadrži tabelu ispunjenosti zahteva iz ovog dokumenta.</td>
                    <td>Da</td>
                    <td>1</td>
                </tr>
                <tr>
                    <th scope="row">6</th>
                    <td>Pripremiti Web stranice za buduće korišćenje serverskih Web tehnologija.</td>
                    <td>Da</td>
                    <td>1</td>
                </tr>
                <tr>
                    <th scope="row">7</th>
                    <td>Za realizaciju zahtevanih funkcija koristiti programski paket Bootstrap Studio.</td>
                    <td>Da</td>
                    <td>1</td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td><b>Suma</b></td>
                    <td><b>7</b></td>
                </tr>
                </tbody>
            </table>
        </div>

        <h6>Izrada MySQL  baze podataka sa pristupnim i aplikacionim podacima </h6>
        <div class="table-responsive">
            <table class="table ">
                <thead>
                <tr>
                    <th scope="col">Broj</th>
                    <th scope="col">Zahtev</th>
                    <th scope="col">Ispunjenost</th>
                    <th scope="col">Poena</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>U programskom okruženju XAMP-a (WAMP-a) kreirati aplikacionu bazu podataka pod svojim imenom koristeći DBMS MySQL sa komandne linije. </td>
                    <td>Da</td>
                    <td>1</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>U kreiranoj bazi dodati tabelu za autentifikaciju korisnika obaveznim poljima Ime, Prezime, Korisničko_ime, lozinka, Password_has, vreme_kreiranja, ...</td>
                    <td>Da</td>
                    <td>1</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>U kreiranoj bazi dodati tabelu za proizvode (ili usluge) vezane za aplikaciju. Tabela proizvoda mora da sadrži sledeće kolone: Ime proizvoda, ID proizvoda, Klasa proizvoda, Opis proizvoda, Datum skladištenja, Datum proizvodnje, Količina, ... koje će biti korišćene za pretraživanje.</td>
                    <td>Da</td>
                    <td>1</td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>Korišćenjem SQL upita sa komandne linije popuniti bazu sa 10 korisnika i 10 proizvoda.</td>
                    <td>Da</td>
                    <td>1</td>
                </tr>
                <tr>
                    <th scope="row">5</th>
                    <td>Koristite PHPMyAdmin za verifikaciju unesenih podataka.</td>
                    <td>Da</td>
                    <td>1</td>
                </tr>
                <tr>
                    <th scope="row">6</th>
                    <td>Koristite PHPMyAdmin da dodate još 10 korisnika i 10 novih proizvoda.</td>
                    <td>Da</td>
                    <td>1</td>
                </tr>
                <tr>
                    <th scope="row">7</th>
                    <td>Sa komandne linije pretražiti tabele po svim kolonama. Tabelarno prikazati dobijene rezultate pretrage za urađene primere. Tabela treba da se nalazi na Web-strani vrednovanje.</td>
                    <td>Da</td>
                    <td>1</td>
                </tr>
                <tr>
                    <th scope="row">8</th>
                    <td>Koristeći PHPMyAdmin spakovati bazu sa lokalnog servera i preneti na MySQL server predmeta u vaš pod-folder.</td>
                    <td>Da</td>
                    <td>1</td>
                </tr>
                <tr>
                    <th scope="row">9</th>
                    <td>Koristeći udaljeni pristup proveriti konektivnost vaše baze i tabela. Obaviti niz pretraga sa komandne linije Vaše baze podataka na serveru predmeta.</td>
                    <td>Da</td>
                    <td>1</td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td><b>Suma</b></td>
                    <td><b>9</b></td>
                </tr>
                </tbody>
            </table>
        </div>

        <h6>Programiranje na strani servera - izrada kompletnog dinamičkog Web-sajta sa integrisanom bazom podataka</h6>
        <div class="table-responsive">
            <table class="table ">
                <thead>
                <tr>
                    <th scope="col">Broj</th>
                    <th scope="col">Zahtev</th>
                    <th scope="col">Ispunjenost</th>
                    <th scope="col">Poena</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Kreirati PHP skript za prihvatanje podataka unetih u HTML forme na klijentskoj strani
                    </td>
                    <td>Da</td>
                    <td>1</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Napisati PHP skript za proveru unetih podataka na serveru. Za proveru koristiti tehniku -  Regular Expression. 
                    </td>
                    <td>Da</td>
                    <td>1</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Koristeći Vašu bazu podataka i tabelu korisnika identifikovati korisnika. Neregistrovanog korisnika uputite na stranu za registraciju. Registrovanom korisniku dopustite pristup ostalim delovima Web-sajta. 
                    </td>
                    <td>Da</td>
                    <td>1</td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>Na Web-stranici Pretraživanje omogućite kontaktiranje tabele sa proizvodima u vidu forme za pretraživanje. Obezbedite pretraživanje po svim kriterijumima (kolonama) iz tabele.
                    </td>
                    <td>Da</td>
                    <td>1</td>
                </tr>
                <tr>
                    <th scope="row">5</th>
                    <td>Štampajte rezultate pretrage u formi tabele u unapred predviđenom delu Web-stranice koristeći AJAX</td>
                    <td>Da</td>
                    <td>1</td>
                </tr>
                <tr>
                    <th scope="row">6</th>
                    <td>Kreirajte administratorski deo Web-sajta za upravljanje korisničkim nalozima: dodavanje, korigovanje i brisanje. Za kreiranje Password_has polja koristite PHP funkcije password_has() i password_verify().</td>
                    <td>Da</td>
                    <td>1</td>
                </tr>
                <tr>
                    <th scope="row">7</th>
                    <td>Iz razvojnog okruženja PHP Web projekat preneti u produkciono okruženje</td>
                    <td>Da</td>
                    <td>1</td>
                </tr>
                <tr>
                    <th scope="row">8</th>
                    <td>Kreirajte administratorski deo Web-sajta za upravljanje proizvodima:  dodavanje, korigovanje i brisanje.</td>
                    <td>Da</td>
                    <td>1</td>
                </tr>
                <tr>
                    <th scope="row">9</th>
                    <td>Kreirajte administratorski deo Web-sajta za ažuriranje baze posle prodaje proizvoda.</td>
                    <td>Da</td>
                    <td>1</td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td><b>Suma</b></td>
                    <td><b>9</b></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

<?php require_once('includes/footer.php') ?>