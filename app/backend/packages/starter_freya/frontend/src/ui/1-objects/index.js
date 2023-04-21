import { registerComponent } from '@/js/utils';

import picture, { className as pictureClassName } from './pictures/index';
// import object, { className as objectClassName } from './objects/index';
// import objectCta, { className as objectCtaClassName } from './objects/object-cta/index';
// and so on...

const objects = [
    // { comp: object, class: objectClassName },
    // { comp: objectCta, class: objectCtaClassName },
    { comp: picture, class: pictureClassName },
    // and so on...
];

// Do not touch
registerComponent(objects);
