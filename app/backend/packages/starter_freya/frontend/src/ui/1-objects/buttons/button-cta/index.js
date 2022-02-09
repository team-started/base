function Component($elements) {
    function init() {
        console.log('Init button-cta');
        console.dir($elements);
        // if ($elements) $elements.forEach(($el) => ($el.style.display = 'none'));
    }

    init();
}

export const className = '.o-button-cta';

export default Component;
