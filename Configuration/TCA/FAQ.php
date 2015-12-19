<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_jsfaq_domain_model_faq'] = array(
	'ctrl' => $TCA['tx_jsfaq_domain_model_faq']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, question, answer,--div--; Details, asked_by, expert, related, related_link, category',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, question, answer,--div--; Details, asked_by, expert, related, related_link, category,--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,starttime, endtime'),
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
				'foreign_table' => 'tx_jsfaq_domain_model_faq',
				'foreign_table_where' => 'AND tx_jsfaq_domain_model_faq.pid=###CURRENT_PID### AND tx_jsfaq_domain_model_faq.sys_language_uid IN (-1,0)',
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
		'question' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_faq/Resources/Private/Language/locallang_db.xlf:tx_jsfaq_domain_model_faq.question',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'asked_by' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_faq/Resources/Private/Language/locallang_db.xlf:tx_jsfaq_domain_model_faq.asked_by',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'related_link' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_faq/Resources/Private/Language/locallang_db.xlf:tx_jsfaq_domain_model_faq.related_link',
			'config' => array(
				'type' => 'text',
				'cols' => 30,
				'rows' => 5,
				'eval' => 'trim'
			),
		),
		'expert' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_faq/Resources/Private/Language/locallang_db.xlf:tx_jsfaq_domain_model_faq.expert',
			'config' => array(
				'type' => 'select',
				'items' => array (
		            array('',0),
		         ),
				'foreign_table' => 'tx_jsfaq_domain_model_expert',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'related' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_faq/Resources/Private/Language/locallang_db.xlf:tx_jsfaq_domain_model_faq.related',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'db',
				'allowed' => 'tx_jsfaq_domain_model_faq',
				'MM' => 'tx_jsfaq_faq_faq_mm',
				'size' => 3,
				'autoSizeMax' => 30,
				'maxitems' => 1000,
				'multiple' => 0,
				'wizards' => array(
					'_PADDING' => 1,
					'_VERTICAL' => 1,
					'edit' => array(
						'type' => 'popup',
						'title' => 'Edit',
						'script' => 'wizard_edit.php',
						'icon' => 'edit2.gif',
						'popup_onlyOpenIfSelected' => 1,
						'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
						),
					'add' => Array(
						'type' => 'script',
						'title' => 'Create new',
						'icon' => 'add.gif',
						'params' => array(
							'table' => 'tx_jsfaq_domain_model_faq',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
							),
						'script' => 'wizard_add.php',
					),
				),
			),
		),
		'category' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_faq/Resources/Private/Language/locallang_db.xlf:tx_jsfaq_domain_model_faq.category',
			'config' => array(
				'type' => 'select',
				'items' => array (
					array('',0),
				),
				'foreign_table' => 'tx_jsfaq_domain_model_category',
				'MM' => 'tx_jsfaq_faq_category_mm',
				'size' => 1,
				'autoSizeMax' => 1,
				'maxitems' => 1,
				'multiple' => 0,
				'wizards' => array(
					'_PADDING' => 1,
					'_VERTICAL' => 1,
					'edit' => array(
						'type' => 'popup',
						'title' => 'Edit',
						'script' => 'wizard_edit.php',
						'icon' => 'edit2.gif',
						'popup_onlyOpenIfSelected' => 1,
						'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
						),
					'add' => Array(
						'type' => 'script',
						'title' => 'Create new',
						'icon' => 'add.gif',
						'params' => array(
							'table' => 'tx_jsfaq_domain_model_category',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
							),
						'script' => 'wizard_add.php',
					),
				),
			),
		),
		'answer' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:js_faq/Resources/Private/Language/locallang_db.xlf:tx_jsfaq_domain_model_faq.answer',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_jsfaq_domain_model_content',
				'foreign_field' => 'faq',
				'maxitems'      => 9999,
				'appearance' => array(
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),
		),
	),
);

## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder
?>	