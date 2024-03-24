'use strict';

const globalConfig = require('../module-general.config');

module.exports = {
  context: {
    ...globalConfig,
    CType: 'starter-download',
    items: [
      {
        title: 'Microsoft Word document',
        description: '',
        fileType: 'docx',
        fileSize: '7 KB',
        link: {
          config: {
            uri: '#',
            target: '_blank',
            class: '',
            title: 'Download a Microsoft Word document',
          },
        },
      },
      {
        title: 'Microsoft Word template document',
        description: '',
        fileType: 'dotx',
        fileSize: '15 KB',
        link: {
          config: {
            uri: '#',
            target: '_blank',
            class: '',
            title: 'Download a Microsoft Word template document',
          },
        },
      },
      {
        title: 'Adobe PDF document',
        description: '',
        fileType: 'pdf',
        fileSize: '75 KB',
        link: {
          config: {
            uri: '#',
            target: '_blank',
            class: '',
            title: 'Download a Adobe PDF document',
          },
        },
      },
      {
        title: 'Microsoft PowerPoint document',
        description: '',
        fileType: 'pptx',
        fileSize: '31 KB',
        link: {
          config: {
            uri: '#',
            target: '_blank',
            class: '',
            title: 'Download a Microsoft PowerPoint document',
          },
        },
      },
      {
        title: 'Microsoft Excel document',
        description: '',
        fileType: 'xlsx',
        fileSize: '5 KB',
        link: {
          config: {
            uri: '#',
            target: '_blank',
            class: '',
            title: 'Download a Microsoft Excel document',
          },
        },
      },
      {
        title: 'Compressed ZIP-File',
        description: '',
        fileType: 'zip',
        fileSize: '39 KB',
        link: {
          config: {
            uri: '#',
            target: '_blank',
            class: '',
            title: 'Download a compressed ZIP-file',
          },
        },
      },
    ],
  },
};
