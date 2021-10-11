# Konfiguration des Deployments

Das Gitlab-CI übernimmt die Aufgabe, Projekte aus einem Git-Repository auf einen Zielserver (Production oder Staging)
auszuliefern und eine Überprüfung der Code-Qualität durchzuführen.

Durch diesen Mechanismus kann zum einem die Entwicklung eines Projektes lokal erfolgen und zum anderen ist es nicht mehr
notwendig Dateien per FTP auf einen Zielserver zu übertragen, wodurch die Fehlerqote beim ausliefern des Projektes
minimiert wird.

Die Auslieferung des Projektes erfolgt in mehreren Schritten (Tasks), wobei alle Schritte fehlerfrei durchlaufen werden
müssen. Sollte einer dieser Schritte fehlschlagen, wird ein *Rollback* durchgeführt, wodurch der vorherige Zustand des
Projektes erhalten und online bleibt.

### Vorteile des Deployments
1. Aufbau von Release-Ordnern, wodurch eine Art Versionierung der Website stattfindet, auf welche im Bedarfsfall zurückgegangen werden kann
2. Keine manuellen Schritte notwendig, wie Cache leeren
3. Automatisierter Rollback sollte während des Deployment etwas nicht funktionieren => keine Ausfallzeit der Website
4. Das Vergessen von Dateien ist nicht mehr möglich
5. Jeder kann ohne tiefe Kenntnisse ein Release ausliefern

### Voraussetzung auf Zielserver

Mindestanforderungen sind:

* SSH-Zugang zum Server (zum Setzen der Symlinks während des Deployment-Prozesses)
* SSH-Key in die Datei authorized_key ablegbar (i.d.R. möglich, sobald SSH-Zugang vorhanden ist)
* Auf dem Zielserver muss **rsync** installiert sein (i.d.R. ist dies installiert oder lässt sich, wie bei Mittwald, nachinstallieren)
* Projekt muss in einem Git-Repository gehostet sein


> Weiterführende Themen
> * [Vorbereitung auf dem Zielserver](./vorbereitung-server.md)
> * [Konfiguration Gitlab-CI](./gitlab-ci.md)
> * [Deployment einrichten](./gitlab.md)
