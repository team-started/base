# Mitarbeit an der Dokumentation

Jeder ist an der Mitarbeiter zur Dokumentation eingeladen. Die Dokumentation befindet sich im Verzeichnis
_documenation/docs_ und kann dort mittels Markdown bearbeitet werden. Am einfachsten ist die Bearbeitung auf dem
lokalen Rechner mittels PhpStorm, Sublime oder jedem anderen Editor mit Markdown Unterstützung.

## Änderungen vornehmen

Um die Dokumentation zu erweitern/verbessern, ist es für alle am Besten wenn ein entsprechendes Ticket für eine Änderung
erstellt wird bzw. im Zuge eines bestehenden Tickets (Bugfix/Feature) entsprechend angepasst wird. Das Ticket sollte
das Tag _Documentation_ erhalten.

## Rendering und Veröffentlichung

Die Dokumentation wird, sofern die Änderungen in den Master-Branch eingeflossen sind **und** ein neuer Tag erstellt
wurde, automatisiert mittels [daux.io](https://daux.io/) gerendert und unter der URL

> https://docs-distribution.starter.team/

veröffentlicht. Unter dieser URL liegt stets nur die aktuelle Version der Dokumentation zu welcher ein Git-Tag existiert.
Möchte man die Dokumentation zu einer eine ältere Version lesen, kann dies nur lokal gemacht werden.

### Optional - lokales Rendering

Optional ist es möglich die Dokumentation lokal generieren zu lassen, um seine Änderungen vor dem Commit noch einmal
selbst zu überprüfen.

Für das lokale Rending wird der Befehle `ddev build-doc` ausgeführt. Die generierte Dokumentation kann unter der URL

> https://starter-base.ddev.site/docs/

angeschaut werden.

## Ältere Dokumentation lesen

Um eine ältere Dokumentation zu lesen, muss das Base-Repository um den entsprechenden Tag lokal ausgecheckt werden.

* `git checkout tag/[Versions-Tag]`
* `ddev start`
* `ddev build-doc`
* https://starter-base.ddev.site/docs/

Durch den Versionsunterschied ist es möglich, dass eine ältere TYPO3 Version installiert wird.

### Tip

Um nicht den gesamten Installationprozess durchlaufen zu müssen kann in der Datei `.ddev/config.yaml` alle `post-start`
hooks deaktiviert werden (ein `#` vor die entsprechenden Zeile). Lediglich die Hooks

* exec: composer install -d /var/www/html/documentation
* exec: /var/www/html/craft/bin/create_symlinks.sh

bleiben aktiv.
