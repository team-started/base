# DDEV

Die aktuelle DDEV Dokumentation ist stehts unter https://ddev.readthedocs.io/en/latest/ zu finden. Daher werden nicht
alle Möglichkeiten/Optionen hier zusätzlich dokumentiert, sondern lediglich solche die häufig benötigt werden.

> Alle ddev Befehle werden direkt innerhalb eines Projektes ausgeführt

### Projekt starten

`ddev start`

Es ist möglich, je nach Leistung des eigenen Rechners mehrere Projekte gleichzeitig mit zu starten und laufen zu lassen.

### Projekt neu starten

`ddev restart`

Das neu starten von DDEV bzw. des Projektes ist meist dann notwendig, wenn ein Branch-Wechsel oder der aktuelle Stand
eines Branches heruntergeladen wird. Mit einem Neustart des Projektes ist gewährleistet, dass vorhandene 
Datenbankänderungen oder auch Composer/npm Änderungen eingespielt werden.

### Projekt stoppen/beenden

`ddev remove`

### Alle Projekte stoppen/beenden

`ddev poweroff`

Stoppt/Beendet alle laufenden Projekte.

### SSH-Key in Docker mappen

`ddev auth ssh`

Damit werden alle lokalen SSH-Keys in den Docker-Container des Projektes gemappet. Dies ist vorallem dann notwendig, wenn
Zugriff auf private Repositories notwendig ist. Aber auch um Projektdaten von Production oder Staging herunter zu laden.

### Projekt lokal zerstören

`ddev remove -RO`

Möchte man ein Projekt lokal entfernen muss dieses als erstes von DDEV "zerstört" werden. Es ist zu beachten, 
dass damit die Datenbank und Einträge in der Host-Datei entfernt werden. Anschließend kann das Projekt von 
Festplatte gelöscht werden


### Zugriff auf das Projekt von extern

`ddev share`

Es ist möglich externen Personen Zugriff auf das lokale Projekt zu gewähren. Ruf der externe Nutzer die generierte URL
auf, verhält es sich für diesen so, als würde er auf eine "normale" Website zugreifen.

### Ausführung im Docker-Container

`ddev exec <command>`

z.B. `ddev exec vendor/bin/typo3cms cache:flush`

Damit kann ein Befehl oder ein Skript vom lokalen Rechner in dem Docker Container ausgeführt werden.

### SSH in den Docker-Container

`ddev ssh`

### Mehrere DDEV-Versionen unter MacOS

* Voraussetzung: [Homebrew](https://docs.brew.sh/) installiert
* unter [DDEV Releases](https://github.com/drud/ddev/releases) die benötigte Version/Tag auswählen
* die Datei mit `ddev-x.x.x.sierra.bottle.tar.gz` herunterladen und entpacken
* entpackte Verzeichnis nach `/usr/local/Cellar/ddev/` kopieren
* auf der Konsole kann mit `brew switch ddev x.x.x` auf eine andere Version gewechselt werden