function Component($elements) {
    function init() {
        console.log('Init icon');
        console.dir($elements);
        // if ($elements) $elements.forEach(($el) => ($el.style.display = 'none'));
    }

    init();
}

export const className = '.o-icon';

export default Component;
