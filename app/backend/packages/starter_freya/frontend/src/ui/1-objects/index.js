import { registerComponent } from '@/js/utils';

import buttonCta, { className as buttonCtaClassName } from './buttons/button-cta/index';
import button, { className as buttonClassName } from './buttons/index';
import icon, { className as iconClassName } from './icons/index';
import image, { className as imageClassName } from './images/index';
// import object, { className as objectClassName } from './objects/index';
// import objectCta, { className as objectCtaClassName } from './objects/object-cta/index';
// and so on...

const objects = [
    // { comp: object, class: objectClassName },
    // { comp: objectCta, class: objectCtaClassName },
    { comp: button, class: buttonClassName },
    { comp: buttonCta, class: buttonCtaClassName },
    { comp: icon, class: iconClassName },
    { comp: image, class: imageClassName },
    // and so on...
];

// Do not touch
registerComponent(objects);
