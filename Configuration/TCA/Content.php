<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_jsfaq_domain_model_content'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_jsfaq_domain_model_content']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, options, description, image',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, options, description;;;richtext:rte_transform[mode=ts_links], image, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
	
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_jsfaq_domain_model_content',
				'foreign_table_where' => 'AND tx_jsfaq_domain_model_content.pid=###CURRENT_PID### AND tx_jsfaq_domain_model_content.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),

		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),

		'options' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_faq/Resources/Private/Language/locallang_db.xlf:tx_jsfaq_domain_model_content.options',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('-- Label --', 0),
				),
				'size' => 1,
				'maxitems' => 1,
				'eval' => ''
			),
		),
		'description' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_faq/Resources/Private/Language/locallang_db.xlf:tx_jsfaq_domain_model_content.description',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim',
				'wizards' => array(
					'RTE' => array(
						'icon' => 'wizard_rte2.gif',
						'notNewRecords'=> 1,
						'RTEonly' => 1,
						'script' => 'wizard_rte.php',
						'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
						'type' => 'script'
					)
				)
			),
		),
		'image' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_faq/Resources/Private/Language/locallang_db.xlf:tx_jsfaq_domain_model_content.image',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'image',
				array('maxitems' => 1),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
		),
		
		'faq' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
	),
);
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder

$GLOBALS['TCA']['tx_jsfaq_domain_model_content']['columns']['options']['config']['items'] =  array(
					array('LLL:EXT:js_faq/Resources/Private/Language/locallang_db.xlf:tx_jsfaq_domain_model_content.options.I.0', 0),
					array('LLL:EXT:js_faq/Resources/Private/Language/locallang_db.xlf:tx_jsfaq_domain_model_content.options.I.1', 1),
					array('LLL:EXT:js_faq/Resources/Private/Language/locallang_db.xlf:tx_jsfaq_domain_model_content.options.I.2', 2),
				);

$GLOBALS['TCA']['tx_jsfaq_domain_model_content']['columns']['description']['config']['defaultExtras'] = 'richtext:rte_transform[flag=rte_enabled|mode=ts]';
$GLOBALS['TCA']['tx_jsfaq_domain_model_content']['columns']['description']['displayCond'] = 'FIELD:options:=:1';

$GLOBALS['TCA']['tx_jsfaq_domain_model_content']['columns']['image']['config'] = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'image',
				array('maxitems' => 99),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			);
$GLOBALS['TCA']['tx_jsfaq_domain_model_content']['columns']['image']['displayCond'] = 'FIELD:options:=:2';