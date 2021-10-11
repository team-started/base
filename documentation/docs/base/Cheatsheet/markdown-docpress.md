# Cheatsheets - Markdown/Docpress

Durch die Generierung der Dokumentation durch Docpress stehen mehr Funktionen im Markdown zur Verfügung als üblich. Daher
ist es u.U. möglich, dass nicht alle Funktionen in der lokalen Preview (z.B. in PhpStorm) angezeigt werden.

## Allgemeine Syntax von Markdown

Markdown hat eine sehr einfache Syntax, wodurch sich dies besondern für solche Dokumentationen eignet. Mögliche
Schreibweisen kann man unter https://markdown.de/ nachlesen.

## Erweiterte Syntax

### Container

Container dienen dazu mittels einer Farbhinterlegung auf etwas deutlich hinzuweisen. Hierbei werden die 3 Zustände
"Warnung", "Erfolg" und "Info" unterstützt (siehe Beispiel unten).

```markdown
::: { .warning }
Das is ein Warnhinweis
:::

// HTML
<div class="warning">
    <p>Das is ein Warnhinweis</p>
</div>
```

::: { .warning }
Das is ein Warnhinweis
:::

```markdown
::: { .success }
Das is eine Erfolgsmeldung
:::

// HTML
<div class="success">
    <p>Das is eine Erfolgsmeldung</p>
</div>
```

::: { .success }
Das is eine Erfolgsmeldung
:::

```markdown
::: { .info }
Das ist eine Info
:::

// HTML
<div class="info">
    <p>Das ist eine Info</p>
</div>
```

::: { .info }
Das ist eine Info
:::


### Bildgrößen

Durch die Angabe einer Größe werden die Bilder (Screenshots) nicht mehr in ihrer Ursprünglichen Größe ausgegeben, sondern
mit _width_ und _height_ im img-Tag "verkleinert".

```markdown
![SSH-Keys erstellen](../assets/images/ssh-key-generation.png =500x268)
```
