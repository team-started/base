# Example for module

Ein Modul steht für ein Contentelement von TYPO3.
Es ist im Grunde auch nur ein Component, aber hat wegen der direkten Verknüpfung mit dem TYPO3 Backend einen separaten Ordner und Naming.
Die ID eines Moduls beginnt immer noch mit "c-", weil es ein Component ist und sich das "c" von TYPO3 gelernt ist (uid).

### _index.scss
Muss eingebunden werden: z.B. src/ui/3-modules/_index.scss

### index.js
Muss eingebunden werden: z.B. src/ui/3-modules/index.js
Momentan gibt es in 3-modules keine index.js, weil dies hier bisher nicht benötigt wird.

### m00-module.config
Konfiguration für Fractal.
'globalConfig': Hier wird die globale Konfiguration geladen, damit das nicht ständig neu gecodet werden muss.
Im Anschluß werden bestimmt Werte überschrieben (hier: 'CType'), bzw. könnten auch ergänzt werden.

### m00-module.twig
Dies ist individuell für ein Module:
    {% include '@object/objects/object.twig' %}
    {% include '@component/components/component.twig' %}
In diesem Beispiel wird ein Component und ein Object eingebunden.
Alles andere Wrapping ist bei allen Modulen identisch (kann aber bei Bedarf erweitert werden).

Da ein Module einem Contentelement von TYPO3 entspricht, sollte niemals ein Module in ein Module eingebunden werden.
