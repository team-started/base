// Blendet die zweite Navigationsebene ein / aus.

function Component() {
    function init() {
        const navs = document.querySelectorAll('.c-navmmenu');

        for (let i = 0; i < navs.length; i++) {
            const navItems = navs[i].querySelectorAll('ul.level-1  > li.has-children');

            for (let i = 0; i < navItems.length; ++i) {
                const navItem = navItems[i];
                const subNav = navItem.querySelector('ul.level-2');

                navItem.addEventListener('mouseover', () => {
                    subNav.classList.remove('d-none');
                });

                navItem.addEventListener('mouseout', () => {
                    subNav.classList.add('d-none');
                });
            }
        }
    }

    init();
}

export const className = '.c-navmmenu';

export default Component;
