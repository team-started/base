import './accordions/index';

import { registerComponent } from '@/js/utils';

import swiper, { className as swiperClassName } from './swipers/index';
// import component, { className as componentClassName } from './component/index';
import navmmenu, { className as navmmenuClassName } from './navigation/navmmenus/index';

const components = [
    // { comp: component, class: componentClassName },
    { comp: navmmenu, class: navmmenuClassName },
    { comp: swiper, class: swiperClassName },
];

// Do not touch
registerComponent(components);
