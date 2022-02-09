function Component($elements) {
    function init() {
        console.log('Init button');
        console.dir($elements);
        // if ($elements) $elements.forEach(($el) => ($el.style.display = 'none'));
    }

    init();
}

export const className = '.o-button';

export default Component;
