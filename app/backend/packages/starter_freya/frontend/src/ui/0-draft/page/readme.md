# Beispielseite für eine Page

Das Problem bei einer Page ist, dass jedes Modul eine eindeutige Uid haben sollte, damit z.B. JS für Accordions korrekt funktioniert.
Mittels config.js habe ich dafür noch keinen Weg gefunden, weil alle Modifikationen sich immer auf alle Module beziehen.
Das gilt für Fractal-eigene Funktionen, wie für native JS Funktionen per require ... es ging nicht.

Daher wird die Uid nun in Twig modifiziert ('merge').

Bei Images wird die Variante für drei Bilder genutzt, siehe config.js ('@m05-images--images3').
