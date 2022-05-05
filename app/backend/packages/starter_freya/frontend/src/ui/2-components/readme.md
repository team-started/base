# Components

> Components – specific UI components. This is where most of our work takes place. We often compose UI components of Objects and Components \
> [Quelle](https://www.xfive.co/blog/itcss-scalable-maintainable-css-architecture/)

Components können aus anderen components oder objects bestehen.
Components sind niemals TYPO3 Contentelemente, siehe 3-modules.

In ITCSS sind Components an 6. Stelle. Hier ist es an 2. Stelle, weil Sass in scss ausgelagert ist.

## Verzeichnisnamen

Der Name des Verzeichnisses ist immer im Plural zu schreiben, z.B. "teasers".

**Hintergrund:** Wenn es Unterverzeichnisse gibt, z.B. Varianten oder Snippets, kommt es ansonsten zu Problemen beim
Inkludieren von Twig Dateien, da das Namespace nicht aufgelöst werden kann.
