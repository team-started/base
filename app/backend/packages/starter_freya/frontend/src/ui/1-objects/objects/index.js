function Component($elements) {
    function init() {
        console.log('Init object');
        console.dir($elements);
        // if ($elements) $elements.forEach(($el) => ($el.style.display = 'none'));
    }

    init();
}

export const className = '.o-object';

export default Component;
