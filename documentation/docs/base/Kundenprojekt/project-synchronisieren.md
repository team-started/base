# Projektinstanzen synchronisieren

## Vorbereitungen

### SSH PublicKey auf den Server ablegen

Um die Synchronisation mit dem Zielserver (Production/Staging, etc.) einfach zu realisieren, muss der **eigene** SSH-PublicKey
auf dem Server in der Datei _authorized_keys_ hinterlegt werden.

Durch das Hinterlegen des PublicKey ist es möglich eine Verbindung zu einem Server ohne Eingabe eines Passwortes her
zustellen.

::: { .warning }
**Sicherheitshinweis:**
Da der Zugriff ohne Passwort funktioniert, sind die SSH-Keys sicher aufzubewaren und im Zweifel eines Datendiebstahls
sofort neu zu generieren bzw. auf dem Server zu entfernen!
:::

#### MacOS / Linux

Bei diesen beiden Betriebssystemen kann der Befehl

`ssh-copy-id -i ~/.ssh/id_rsa.pub SSH-USER@SSH-SERVER`

auf der Konsole (Shell) angegeben werden.

#### Windows

Unter Windows muss die Datei "id_rsa.pub" (C:\Users\<username>\.ssh\) mit einem Editor geöffnet und der vollständige Inhalt kopiert werden. Anschließend
kann mittels (S)FTP der kopierte Inhalt in die Datei _authorized_keys_ auf dem Server eingefügt werden.


#### Test des Logins

Nachdem der PublicKey auf dem Zielserver hinterlegt wurde, kann mittels

`ssh SSH-USER@SSH-SERVER`

geprüft werden, ob eine SSH-Verbindung ohne Angabe eines Passworts möglich ist.


### Konfiguration der Sh-Skripte

Um die Funktion nutzen zu können, muss die _config.sh_ im Ordner _craft/_ konfiguriert werden. Das PHP-Binary ist je
nach Hoster unterschiedlich, eine aktuelle Liste befindet sich in den [FAQ unter PHP Binary nach Hoster](../Faq/index.md).

Die einkommentierten Anweisungen müssen nur ausgefüllt und auskommentiert werden, sofern zusätzlich zu Production und
Staging ein weiterer Remote benötigt wird.

```sh
# PHP binary configuration
export REMOTE_PRODUCTION_BINARY=
export REMOTE_STAGING_BINARY=
#export REMOTE_EXAMPLE_BINARY=

# remote SSH user
export REMOTE_PRODUCTION_USER=
export REMOTE_STAGING_USER=
#export REMOTE_EXAMPLE_USER=

# remote server (uri or IP-Address)
export REMOTE_PRODUCTION_SERVER=
export REMOTE_STAGING_SERVER=
#export REMOTE_EXAMPLE_SERVER=

# e.g. /home/www/html/typo3/production/releases/current
export REMOTE_PRODUCTION_PATH=
export REMOTE_STAGING_PATH=
#export REMOTE_EXAMPLE_PATH=

# e.g. /home/www/html/typo3/production/shared
export REMOTE_PRODUCTION_DATA_PATH=
export REMOTE_STAGING_DATA_PATH=
#export REMOTE_EXAMPLE_DATA_PATH=
```

### Optionale Zusatzkonfiguration

Eine optionale Zusatzkonfiguration befindet sich in den DDEV Environments unter _/.ddev/docker-compose.web.yaml_. Wird
der/die Wert(e) der Variablen _IGNORE_BE_USER_DSGVO_ und/oder _IGNORE_FE_USER_DSGVO_ auf **1** gesetzt, werden entsprechend
die Backend- und/oder Frontend-User ebenfalls heruntergeladen.

::: { .info }
Aus Datenschutzgründen ist dieser Werte per Default auf **0** gestellt
:::

### Fehler während der Ausführung

Da die Sh-Skripte innerhalb des Docker-Containers ausgeführt werden, muss ggf. der Befehl

`ddev auth ssh`

ausgeführt werden. Dadurch werden die SSH-Keys in den Docker-Container gemapped und stehen dort zur Verfügung.


## Lokale Instanz synchronisieren

Das **lokale** Projekt kann mittels SSH Zugang mit dem Production oder Staging System synchronisiert werden. Dabei werden
alle Daten aus dem _fileadmin_ und dem _uploads_ Ordner, sowie _Datenbank_ von der jeweiligen Instanz auf den lokalen
Rechner heruntergeladen.

::: { .info }
Für eine korrekte Ausführung muss das Projekt mit DDEV gestartet worden sein!
:::

Auf der Konsole (Shell), innerhalb des Projekt-Root mit dem Befehl

* `ddev pulldata production` oder
* `ddev pulldata staging`

den entsprechenden Datenbestand herunterladen und die Datenbank (automatisiert) einspielen.


## Production und Staging synchronisieren

::: { .info }
Für eine korrekte Ausführung muss das Projekt mit DDEV gestartet worden sein!

Ebenfalls ist es zwingend notwendig,
das sowohl auch Production als auch auf Staging bereits TYPO3 mit der TYPO3-Console läuft!
:::

Es gibt auch die Möglichkeit die Daten zwischen **Production** und **Staging** zu synchronisieren (in beide Richtungen).

### Staging mit Production synchronisieren

Damit alle Daten von Production **nach** Staging kopiert werden, wird ein Bash-Skript genutzt. Hierbei
wird ein Datenbank-Backup auf Production durchgeführt und in Staging eingespielt. Ebenfalls werden alle Dokumente aus
__fileadmin__ und __uploads__ von Production nach Staging kopiert.

`ddev sync-prod-to-stage`

### Production mit Staging synchronisieren

Wie beim oberen Fall **Staging mit Production synchronisieren** werden hier die Daten von Staging **nach** Production
kopiert.

::: { .warning }
Mit diesem Skript werden **alle Daten** auf Production durch die Daten auf Staging ersetzt!
:::

`ddev sync-stage-to-prod`
