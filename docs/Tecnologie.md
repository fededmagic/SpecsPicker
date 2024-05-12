# PC HARDWARE SPECIFICATIONS FOR A REQUIRED SOFTWARE

Federico Dutto – Thomas Pashollari 5°A Inf

## Obiettivo del progetto:
Realizzare una web app che permetta di ottenere i requisiti minimi hardware per un determinato
software preso in input.

## Materiale:

* ***Linguaggi utilizzati*** \
Attualmente, date le nostre competenze in ambito informatico, per realizzare il nostro progetto il
linguaggio che consiglio di utilizzare è PHP. Questo linguaggio ci servirà per gestire il backend
dell’applicazione, grazie soprattutto alle sue caratteristiche che lo hanno contraddistinto negli anni.
Infatti PHP è noto per la semplicità d’uso, per avere un ampio supporto per i database, un
numerosissimo numero di estensioni/librerie e una buona gestione della sicurezza e delle sessioni.
Inoltre è stato scelto questo linguaggio in quanto garantisce un’ottima velocità di esecuzione.

* ***Framework di sviluppo*** \
Lavorando con PHP, il framework che utilizzeremo sarà Laravel, in quanto possiede le
caratteristiche adatte al progetto che stiamo realizzando.
Per prima cosa, troviamo Eloquent, un sistema di ORM che serve a semplificare l’interfacciamento
con i nostri DB. Inoltre questo framework implementa una gestione del middleware che permette di
filtrare le rischieste HTTP. Questo inoltre ci aiuta con il buon sistema di autenticazione e di gestione
delle sessioni che Laravel offre.

* ***Librerie con cui lavorare & API*** \
WEB scraping API di GTP4 fornite da Raripd API, possibilmente supportate da AI, per logica applicativa, in modo da ottenere
specifiche dal web. Sono utilizzate per estrarre da pagine HTML determinate informazioni
desiderate. Questa operazione, fondamentale per raggiungere l’obiettivo del progetto, è denominata
“parsing HTML”.

* ***Strumenti di autenticazione*** \
  Come stumento di autenticazione abbiamo usato "Laravel Authentication".
  Il seguente sistema è un componenete integrato che fornisce un modo semplice e flessibile
  per gestire l'autenticazione degli utenti nelle applicazioni web.
   Con poche configurazioni, Laravel offre funzionalità complete di registrazione, accesso, recupero password e gestione sessioni,
  aiutando gli sviluppatori a implementare rapidamente e in modo sicuro l'autenticazione nei loro progetti.

* ***DB relazionale*** \
Eventualmente in aggiunta, utilizzeremo MariaDB, un sistema di gestione di database relazionali open source (è una
fork di MySQL).
La scelta è stata dettata dalla buona integrazione con il framework Laravel, grazie anche allo strato
software Eloquent. Inolre include funzionalità di sicurezza avanzate, come la crittografia dei dati,
l'accesso basato su ruoli e altre caratteristiche per proteggere il database da accessi non autorizzati.

