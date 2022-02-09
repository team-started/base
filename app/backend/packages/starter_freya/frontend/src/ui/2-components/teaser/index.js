function Component($elements) {
    function init() {
        console.log('Init teaser');
        console.dir($elements);
        // if ($elements) $elements.forEach(($el) => ($el.style.display = 'none'));
    }

    init();
}

export const className = '.c-teaser';

export default Component;
