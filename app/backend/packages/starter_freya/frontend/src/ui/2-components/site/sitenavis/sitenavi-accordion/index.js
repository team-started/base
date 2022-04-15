function Component($elements) {
    function init() {
        console.log('Init object-other');
        console.dir($elements);
        // if ($elements) $elements.forEach(($el) => ($el.style.display = 'none'));
    }

    init();
}

export const className = '.o-object-other';

export default Component;
