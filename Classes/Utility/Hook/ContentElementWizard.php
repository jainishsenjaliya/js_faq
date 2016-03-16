<?php
namespace JS\JsFaq\Utility\Hook;

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

/***************************************************************
*  Copyright notice
*
*  (c) 2015-2016 Jainish Senjaliya <jainishsenjaliya@gmail.com>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * Class ContentElementWizard allowes a new icon/link for js_greetingcards
 * on adding new content elements
 *
 * @package JS\JsFaq\Utility\Hook
 */
class ContentElementWizard {

	/**
	 * Path to locallang file (with : as postfix)
	 *
	 * @var string
	 */
	protected $locallangPath = 'LLL:EXT:js_faq/Resources/Private/Language/locallang-wizard.xlf:';

	/**
	 * @var \TYPO3\CMS\Lang\LanguageService
	 */
	protected $languageService = NULL;

	/**
	 * Adding a new content element wizard item for powermail
	 *
	 * @param array $contentElementWizardItems
	 * @return array
	 */
	function proc( $wizardItems ) {

		$this->initialize();

		$wizardItems['plugins_tx_jsfaq_faq'] = array(
			'icon' => ExtensionManagementUtility::extRelPath('js_faq') . 'Resources/Public/Icons/wizard_icon.png',
			'title' => $this->languageService->sL($this->locallangPath.'plugin-title', TRUE),
			'description' => $this->languageService->sL($this->locallangPath.'plugin-description', TRUE),
			'params' => '&defVals[tt_content][CType]=list&defVals[tt_content][list_type]=jsfaq_faq',
			'tt_content_defValues' => array(
				'CType' => 'list',
			),
		);

		return $wizardItems;
	}

	/**
	 * Initialize
	 *
	 * @return void
	 */
	protected function initialize() {
		$this->languageService = $GLOBALS['LANG'];
	}
}	