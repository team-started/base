<?php
// deactivate caches
foreach([
    'cache_core',
    'cache_hash',
    'cache_imagesizes',
    'cache_pages',
    'cache_pagesection',
    'cache_phpcode',
    'cache_rootline',
    'extbase_datamapfactory_datamap',
    'extbase_object',
    'extbase_reflection',
    'extbase_typo3dbbackend_queries',
    'extbase_typo3dbbackend_tablecolumns',
    'fluid_template',
    'l10n',
] as $cacheKey) {
	$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations'][$cacheKey]['backend'] = 'TYPO3\CMS\Core\Cache\Backend\NullBackend';
    unset($GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations'][$cacheKey]['options']);
}

foreach([
	'cache_runtime',
] as $cacheKey) {
	$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations'][$cacheKey]['backend'] = 'TYPO3\CMS\Core\Cache\Backend\TransientMemoryBackend';
    unset($GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations'][$cacheKey]['options']);
}
