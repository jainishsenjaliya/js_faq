<?php 
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder


$GLOBALS['TCA']['tx_jsfaq_domain_model_content']['columns']['options']['config']['items'] =  array(
					array('LLL:EXT:js_faq/Resources/Private/Language/locallang_db.xlf:tx_jsfaq_domain_model_content.options.I.0', 0),
					array('LLL:EXT:js_faq/Resources/Private/Language/locallang_db.xlf:tx_jsfaq_domain_model_content.options.I.1', 1),
					array('LLL:EXT:js_faq/Resources/Private/Language/locallang_db.xlf:tx_jsfaq_domain_model_content.options.I.2', 2),
				);

$GLOBALS['TCA']['tx_jsfaq_domain_model_content']['ctrl']['requestUpdate'] = 'options';

$GLOBALS['TCA']['tx_jsfaq_domain_model_content']['columns']['description']['config']['defaultExtras'] = 'richtext:rte_transform[flag=rte_enabled|mode=ts]';
$GLOBALS['TCA']['tx_jsfaq_domain_model_content']['columns']['description']['displayCond'] = 'FIELD:options:=:1';

$GLOBALS['TCA']['tx_jsfaq_domain_model_content']['columns']['image']['config'] = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'image',
				array('maxitems' => 99),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			);
$GLOBALS['TCA']['tx_jsfaq_domain_model_content']['columns']['image']['displayCond'] = 'FIELD:options:=:2';