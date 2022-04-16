/*
JS für das Module.
Wird nur initialisiert, wenn die Klasse entsprechend dem Molule ist (className = '.o-object';).
Die 'console.log' und 'if ...' stehen nur exemplarisch für jeden anderen JS Code.
*/

function Component($elements) {
    function init() {
        console.log('Init object');
        console.dir($elements);
        if ($elements) $elements.forEach(($el) => ($el.style.display = 'none'));
    }

    init();
}

export const className = '.o-object';

export default Component;
