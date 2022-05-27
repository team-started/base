'use strict';

const _ = require('../../../../config/helpers');

module.exports = {
    label: 'Container Tests',
    context: {
        uid: 111,
        tx_starter_container: '',
        tx_starter_visibility: '',
        space_before_class: '',
        space_after_class: '',
        bodytext: _.lorem(200, 'max 200: '),
        tx_starter_background: '',
        tx_starter_background_fluid: '',
    },
    variants: [
        {
            name: 'sm',
            label: 'fluid bis small',
            context: {
                tx_starter_container: 'container-sm',
            },
        },
        {
            name: 'lg',
            label: 'fluid bis large',
            context: {
                tx_starter_container: 'container-lg',
            },
        },
        {
            name: 'md-fixed-small',
            label: 'max-width small',
            context: {
                tx_starter_container: 'container-sm-fixed',
            },
        },
        {
            name: 'md-fixed-medium',
            label: 'max-width medium',
            context: {
                tx_starter_container: 'container-md-fixed',
            },
        },
        {
            name: 'fluid',
            label: 'fluid',
            context: {
                tx_starter_container: 'container-fluid',
            },
        },
        {
            name: 'background',
            label: 'background',
            context: {
                tx_starter_background: 'bg-info1',
            },
        },
        {
            name: 'background-fluid',
            label: 'background fluid',
            context: {
                tx_starter_background: 'bg-info2',
                tx_starter_background_fluid: true,
            },
        },
        {
            name: 'gap-top',
            label: 'gap-top medium',
            context: {
                space_before_class: 'mt-3',
            },
        },
        {
            name: 'gap-top-bottom',
            label: 'gap-top small, gap-bottom x-large',
            context: {
                space_before_class: 'mt-2',
                space_after_class: 'mt-5',
            },
        },
        {
            name: 'background-fluid-gap',
            label: 'background fluid with gap',
            context: {
                space_before_class: 'mt-3',
                tx_starter_background: 'bg-info',
                tx_starter_background_fluid: true,
            },
        },
        {
            name: 'show-by-mediaquery',
            label: 'show for medium only',
            context: {
                tx_starter_visibility: 'd-md-only',
            },
        },
        {
            name: 'background-fluid-visibility',
            label: 'background fluid, show for medium only',
            context: {
                tx_starter_background: 'bg-info',
                tx_starter_background_fluid: true,
                tx_starter_visibility: 'd-md-only',
            },
        },
    ],
};
