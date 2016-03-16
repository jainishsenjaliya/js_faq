<?php
namespace JS\JsFaq\Utility\Hook;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015-2016 Jainish Senjaliya <jainishsenjaliya@gmail.com> 
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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
 * Show Plugin Information in Page Module to every js_faq content element
 *
 * @package JS\JsFaq\Utility\Hook
 * @license http://www.gnu.org/licenses/lgpl.html
 * 			GNU Lesser General Public License, version 3 or later
 */


class PluginInformation {

	/**
	 * Params
	 *
	 * @var array
	 */
	public $params;
	
	/**
	 * Path to locallang file
	 *
	 * @var string
	 */
	protected $locallangPath = 'LLL:EXT:js_faq/Resources/Private/Language/locallang-plugin-information.xlf:';

	/**
	 * @var \TYPO3\CMS\Lang\LanguageService
	 */
	protected $languageService = NULL;
	
	/**
	 * Build HTML table for plugin information
	 *
	 * @param array $params
	 * @return string
	 */
	public function build($params = array()) {

		$content .= '';
		
		$imagePath = $this->getSubFolderOfCurrentUrl().'typo3conf/ext/js_faq/Resources/Public/Icons/plugin-information.png';
		
		$content .= '<h4>
						<img src="' . $imagePath . '" alt="'.$this->getLocalizedLabel('plugin-title').'" title="'.$this->getLocalizedLabel('plugin-title').'" /><br />
						<label style="display: inline-block; vertical-align: top; margin-top: 4px;padding-left:5px;">'.$this->getLocalizedLabel('plugin-title').'</label>
					</h4><br>';

		$content .= '<table class="typo3-dblist" style="width: 100%; border: 1px solid #d7d7d7;">';
		$content .= '<tr class="bgColor2">';
		$content .= '<td style="padding: 5px;"><strong>'.$this->getLocalizedLabel('plugin-settings').'</strong></td>';
		$content .= '<td style="padding: 5px;"><strong>'.$this->getLocalizedLabel('plugin-value').'</strong></td>';
		
		$i = 0;
		
		foreach ($this->getLabelsAndValues($params) as $label => $value) {
			
			$content .= '<tr class="bgColor' . ($i % 2 ? '1' : '4') . '">';
			$content .= '<td style="width: 40%; padding: 5px;">' . $label . '</td>';
			$content .= '<td style="padding: 5px;">' . ucfirst($value) . '</td>';
			$content .= '</tr>';
			$i++;
		}
		
		$content .= '</tr>';
		$content .= '</table>';
		
		return $content;
	}
	

	/**
	 * Build array with label => value for table view
	 *
	 * @return array
	 */
	protected function getLabelsAndValues($params) {

		$array = array(
			$this->getLocalizedLabel('main.order') => $this->getLocalizedLabel("main.order.".$this->getFieldFromFlexform($params,'main', 'main.order')),
			$this->getLocalizedLabel('main.orderType') => $this->getLocalizedLabel("main.orderType.".$this->getFieldFromFlexform($params,'main', 'main.orderType')),
			$this->getLocalizedLabel('main.displayFAQ') => $this->getLocalizedLabel("main.displayFAQ.".$this->getFieldFromFlexform($params,'main', 'main.displayFAQ')),
			$this->getLocalizedLabel('main.startingPoint') => $this->getFieldFromFlexform($params,'main', 'main.startingPoint'),
		);

		return $array;
	}
	
	/**
	 * Get field value from flexform configuration
	 *
	 * @param array $params array
	 * @param string $sheet name of the sheet
	 * @param string $key name of the key
	 * @return string value if found
	 */
	protected function getFieldFromFlexform($params, $sheet, $key) {
		
		$key = 'settings.' . $key;
		
		$flexform = GeneralUtility::xml2array($params['row']['pi_flexform']);
		
		if (
			is_array($flexform)
			&& is_array($flexform['data'][$sheet])
			&& is_array($flexform['data'][$sheet]['lDEF'])
			&& is_array($flexform['data'][$sheet]['lDEF'][$key])
			&& isset($flexform['data'][$sheet]['lDEF'][$key]['vDEF'])
		) {
			return $flexform['data'][$sheet]['lDEF'][$key]['vDEF'];
		}

		$this->showTable = FALSE;
		return FALSE;
	}
	
	/**
	 * Build image html tag
	 *
	 * @param string $resourcePathAndFilename like "Image/icon.png"
	 * @param string $alt
	 * @return string
	 */
	protected function buildImageMarkup($resourcePathAndFilename, $alt = '0') {
		$imagePathAndFilename = $this->getSubFolderOfCurrentUrl().'typo3conf/ext/js_faq/Resources/Public/Images/';
		$imagePathAndFilename .= $resourcePathAndFilename;
		return '<img src="' . $imagePathAndFilename . '" alt="' . $alt . '" />';
	}	
	
	/**
	 * Get Subfolder of current TYPO3 Installation
	 *        and never return "//"
	 *
	 * @param bool $leadingSlash will be prepended
	 * @param bool $trailingSlash will be appended
	 * @param string $testHost can be used for a test
	 * @param string $testUrl can be used for a test
	 * @return string
	 */
	public static function getSubFolderOfCurrentUrl($leadingSlash = TRUE, $trailingSlash = TRUE, $testHost = NULL, $testUrl = NULL) {

		$subfolder = '';

		$typo3RequestHost = GeneralUtility::getIndpEnv('TYPO3_REQUEST_HOST');

		if ($testHost) {
			$typo3RequestHost = $testHost;
		}

		$typo3SiteUrl = GeneralUtility::getIndpEnv('TYPO3_SITE_URL');
		
		if ($testUrl) {
			$typo3SiteUrl = $testUrl;
		}

		// if subfolder
		if ($typo3RequestHost . '/' !== $typo3SiteUrl) {
			$subfolder = substr(str_replace($typo3RequestHost . '/', '', $typo3SiteUrl), 0, -1);
		}
		if ($trailingSlash && substr($subfolder, 0, -1) !== '/') {
			$subfolder .= '/';
		}
		if ($leadingSlash && $subfolder[0] !== '/') {
			$subfolder = '/' . $subfolder;
		}
		return $subfolder;
	}
	
	
	/**
	 * Get localized label from locallang_db.xlf
	 *
	 * @param string $key
	 * @return string
	 */
	protected function getLocalizedLabel($key) {
		return $GLOBALS['LANG']->sL($this->locallangPath.$key);
	}
}