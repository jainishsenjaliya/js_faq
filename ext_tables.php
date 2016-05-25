<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'JS.' . $_EXTKEY,
	'Faq',
	' FAQ - Frequently Asked Questions'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'FAQ - Frequently Asked Questions');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_jsfaq_domain_model_category', 'EXT:js_faq/Resources/Private/Language/locallang_csh_tx_jsfaq_domain_model_category.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_jsfaq_domain_model_category');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_jsfaq_domain_model_expert', 'EXT:js_faq/Resources/Private/Language/locallang_csh_tx_jsfaq_domain_model_expert.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_jsfaq_domain_model_expert');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_jsfaq_domain_model_faq', 'EXT:js_faq/Resources/Private/Language/locallang_csh_tx_jsfaq_domain_model_faq.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_jsfaq_domain_model_faq');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_jsfaq_domain_model_content', 'EXT:js_faq/Resources/Private/Language/locallang_csh_tx_jsfaq_domain_model_content.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_jsfaq_domain_model_content');
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder

require_once( \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY).'Classes/Utility/Hook/hook.php');

// New icons for the BE
/*
if (TYPO3_MODE == 'BE') {
	$icon = "faq";
	\TYPO3\CMS\Backend\Sprite\SpriteManager::addTcaTypeIcon('pages', 'contains-' . $icon, \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/faq.png');
	$TCA['pages']['columns']['module']['config']['items'][] = array(ucfirst($icon), $icon, \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/faq.png');
}
*/