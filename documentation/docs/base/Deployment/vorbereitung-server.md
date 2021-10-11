## Vorbereitungen auf dem Zielserver

## SSH-Keys erstellen

Für jedes Projekt muss ein separater, nicht Passwort geschützter SSH-Key generiert werden.

> Es ist unbedingt darauf zu achten, dass vorhandene Keys nicht überschrieben werden

Die Generierung erfolgt mittels des Befehls `ssh-keygen -t rsa -b 4096`, welcher auf dem lokalen Rechner
ausgeführt wird.

![SSH-Keys erstellen](../assets/images/ssh-key-generation.png =500x268)


### SSH-Public-Key ablegen

Der Private-Key wird für die CI konfiguration genutzt und der Public-Key auf dem Server zu den
authorized_keys hinzugefügt. Das hinzufügen des Public-Keys auf dem Server kann mittels des Shell-Befehl

`ssh-copy-id -i <private_key_file> ssh-user@host`

durchgeführt werden.

### SSH-Private-Key ablegen

Das ablegen des SSH-Private-Key wird unter [Deployment einrichten](./gitlab.md) beschrieben.


## Ordnerstruktur

Bevor das erste Deployment gestartet werden kann, muss auf dem entsprechenden Zielserver eine Ordnerstruktur
geschaffen werden. Von dieser grundlegenden Struktur darf nicht abgewichen werden, da die automatisierten Skripte
diese Struktur und Benennung voraussetzen.

Auf dem Zielserver ist initial folgende Struktur anzulegen, wobei sich in diesem Beispiel die
Production- und Staging-Instanz auf dem gleichen Server befinden:

![Ordnerstruktur auf dem Server](../assets/images/server-deployment-structure.png =300x420)


## Domainkonfiguration

Nach dem manuellen anlegen der Ordnerstruktur kann nun in der Domain-Konfiguration der Zielpfad angegeben werden. Dazu
muss man sich bei seinem Hoster in die Accountverwaltung einloggen und das entsprechende Projekt heraussuchen und die
Domain-Einträge bearbeiten. Der Zielpfad sollte anschließend wie folgt aussehen:

* /typo3/production/releases/current/public/ (für Production)
* /typo3/staging/releases/current/public/ (für Staging)

#### Löschen des "current"-Ordners

Der Ordner current und sein(e) Unterordner müssen nun wieder gelöscht werden, damit während des Deployments die
Release-Ordner automatisiert erstellt werden können.

## Datenbanken anlegen

Sollte die Production- und Staging-Instanz auf dem gleichen Server bzw. Kundenaccount sein, müssen nun
2 Datenbanken angelegt werden. Beim Anlegen der Datenbanken sollte ein Hinweis hinterlegt werden, welche Datenbank
für Production und welche für Staging benutzt wird.

## Zugangsdaten in den Environments (.env)

In den Verzeichnisse

* /production/shared/conf/ und
* /staging/shared/conf/

ist jeweils eine Datei mit dem Namen _.env_ anzulegen. In dieser Datei werden nun die Umgebungsvariablen
(enviromental variables) definiert, wobei die Variablenname nicht verändert werden dürfen.

> * Sollte ein einzutragender Wert Sonderzeichen enthalten, so ist der gesamte Wert mit doppelten Anführungsstrichen (") zu umschließen
> * Ebenfalls ist es wichtig darauf zu achten, keine Leerzeichen vor und nach dem Gleichzeichen (=) zu setzen.

Eine Beispieldatei befindet sich innerhalb des Projektes unter `/.surf/.env_example`.

```sh
TYPO3_CONTEXT=
TYPO3_INSTALL_TOOL_PASSWORD=
TYPO3_TRUSTED_HOSTS_PATTERN=
TYPO3_GFX_PROCESSOR=ImageMagick
TYPO3_GFX_PROCESSOR_PATH=/usr/bin/
TYPO3_GFX_PROCESSOR_PATH_LZW=/usr/bin/
TYPO3_GFX_PROCESSOR_COLORSPACE=sRGB
TYPO3_DB_DEFAULT_HOST=
TYPO3_DB_DEFAULT_USER=
TYPO3_DB_DEFAULT_PASSWORD=
TYPO3_DB_DEFAULT_PORT=3306
TYPO3_DB_DEFAULT_DBNAME=
TYPO3_BE_WARNING_EMAIL_ADDR=
TYPO3_BE_WARNING_MODE=
TYPO3_MAIL_DEFAULT_MAIL_FROM_ADDRESS=
TYPO3_MAIL_DEFAULT_MAIL_FROM_Name=
```

#### Beispiel-Konfiguration mit Environments für eine Staging-Instanz

```sh
TYPO3_CONTEXT="Production/Staging"
TYPO3_INSTALL_TOOL_PASSWORD=joh316
TYPO3_TRUSTED_HOSTS_PATTERN=
TYPO3_GFX_PROCESSOR=ImageMagick
TYPO3_GFX_PROCESSOR_PATH=/usr/bin/
TYPO3_GFX_PROCESSOR_PATH_LZW=/usr/bin/
TYPO3_GFX_PROCESSOR_COLORSPACE=RGB
TYPO3_DB_DEFAULT_HOST=db1111.mydbserver.com
TYPO3_DB_DEFAULT_USER=usr_p000000
TYPO3_DB_DEFAULT_PASSWORD="ein%besonderes?passwort"
TYPO3_DB_DEFAULT_PORT=3306
TYPO3_DB_DEFAULT_DBNAME=usr_p000000_p2
TYPO3_BE_WARNING_EMAIL_ADDR=
TYPO3_BE_WARNING_MODE=
TYPO3_MAIL_DEFAULT_MAIL_FROM_ADDRESS="noreply@kundendomain.com"
TYPO3_MAIL_DEFAULT_MAIL_FROM_Name="dummy kundenname"
```

> Weiterführende Themen
> * [Deployment](./index.md)
> * [Deployment einrichten](./gitlab.md)
> * [Konfiguration Gitlab-CI](./gitlab-ci.md)
