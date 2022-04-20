/*
Optionales JS für eine Komponente.
Wird nur initialisiert, wenn die Klasse entsprechend der Komponente ist (className = '.c-component';).
Die 'console.log' und 'if ...' stehen nur exemplarisch für jeden anderen JS Code.
'function Component' meint 'js component', dieses Naming muss so bleiben.
*/

function Component($elements) {
    function init() {
        console.log('Init component');
        console.dir($elements);
        if ($elements) $elements.forEach(($el) => ($el.style.display = 'none'));
    }

    init();
}

export const className = '.c-component';

export default Component;
