<?php 
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder


$GLOBALS['TCA']['tx_jsfaq_domain_model_faq']['types']['1']['showitem'] = 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, question, answer,--div--; Details, asked_by, expert, related, related_link, category,--div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access,starttime, endtime';

$GLOBALS['TCA']['tx_jsfaq_domain_model_faq']['columns']['expert']['config']['items'] = array (
					array('',0),
				);

$GLOBALS['TCA']['tx_jsfaq_domain_model_faq']['columns']['expert']['config']['foreign_table_where'] = 
	' AND tx_jsfaq_domain_model_expert.hidden = 0 ORDER BY tx_jsfaq_domain_model_expert.name';


$GLOBALS['TCA']['tx_jsfaq_domain_model_faq']['columns']['related_link']['config']['cols'] = 40;
$GLOBALS['TCA']['tx_jsfaq_domain_model_faq']['columns']['related_link']['config']['rows'] = 5;

$GLOBALS['TCA']['tx_jsfaq_domain_model_faq']['columns']['category']['config']['foreign_table_where'] = 
	' AND tx_jsfaq_domain_model_category.hidden = 0 ORDER BY tx_jsfaq_domain_model_category.name';

$GLOBALS['TCA']['tx_jsfaq_domain_model_faq']['columns']['related']['config']['foreign_table_where'] = 
	' AND tx_jsfaq_domain_model_faq.hidden = 0 ORDER BY tx_jsfaq_domain_model_faq.question';

$GLOBALS['TCA']['tx_jsfaq_domain_model_faq']['columns']['related']['config']['wizards']['suggest']['type'] = 'suggest';