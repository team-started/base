import { registerComponent } from '@/js/utils';

import accordion, { className as accordionClassName } from './accordions/index';
// import component, { className as componentClassName } from './component/index';
import navmmenu, { className as navmmenuClassName } from './navigation/navmmenus/index';

const components = [
    { comp: accordion, class: accordionClassName },
    // { comp: component, class: componentClassName },
    { comp: navmmenu, class: navmmenuClassName },
];

// Do not touch
registerComponent(components);
