import { registerComponent } from '@/js/utils';

// import component, { className as componentClassName } from './component/index';
import accordion, { className as accordionClassName } from './accordions/index';
import teaser, { className as teaserClassName } from './teasers/index';

// and so on...

const components = [
    // { comp: component, class: componentClassName },
    { comp: accordion, class: accordionClassName },
    { comp: teaser, class: teaserClassName },
    // and so on...
];

// Do not touch
registerComponent(components);
