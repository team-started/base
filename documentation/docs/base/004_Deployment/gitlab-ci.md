# Konfiguration im Kundenprojekt

In jedem Kundenprojekt ist die Datei gitlab-ci.example.yml vorhanden. Vor der Nutzung des Deployments muss diese
Datei in gitlab-ci.yml umbenannt werden.

Diese Datei definiert die unterschiedlichen Jobs in der Gitlab-CI Pipiline und kann je nach Projekt angepasst werden.
Nachfolgend wird beschrieben welche Jobs allgemein vorhanden sind und an welchen Stellen je nach Projekt Anpassungen
vorzunehmen sind.

## Deployment Jobs

In der **.gitlab-ci.yml** sind 2 Stages definiert, *build* und *deploy*, welche unterschiedliche Aufgaben haben.



### Job: build

> Wird automatisch gestartet!

Der build-Stage wird genutzt um eine Prüfung des geschriebenen Sass und JavaScript Codes durchzuführen. Dazu werden
die Linter *eslint* (JavaScript) und *stylelint* (CSS/Sass) genutzt. Anhand von definierten Regeln prüfen diese Linter
ob die Schreibweisen und Einrückungen des Codes korrekt sind.

> Gibt es in diesem Stage keine Fehler, kann der Job *deploy_to_staging* oder *deploy_to_production* ausgeführt werden!

Dieser Stage wird nur dann ausgeführt und ist in der Gitlab-CI GUI sichtbar, wenn es Änderungen in den Verzeichnissen
*/packages/NAME-DES-SITEPACKAGE/Build/Assets/JavaScript/* und/oder */packages/NAME-DES-SITEPACKAGE/Build/Assets/Sass/*
gibt.



### Job: deploy_to_staging

> Muss manuell gestartet werden!

Dieser Job überträgt die Applikation (Website) aus dem Git-Repository auf das Zielsystem "Staging". "Staging" ist das
System auf welchem der Kunde die Abnahme des Projektes vor nimmt.



##### Default Einstellungen

| Einstellung | Wert               |
| :-------    | :----------------- |
| Ausführung  | Manuell            |
| Context     | Production/Staging |
| Source      | Commit             |
| Releases    | 2                  |
| Tasks       | fixAccessRightsTask<br>fixFolderStructureTask<br>copyContextFileTask<br>frontendInstallTask |



### Job: deploy_to_production

Mit diesem Job wird die Applikation (Website) auf das produktive Zielsystem übertragen und die Applikation ist live.

##### Default Einstellungen

| Einstellung | Wert               |
| :-------    | :----------------- |
| Ausführung  | Manuell            |
| Context     | Production         |
| Source      | Commit             |
| Releases    | 5                  |
| Tasks       | fixAccessRightsTask<br>fixFolderStructureTask<br>copyContextFileTask<br>frontendInstallTask |


## Tasks

Für das Deployment zum jeweiligen Zielserver (Production oder Staging) stehe verschiedene Task zur Verfügung, welche
je nach Zielserver genutzt werden können.

Die Tasks werden in der Datei **.gitlab-ci.yml** in der Variable *DEPLOYMENT_TASKS* kommata separiert definiert. Die
Reihenfolge der Definition ist nicht relevant, da dies bereits innerhalb der Surf-Deployment-Beschreibung festgelegt
ist.

##### Task: copyContextFileTask

> Status: Default aktiv

Dieser Task kopiert die Datei **.htaccess** aus dem Verzeichnis */build/deployment/ZIEL-STAGE/* in das Web-Root
Verzeichnis. Daher ist es möglich je nach Zielserver unterschiedliche Konfigurationen für die **.htaccess** zu nutzen.

Sofern der ZIEL-STAGE nicht das Production-System ist, wird ebenfalls, falls vorhanden die Datei **.htpasswd** in das
Web-Root Verzeichnis kopiert.

##### Task: copyIndexFileTask

> Status: Default inaktiv

Bei einigen Hostingpartner wird der Symlink auf die **index.php** nicht erlaubt (z.B. DomainFactory, jWeiland). Daher
löscht dieser Task diesen Symlink und kopiert die **index.php** Datei aus dem TYPO3-Core in den Web-Root.

##### Task: fixAccessRightsTask

> Status: Default aktiv

Passt die Datei- und Ordnerzugriffsrechte während des Deployments an. Damit wird gewährleistet das auf alle notwendigen
Dateien und Ordner gelesen und geschrieben werden kann (z.B. typo3temp Ordner).

##### Task: fixFolderStructureTask

> Status: Default aktiv

In den Git-Repositories sind nicht alle Verzeichnisse enthalten welche TYPO3 benötigt, daher erstellt dieser Task alle
notwendigen Ordner.

##### Task: frontendInstallTask

> Status: Default aktiv

Dieser Task kompiliert die CSS und JavaScript Dateien, sowie die Icons und Grafiken die für das Layout notwendig sind und
legt dieser Dateien innerhalb der Extension *customer_sitepackage* ab.

##### Task: prepareDatabaseTask

> Status: Default inaktiv

In dem Verzeichnis */build/deployment/ZIEL-STAGE/* kann eine Datei **db-prepare.sql** abgelegt werden, in welcher
bestimmte SQL-Befehle auf der Datenbank abgesetzt werden können.

##### Task: updateLanguageTask

> Status: Default inaktiv

Mit diesem Task werden die Sprachpakete für TYPO3-Core, als auch für alle installierten Extension während des Deployments
aktualisiert.

Dieser Task kann u.U. fehlschlagen, wenn der Translation-Server von TYPO3 nicht erreichbar ist und somit würde entweder
das Deployment abbrechen oder es steht nur die Default-Sprache (englisch) zur Verfügung.

Daher hat es sich als bewährt gezeigt die Aktualisierung der Sprachpakete lokal auszuführen und die Änderungen mit im
Git-Repository zu speichern.

## Definition der SitePackages

In der Variable **SITE_PACKAGE_DIRECTORIES** werden kommata separiert die Ordnernamen der Kunden-Extensions (SitePackages)
aufgeführt. Per Default ist **customer_sitepackage** immer definiert. Bei einer MultiDomain Installation mit mehreren
Sitepackages muss die Liste entsprechend erweitert werden, damit alle FrontendInstallTasks ausgeführt werden.


> Weiterführende Themen
> * [Deployment](./index.md)
> * [Vorbereitung auf dem Zielserver](./vorbereitung-server.md)
> * [Deployment einrichten](./gitlab.md)
