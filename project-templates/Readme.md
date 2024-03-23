# TYPO3 Projekt - starter-base

## 1. Domain Übersicht

| System      | URL                                                                                                                               |
| ----------  |-----------------------------------------------------------------------------------------------------------------------------------|
| Production  |                                                                                                                                   |
| Staging     |                                                                                                                                   |
| Development | https://starter-base.ddev.site<br>Mailpit: https://starter-base.ddev.site:8025<br>phpMyAdmin:	https://starter-base.ddev.site:8036 |

## 2. Hostingpartner

| System      | Hoster        |
| ----------  | --------------|
| Production  |  |
| Staging     |  |


## 1. Verwendung

### 1.1 Systemvoraussetzungen für lokale Entwicklung

* [ddev][1] Version 1.22.7

### 1.2 Installation

> Dieser Installationsschritt nur notwendig, wenn das Projekt lokal nicht vorhanden ist

* Download des Projektes mittels `git clone ###REPO-URL###`
* Auf der Konsole (Shell) in das eben erstellte Verzeichnis wechseln
* Projekt starten mit `ddev start`

### 1.3 Backend login

Im TYPO3 Backend kann sich immer wie folgt eingeloggt werden:

Benutzername: admin
Passwort: password

InstallTool: joh316

### 1.4 Projektdaten lokal aktualisieren

Die Projektdaten können von Production oder Staging lokal aktualisiert (synchronisiert) werden:

* `ddev pulldata production`- lädt Daten von der Live-Umgebung
* `ddev pulldata staging` - lädt Daten von der Staging-Umgebung

> Eine detaillierte Beschreibung zur Konfiguration und Nutzung der [Projektsynchronisation][3] befindet sich der Dokumentation
> der Starter-Distribution.

### 1.5 Frontend

- **Frontend bauen:** `ddev frontend-build`
- **Frontend mit Fractal:** `ddev frontend-start`

## 2. Deployment

Durch das integrierte Surf-Deployment mittels Gitlab-CI, kann der aktuelle Stand auf eine Staging- und einen
Production-Server ausgeliefert werden. Wie das Deployment bei Gitlab eingerichtet werden muss kann in der
[Dokumentation][2] nachgelesen werden.


[1]: https://ddev.readthedocs.io/en/latest/#installation
[2]: https://docs-distribution.starter.team/Deployment/index.html
[3]: https://docs-distribution.starter.team/Kundenprojekt/project-synchronisieren.html
