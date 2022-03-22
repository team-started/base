import testimage from '@/assets/images/logo.png';

function Component($elements) {
    function init() {
        console.log('Init object');
        console.dir($elements);
        // if ($elements) $elements.forEach(($el) => ($el.style.display = 'none'));

        console.log(testimage);
    }

    init();
}

export const className = '.o-image';

export default Component;
