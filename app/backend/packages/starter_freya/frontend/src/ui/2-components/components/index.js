function Component($elements) {
    function init() {
        console.log('Init component');
        console.dir($elements);
        // if ($elements) $elements.forEach(($el) => ($el.style.display = 'none'));
    }

    init();
}

export const className = '.c-component';

export default Component;
