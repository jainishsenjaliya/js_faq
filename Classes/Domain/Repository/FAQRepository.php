<?php
namespace JS\JsFaq\Domain\Repository;

use JS\JsFaq\Service\Configuration;
use JS\JsFaq\Service\PageService;
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
 * The repository for FAQs
 */
class FAQRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

	/**
	 * @var array
	 */
	protected $defaultOrderings = array(
		'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
	);
	
	/**
	 * getFAQData
	 *
	 * @param $faq
	 * @return
	 */
	public function getFAQData($faq){

		$settings = SettingsService::getSettings();

		$this->fullURL = GeneralUtility::getIndpEnv('TYPO3_SITE_URL');

		$limit = '';

		if(isset($settings['main']['order'])){
			if ($settings['main']['order'] == 'expert') {
				$orderBy = ' e.name ' . $settings['main']['orderType'];
			} else {
				$orderBy = ' f.' . $settings['main']['order'] . ' ' . $settings['main']['orderType'];
			}
		}else{
			$orderBy = ' f.sorting desc';
		}

		$limit		= "";
				
		if(isset($settings['main']['limit']) && $settings['main']['limit']>0){
			$limit	= $settings['main']['limit'];
		}

		if ($settings['main']['displayFAQ'] == 'CategoryGroupWise' && $faq==0) {
			$orderBy = ' c.name ASC , '.$orderBy ;
		}
		
		$field = 'f.uid, f.question, f.asked_by, f.expert, f.answer, f.related, f.related_link, e.name, e.email, e.url, m.uid_foreign , group_concat( cast( c.name AS char ) ) AS categoryName, group_concat( cast( c.uid AS char ) ) AS categoryID';
		
		$table = 'tx_jsfaq_domain_model_faq as f 
						LEFT JOIN tx_jsfaq_domain_model_expert AS e ON f.expert = e.uid 
						LEFT JOIN tx_jsfaq_faq_category_mm AS m ON f.uid = m.uid_local 
						LEFT JOIN tx_jsfaq_domain_model_category AS c ON m.uid_foreign = c.uid ';

		$groupBy = '( f.uid )';
		
		$where = '';
		
		if ($faq > 0) {
			$where = ' AND f.uid =  \'' . $faq . '\'';
		} else {
			if (isset($settings['main']['startingPoint']) && $settings['main']['startingPoint'] != '') {

				$storagePids = PageService::extendPidListByChildrens($settings['main']['startingPoint'],$settings['main']['recursive']);

				$where .= ' AND f.pid in (' . $storagePids. ') ';
			}
			if (isset($settings['main']['categories']) && $settings['main']['categories'] != '') {
				$where .= ' AND m.uid_foreign IN (' . $settings['main']['categories'] . ')  ';
			}
		}

		$currentTime = time();
		
		$where = ' f.deleted = 0 AND f.hidden = 0 
						AND ( f.starttime =0 OR ( f.starttime <= ' . $currentTime . ' AND f.endtime >=' . $currentTime . ' )) ' . $where;

		// add language condition
		$where .= ' AND f.sys_language_uid IN (-1, ' . (int)$GLOBALS['TSFE']->sys_language_uid . ')';

		$conf = $this->getDBHandle()->exec_SELECTgetRows($field, $table, $where, $groupBy, $orderBy, $limit);
		
		$data = array();
		
		foreach ($conf as $key => $value) {

			$field1		= 'uid, options, description, image';
			$orderBy1	= ' sorting';
			$table1		= 'tx_jsfaq_domain_model_content';
			$where1		= ' deleted = 0 AND hidden = 0 AND faq = \'' . $value['uid'] . '\'';

			$answers	= Configuration::falImages($this->getDBHandle()->exec_SELECTgetRows($field1, $table1, $where1, '', $orderBy1), $table1, 'image');

			$field2		= 'f.uid, f.question';
			$orderBy2	= 'sorting_foreign';
			$table2		= 'tx_jsfaq_faq_faq_mm as m LEFT JOIN tx_jsfaq_domain_model_faq as f ON m.uid_foreign = f.uid';
			$where2		= ' uid_local = ' . $value['uid'];
			
			$related_faq = $this->getDBHandle()->exec_SELECTgetRows($field2, $table2, $where2, '', $orderBy2);

			$relatedFaq = array();

			foreach ($related_faq as $key => $val) {
				$relatedFaq[$val['uid']] = $val;
			}

			$related_link = GeneralUtility::trimExplode(chr(10), $value['related_link'], true);
			
			$data[$value['uid']] = $value;
			$data[$value['uid']]['answers'] = $answers;
			$data[$value['uid']]['related_link'] = $related_link;
			$data[$value['uid']]['related_faq'] = $relatedFaq;
		}

		return $data;

	}
	
	/**
	 * getFAQCategoryData
	 *
	 * @param $faq
	 * @param $category
	 * @return
	 */
	public function getFAQCategoryData($faq, $category)
	{
		$categoryArr = $arr = array();

		foreach ($faq as $key => $value) {
			if ($value['categoryID'] > 0) {
				$categoryArr[$value['categoryID']]['category'] = $value['categoryName'];
				$categoryArr[$value['categoryID']]['faq'][] = $value;
			}
		}

		$dataArray = GeneralUtility::trimExplode(',', $category, true);

		if(count($dataArray)>0){
			foreach ($dataArray as $key => $value) {
				$arr[$value] = $categoryArr[$value];
			}
			return $arr;
		}else{
			return $categoryArr;
		}

		return '';
	}

	/**
	 * getDBHandle
	 *
	 * @return
	 */
	public function getDBHandle()
	{
		return $GLOBALS['TYPO3_DB'];
	}
}
