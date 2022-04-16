function Component($elements) {
    function init() {
        const naviItems = document.querySelectorAll('.c-navmmenu .level-1  > li.has-children');

        console.log('Init component');
        console.dir($elements);

        for (let i = 0; i < naviItems.length; ++i) {
            const naviItem = naviItems[i];
            const subNavi = naviItem.querySelector('ul');

            naviItem.addEventListener('mouseover', () => {
                subNavi.classList.remove('d-none');
            });

            naviItem.addEventListener('mouseout', () => {
                subNavi.classList.add('d-none');
            });
        }
    }

    init();
}

export const className = '.c-navmmenu';

export default Component;
