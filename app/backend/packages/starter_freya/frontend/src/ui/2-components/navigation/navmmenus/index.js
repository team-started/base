// Blendet die zweite Navigationsebene ein / aus.

function Component($elements) {
    function init() {
        const navItems = document.querySelectorAll('.c-navmmenu ul.level-1  > li.has-children');

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

    init();
}

export const className = '.c-navmmenu';

export default Component;
