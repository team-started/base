/*
Optionales JS für ein Objekt.
Wird nur initialisiert, wenn die Klasse entsprechend dem Objekt ist (className = '.o-object';).
Die 'console.log' und 'if ...' stehen nur exemplarisch für jeden anderen JS Code.
'function Component' meint 'js component', dieses Naming muss so bleiben.
*/

function Component($elements) {
    function init() {
        console.log('Init object-other');
        console.dir($elements);
        if ($elements) $elements.forEach(($el) => ($el.style.display = 'none'));
    }

    init();
}

export const className = '.o-object-other';

export default Component;
