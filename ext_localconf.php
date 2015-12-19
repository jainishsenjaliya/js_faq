<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'JS.' . $_EXTKEY,
	'Faq',
	array(
		'FAQ' => 'faq',
		
	),
	// non-cacheable actions
	array(
		'FAQ' => 'faq',
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'JS.' . $_EXTKEY,
	'Category',
	array(
		'Category' => 'category',
		
	),
	// non-cacheable actions
	array(
		'Category' => '',
	)
);

## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder
?>