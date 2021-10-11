# Konfiguration Gitlab-CI

In dem Git-Repository bei Gitlab links in der Navigation auf **Settings >> CI/CD** und dann den Punkt **Variable**
aufklappen. Dort werden nun die Variablen erstellt und ihnen entsprechende Werte zugewiesen.


### Environment-Variablen bei Gitlab

Die Gitlab Environments sind Variablen, welche wir mit Werten befüllen, welche wiederum während des Deployment abgefragt
werden. Durch diese Environments müssen keine sensiblen Daten innerhalb des Projektes gespeichert werden.

#### Allgemeine Variablen

| Variable               | Typ    | Beschreibung              |
| :--------------------- | :----- | :------------------------ |
| DEPLOYMENT_PRIVATE_KEY | String | SSH PrivateKey            |
| PROJECT_NAME           | String | Name des Projektes/Kunden |

Der *DEPLOYMENT_PRIVATE_KEY* wurde bereits bei der _Vorbereitung des Servers_ erstellt. Um an den Inhalt des
SSH-Private-Key zu gelangen, kann man auch der Konsole (Shell) `cat ~/.ssh/my-project | pbcopy` sich den Key in die
Zwischenablage des Betriebsystem kopieren.

Sollte dies über die Konsole nicht funktionieren, kann die Datei auch mit einem Editor geöffnet und der *gesamte Inhalt*
kopiert werden.

#### Variablen für Production

| Variable                   | Typ    | Beschreibung                                     |
| :------------------------- | :----- | :----------------------------------------------- |
| PRODUCTION_DEPLOYMENT_HOST | String | IP-Adresse oder URL **ohne** "http(s)" und "www" |
| PRODUCTION_DEPLOYMENT_PATH | String | Absolute Pfad auf dem Server                     |
| PRODUCTION_PHP_BINARY      | String | PHP-Binary                                       |
| PRODUCTION_URI             | String | Domain des Zielsystems                           |
| PRODUCTION_USER            | String | SSH-User                                         |


> PRODUCTION_DEPLOYMENT_PATH: Beispiel: `/home/www/html/typo3/production`

> PRODUCTION_PHP_BINARY
> Die Angabe der richtigen PHP-Version ist zwingend notwendig. Hat man eine SSH-Verbindung mit dem Zielserver, kann die
Version mittels `php --version` geprüft werden und mit `which php` den Pfad ermitteln.
>
>Für folgende Hoster gelten diese Pfade:
> * Mittwald: `php_cli` (PHP Version der Domain)
> * Domain Factory: `/usr/local/bin/php7-70STABLE-CLI`, `/usr/local/bin/php7-71STABLE-CLI`, `/usr/local/bin/php7-72STABLE-CLI`
> * jWeiland: `/usr/local/bin/php7-70STABLE-CLI`, `/usr/local/bin/php7-71STABLE-CLI`, `/usr/local/bin/php7-72STABLE-CLI`
> * All-Inkl: `php` (PHP Version der Domain)
> * Metanet: `/opt/php70/bin/php`, `/opt/php71/bin/php`, `/opt/php72/bin/php`

#### Variablen für Staging

| Variable                | Typ    | Beschreibung                                     |
| :-----------------------| :----- | :----------------------------------------------- |
| STAGING_DEPLOYMENT_HOST | String | IP-Adresse oder URL **ohne** "http(s)" und "www" |
| STAGING_DEPLOYMENT_PATH | String | Absolute Pfad auf dem Server                     |
| STAGING_PHP_BINARY      | String | PHP-Binary                                       |
| STAGING_URI             | String | Domain des Zielsystems                           |
| STAGING_USER            | String | SSH-User                                         |


> STAGING_DEPLOYMENT_PATH: Beispiel: `/home/www/html/typo3/staging`

> STAGING_PHP_BINARY
> Die Angabe der richtigen PHP-Version ist zwingend notwendig. Hat man eine SSH-Verbindung mit dem Zielserver, kann die
Version mittels `php --version` geprüft werden und mit `which php` den Pfad ermitteln.
>
>Für folgende Hoster gelten diese Pfade:
> * Mittwald: `php_cli` (PHP Version der Domain)
> * Domain Factory: `/usr/local/bin/php7-70STABLE-CLI`, `/usr/local/bin/php7-71STABLE-CLI`, `/usr/local/bin/php7-72STABLE-CLI`
> * jWeiland: `/usr/local/bin/php7-70STABLE-CLI`, `/usr/local/bin/php7-71STABLE-CLI`, `/usr/local/bin/php7-72STABLE-CLI`
> * All-Inkl: `php` (PHP Version der Domain)
> * Metanet: `/opt/php70/bin/php`, `/opt/php71/bin/php`, `/opt/php72/bin/php`

> Weiterführende Themen
> * [Deployment](./index.md)
> * [Vorbereitung auf dem Zielserver](./vorbereitung-server.md)
> * [Konfiguration Gitlab-CI](./gitlab-ci.md)
