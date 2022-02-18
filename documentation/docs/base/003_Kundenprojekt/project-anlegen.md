# Erstellung eines neues Kundenprojektes

## Anlegen des Projekt in Gitlab

Ein neues Kundenprojekte kann entweder in einem persönliches Git-Repository oder in dem
Team-Repository (https://gitlab.com/starterteam/) angelegt werden. Zur besseren Übersicht
sollte sich jedes Teammitglied einen Ordner im Team-Repository anlegen und in diesem seine
Kundenprojekte ablegen.

Während des anlegens des Kundenprojektes ist darauf zu achten, dass keine Umlaute oder
Sonderzeichen im Projektnamen enthalten sind.

Weiterhin sollte darauf verzichtet werden, den Domainnamen als Projektnamen (in voller
Schreibweise) zu nutzen.

### Vorteile des Team-Repository

Das Team-Repository hat den Vorteil, dass jedes Teammitglied auf das Projekt Zugriff hat,
wodurch die eine separate Freigabe mit andere Teammitglieder nicht notwendig ist.

## Projekt lokal initialisieren

#### Vorlagen herunter laden

* Download der gewünschten Version [Starter-Distribution](https://gitlab.com/starterteam/Starter-Distribution/-/tags)
* Zip-Datei entpacken und Ordnernamen entsprechend dem Projekt anpassen

#### Projekt konfigurieren

Das Projekt muss nun noch initial an ein paar Stellen konfiguriert werden.

##### DDEV

> `ddev config` und Anweisungen folgen

In der Datei _/.ddev/docker-compose.web.yaml_ können optional die Variablen `IGNORE_BE_USER_DSGVO` und `IGNORE_FE_USER_DSGVO`
von `0` auf `1` gestellt werden. In [Kundenprojekt synchronisieren](./project-synchronisieren.md) wird die Nutzung und Bedeutung
genauer beschrieben.

##### Composer

In der _composer.json_ (liegt im Projekt-Root) muss der "name" angepasst werden. Der Vendor (starterteam) kann bleiben
jedoch muss der Projektname (starter-distribution) durch euren individuellen Projektname ersetzt werden. Es ist durch
sinnvoll den gleichen Namen wie im Git-Repository zu nutzen

Ebenfalls sollte die genutzte PHP-Version (default 7.2) in der _composer.json_ auf das aktuelle Projekt angepasst werden.


## Projekt "vergitten"

Nun kann das Projekte als neues Projekt "vergittet" und in das entsprechende Repository geladen
werden.

1. `git init` (initialisiert das lokale Git-Repository)
1. `git remote add origin <remote-repository>` (definiert die Git-Repository URL)
    1. z.B. `git remote add origin git@gitlab.com:starterteam/chriwo/my-project.git`
1. `git add .` (fügt alle Dateien/Verzeichnisse dem Git-Repository hinzu)
1. `git commit -m "[TASK] Initialize project"` (erstellt einen Commit mit neuen Dateien/Verzeichnissen)
1. `git push -u origin master` (überträgt den erstellten Commit in das Remote-Git-Repisitory)
