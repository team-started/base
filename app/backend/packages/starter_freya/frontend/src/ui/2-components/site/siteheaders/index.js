/* eslint-disable no-unused-vars */
import Collapse from 'bootstrap/js/dist/collapse';
/* eslint-enable no-unused-vars */

function Component() {
    function init() {
        let scrollpos = window.scrollY;
        const header = document.querySelector('.c-siteheader');
        const headerHeight = header.offsetHeight;

        /* setzt im Body oben einen Abstand, damit der Content nicht unter der Nac´vigation verschwindet */
        document.querySelector('body').style.marginTop = headerHeight + 'px';

        /* setzt im siteheader eine Klasse, nachdem die Seite ein Stüchcken gescrollt wurde */
        const add_class_on_scroll = () => header.classList.add('page-scrolled');
        const remove_class_on_scroll = () => header.classList.remove('page-scrolled');

        window.addEventListener('scroll', function () {
            scrollpos = window.scrollY;

            if (scrollpos >= headerHeight) {
                add_class_on_scroll();
            } else {
                remove_class_on_scroll();
            }
        });
    }

    init();
}

export const className = '.c-siteheader';

export default Component;
