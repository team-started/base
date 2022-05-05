# Beispielseite für eine Page

Das Problem bei einer Page ist, dass jedes Modul eine eindeutige Uid haben sollte, damit z.B. JS für Akkordions korrekt
funktioniert. Mittels config.js lässt sich dieses Problem derzeit nicht lösen, weil alle Modifikationen sich immer auf
alle Module beziehen. Das gilt für Fractal-eigene Funktionen, wie für native JS Funktionen per require ...

Daher wird die Uid nun in Twig modifiziert ('merge').

Bei Images wird die Variante für drei Bilder genutzt, siehe config.js ('@m05-media--images3').
