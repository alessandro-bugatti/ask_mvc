# ask_mvc
Piccolo framework MVC di esempio, costruito per mostrare come costruire applicazioni PHP che seguono il *pattern* **MVC**.

- [Come installarlo e farlo funzionare](come-installarlo-e-farlo-funzionare)
- [Come contribuire](come-contribuire)

# Come installarlo e farlo funzionare
### Installazione dei file PHP
Ci sono due modalità per questo primo passaggio, elencate qua sotto:
#### Modalità semplice
Andare nella sezione [release](https://github.com/alessandro-bugatti/ask_mvc/releases) e scaricare il file zip più recente, scompattarlo all'interno della propria cartella *root* del web server e procedere con le istruzioni sotto. Il "problema" di questa modalità è che le release non è detto che vengano tenute aggiornate con le ultime modifiche fatte nel repository
#### Modalità meno semplice
Scaricare tutti i file da GitHub e copiarli in una cartella all'interno della *root* del web server, successivamente utilizzare Composer per l'installazione delle libreria Plates.

### Caricare il database
Tra i file presenti nella cartella principale si trova anche un file esportato dal database di esempio che si chiama **ask.sql**. Deve essere importato all'interno del proprio database MySQL e eventualmente va creato un utente con i permessi corretti d'accesso. Le informazioni sulla connessione si trovano nel file [Util/Connection.php](https://github.com/alessandro-bugatti/ask_mvc/blob/master/Util/Connection.php) e da lì possono essere adattate nel modo che si ritiene corretto per la propria configurazione

### Configurazione della root del server
Premessa: a seconda di dove verranno messi i file, alla radice del server web o in una sottocartella, alcune link potrebbero non funzionare, poichè se li si mettono *relativi* assumono forme sbagliate in relazione al file nel quale sono inclusi, che può essere a profondità diverse, d'altronde se li avessi messi *assoluti* ci sarebbe stata la necessità di "installare" l'applicazione nella posizione scelta da me. La soluzione adottata è stata quella di avere una variabile di configurazione messa nel file [conf/config.php](https://github.com/alessandro-bugatti/ask_mvc/blob/master/conf/config.php) di nome **$ROOT** che deve contenere al suo interno il nome della cartella dove sono stati copiati i file dell'applicazione.

Esempi:
* Se tutti i file sono copiati nella root del web server (la cartella *htdocs* in XAMPP o /var/www/html in alcune distribuzioni Linux) allora il settaggio corretto è $ROOT = "";
* Se tutti i file sono copiati nella sottocartella *ask_mvc* allora il settaggio corretto sarebbe $ROOT = "/ask_mvc";
* Se tutti i file sono copiati nella sottocartella *PHP/ask_mvc* allora il settaggio corretto sarebbe $ROOT = "/PHP/ask_mvc";
Spero di aver reso l'idea...

A  questo punto nei vari template, dove servisse creare dei link, è stato definita una funzione che può essere chiamata in modo da aggiungere la radice e creare il percorso corretto. Questa funzione si chiama *root_path* e può essere usata nel seguente modo:

```php
<form action="<?=$this->root_path()?>/question/add" method="post">
```

In questo esempio la *action* della form avrà ad esempio il valore /ask_mvc/question/add se $ROOT è uguale a /ask_mvc.

# Come contribuire
Questa sezione è per gli studenti che volessero contribuire aggiungendo del proprio codice: credo che contribuire abbia un ottimo valore didattico, perchè permette di usare git in maniera più realistica, permette di vedere come funziona la collaborazione nella scrittura di codice a più mani e magari è anche divertente.
Come procedere:
- fare un fork di questo repository
- decidere su quale aspetto si vuole lavorare o vedere se c'è già un issue aperto che può interessare
- se ci fosse già un issue aperto di interesse non ancora assegnato, proporsi per risolverlo
- se invece si vuole proporre un nuovo issue iniziare a descrivere bene cosa si vuole fare, che poi ve lo assegno
- NON procedere in maniera autonoma, altrimenti si rischia poi di non riuscire a fare un merge pulito, ma di avere proprie modifiche che si vanno a sovrapporre a quelle di altri
- una volta capito cosa fare creare un nuovo branch nel proprio repository e procedere con il codice.
- una volta finito seguire le indicazioni che trovate [qua](https://gist.github.com/Chaser324/ce0505fbed06b947d962), in cui è indicato come procedere per arrivare a una pull-request fatta verso questo repository.
- A questo punto parte una discussione su quanto fatto con eventuali richieste di modifiche e quando si arriva a un punto soddisfacente la pull-request verrà integrata nelle modifiche
