'use strict';

const _ = require('../../../../config/helpers');

module.exports = {
    context: {
        bodytext: _.lorem(500, 'bodytext: '),
        CType: 'text',
        date: '23.02.2022',
        header: {
            header: _.lorem(50, 'header: '),
            header_layout: '',
            header_link: '',
            header_position: '',
            tx_starter_headercolor: 'text-primary',
            tx_starter_headerfontsize: '',
        },
        layout: '',
        overline: {
            header_position: '',
            tx_starter_overline: _.lorem(50, 'overline: '),
        },
        space_after_class: '',
        space_before_class: '',
        subheader: {
            header_position: '',
            subheader: _.lorem(50, 'subheader: '),
        },
        uid: 999,
        tx_starter_background: '',
        tx_starter_background_fluid: false,
        tx_starter_bordercolor: '',
        tx_starter_container: '',
        tx_starter_cta_link: {
            config: {
                uri: '#',
                target: '',
                class: 'info2',
                title: '',
            },
        },
        tx_starter_cta_text: _.lorem(20, 'max 20'),
        tx_starter_showbyscreensize: '',
        tx_starter_textclass: '',
        tx_starter_textcolor: '',
        tx_starter_width: '',
    },
    variants: [
        {
            name: 'background',
            label: 'background',
            context: {
                tx_starter_background: 'bg-primary',
            },
        },
        {
            name: 'background-fluid',
            label: 'background fluid',
            context: {
                tx_starter_background: 'bg-primary',
                tx_starter_background_fluid: true,
            },
        },
        {
            name: 'show-by-mediaquery',
            label: 'show for medium only',
            context: {
                tx_starter_showbyscreensize: 'd-md-only',
            },
        },
    ],
};
