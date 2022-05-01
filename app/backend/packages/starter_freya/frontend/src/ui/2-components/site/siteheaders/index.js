import Collapse from 'bootstrap/js/dist/collapse';

function Component() {
    function init() {
        let scrollpos = window.scrollY;
        const header = document.querySelector('.c-siteheader');
        const headerHeight = header.offsetHeight;

        document.querySelector('body').style.paddingTop = headerHeight + 'px';

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
