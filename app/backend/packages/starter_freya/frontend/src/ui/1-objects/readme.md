# Objects

> Objects – class-based selectors which define undecorated design patterns, for example the media object known from OOCSS \
> [Quelle](https://www.xfive.co/blog/itcss-scalable-maintainable-css-architecture/)

- Objects sollten nicht in kleinere Komponenten zerlegt werden können
- Objects sollten keine anderen Objects enthalten
- Wenige Ausnahmen: z.B. `ul` oder `ol`

In ITCSS sind Objects an 5. Stelle. Hier ist es an 1. Stelle, weil Sass in scss ausgelagert ist.

## Verzeichnisnamen

Der Name des Verzeichnisses ist immer im Plural zu schreiben, z.B. "paragraphs".

**Hintergrund:** Wenn es Unterverzeichnisse gibt, z.B. Varianten oder Snippets, kommt es ansonsten zu Problemen beim
Inkludieren von Twig Dateien, da das Namespace nicht aufgelöst werden kann.
