import { registerComponent } from '@/js/utils';

import accordion, { className as accordionClassName } from './accordions/index';
import navmmenu, { className as navmmenuClassName } from './navigation/navmmenus/index';
import siteheader, { className as siteheaderClassName } from './site/siteheaders/index';
import teaser, { className as teaserClassName } from './teasers/index';

const components = [
    { comp: accordion, class: accordionClassName },
    { comp: navmmenu, class: navmmenuClassName },
    { comp: siteheader, class: siteheaderClassName },
    { comp: teaser, class: teaserClassName },
];

// Do not touch
registerComponent(components);
