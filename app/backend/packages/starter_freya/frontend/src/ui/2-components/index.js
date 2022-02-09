import { registerComponent } from '@/js/utils';

// import component, { className as componentClassName } from './component/index';
import teaser, { className as teaserClassName } from './teaser/index';

// and so on...

const components = [
    // { comp: component, class: componentClassName },
    { comp: teaser, class: teaserClassName },
    // and so on...
];

// Do not touch
registerComponent(components);
