/*
JS für die Component.
Wird nur initialisiert, wenn die Klasse entsprechend dem Molule ist (className = '.c-component';).
Die 'console.log' und 'if ...' stehen nur exemplarisch für jeden anderen JS Code.
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
