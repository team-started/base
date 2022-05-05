# Beispiel für ein Modul

Ein Modul steht für ein Content-Element in einem CMS.
Es ist im Grunde auch nur eine Komponente, aber hat wegen der direkten Verknüpfung mit dem CMS Backend einen
separaten Ordner und Naming.
Die ID eines Moduls beginnt immer mit "c-", da das CMS TYPO3 dies vorgibt und nicht angepasst werden kann.

### _index.scss

Muss eingebunden werden: z.B. src/ui/3-modules/_index.scss

### index.js

Muss eingebunden werden: z.B. src/ui/3-modules/index.js
Innerhalb von 3-modules gibt es momentan keine `index.js`, weil dies hier bisher nicht benötigt wird.

### m00-module.config

Konfiguration für Fractal.
'globalConfig': Hier wird die globale Konfiguration geladen, damit das nicht ständig neu gecodet werden muss.
Im Anschluss werden bestimmte Werte überschrieben (hier: 'CType'), bzw. könnten auch ergänzt werden.

### m00-module.twig

Dies ist individuell für ein Modul:

```
{% include '@object/objects/object.twig' %}
{% include '@component/components/component.twig' %}
```

In diesem Beispiel wird eine Komponente und ein Objekt eingebunden.
Alles andere Wrapping ist bei allen Modulen identisch (kann aber bei Bedarf erweitert werden).

Da ein Modul einem Content-Element von TYPO3 entspricht, sollte niemals ein Modul in ein Modul eingebunden werden.
