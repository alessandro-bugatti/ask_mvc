# ask_mvc
Piccolo framework MVC di esempio, costruito per mostrare come costruire applicazioni PHP che seguono il *pattern* **MVC**.

## Come installarlo e farlo funzionare
Scaricare tutti i file da GitHub e copiarli in una cartella all'interno della *root* del web server.

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
