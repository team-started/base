function Component($elements) {
    function init() {
        const navaccmenu = document.querySelector('#navaccmenu');
        const toggles = document.querySelectorAll('.c-siteheader__toggle');

        for (let i = 0; i < toggles.length; i++) {
            toggles[i].addEventListener('click', function () {
                navaccmenu.classList.toggle('d-none');
                for (let j = 0; j < toggles.length; j++) {
                    toggles[j].classList.toggle('d-none');
                }
            });
        }
    }

    init();
}

export const className = '.c-siteheader';

export default Component;
