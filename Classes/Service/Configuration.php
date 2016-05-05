<?php
namespace JS\JsFaq\Service;

use JS\JsFaq\Service\SettingsService;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014-2016 Jainish Senjaliya <jainishsenjaliya@gmail.com>
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
 * Configuration class
 *
 * @package JS
 * @subpackage js_faq
 * (c) 2014-2016 Jainish Senjaliya <jainishsenjaliya@gmail.com>
 * @author Jainish Senjaliya <jainishsenjaliya@gmail.com>
 * 
 */

class Configuration implements \TYPO3\CMS\Core\SingletonInterface {

	/**
	 * template
	 *
	 * @return
	 */
	 
	function template()
	{
		$settings = SettingsService::getSettings();

		if($settings['configuration']!=1){
			return 2;
		}else if($settings['main']['startingPoint']=="" ){
			return 0;
		}
		return 1;
	}

	/**
	 * additionalData
	 *
	 * @return
	 */
	
	function additionalData()
	{
		$settings = SettingsService::getSettings();

		// Inlcude JS

		$javascript = $settings['additional']['javascript'];

		if($javascript['jQueryLib']['include']==1){

			$jQueryLib = '<script src="typo3conf/ext/js_faq/Resources/Public/Script/jquery.min.js" type="text/javascript"></script>'.$additionalDataJS;

			if($javascript['jQueryLib']['includeInFooter']==1){
				$GLOBALS['TSFE']->additionalFooterData['JsFaq.jQueryLib'] = $jQueryLib;
			}else{
				$GLOBALS['TSFE']->additionalHeaderData['JsFaq.jQueryLib'] = $jQueryLib;	
			}
		}

		$toggleJS = '<script src="typo3conf/ext/js_faq/Resources/Public/Script/JsFaqToggle.js" type="text/javascript"></script>';

		if(isset($javascript['toggle']['includeInFooter']) && $javascript['toggle']['includeInFooter'] ==0){
			$GLOBALS['TSFE']->additionalHeaderData['JsFaq.Toggle'] = $toggleJS;
		}else{
			$GLOBALS['TSFE']->additionalFooterData['JsFaq.Toggle'] = $toggleJS;
		}

		// Inlcude CSS

		$css = $settings['additional']['css'];

		$style = $css['fancy']['include']==1?'Fancy':'Basic';

		$additionalDataCSS = '<link rel="stylesheet" href="typo3conf/ext/js_faq/Resources/Public/Css/'.$style.'.css" type="text/css" media="all" />';
		
		if($css['responsive']['include']==1){
			$additionalDataCSS .= '<link rel="stylesheet" href="typo3conf/ext/js_faq/Resources/Public/Css/Responsive.css" type="text/css" media="all" />';
		}

		if($css['includeInFooter']==1){
			$GLOBALS['TSFE']->additionalFooterData['JsFaq.CSS'] = $additionalDataCSS;
		}else{
			$GLOBALS['TSFE']->additionalHeaderData['JsFaq.CSS'] = $additionalDataCSS;	
		}
	}

	/**
	 * falImages
	 *
	 * @param $result
	 * @param $tablename
	 * @param $fieldname
	 * @return
	 */
	public function falImages($result, $tablename = NULL, $fieldname = NULL) {
		
		$where = '';

		if ($tablename != '') {
			$where = ' AND tablenames = "' . $tablename . '"';
		}
		if ($fieldname != '') {
			$where .= ' AND fieldname IN ("' . $fieldname . '")';
		}

		foreach ($result as $key => $value) {

			$whr = ' deleted= 0 and hidden = 0 ' . $where . ' AND uid_foreign = ' . $value['uid'];
			$sysImages = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('*', 'sys_file_reference', $whr);
			$arr = '';

			foreach ($sysImages as $key1 => $value1) {

				$whr1  = 'uid = ' . $value1['uid_local'];

				$sysImageDetail = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows('*', 'sys_file', $whr1);

				$arr1 = GeneralUtility::trimExplode('/', $sysImageDetail[0]['mime_type'], true);

				$arr[$value1['fieldname']][$value1['uid']] = array(

						'identifier'	=> 'fileadmin' . $sysImageDetail[0]['identifier'],
						'title'			=> $value1['title'],
						'caption'		=> $value1['description'],
						'extension'		=> $sysImageDetail[0]['extension'],
						'mime_type'		=> $sysImageDetail[0]['mime_type'],
						'name'			=> $sysImageDetail[0]['name'],
						'uid'			=> $sysImageDetail[0]['uid'],
						'mime'			=> $arr1[0],
						'type'			=> $arr1[1],
						'imageName'		=> basename($sysImageDetail[0]['identifier']),
					);
			}

			$result[$key]['media'] = $arr;
		}
		return $result;
	}
}