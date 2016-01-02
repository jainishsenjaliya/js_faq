<?php
namespace JS\JsFaq\Controller;

use TYPO3\CMS\Core\Utility\GeneralUtility;
/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014 Jainish Senjaliya <jainishsenjaliya@gmail.com>
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
 * FAQController
 */
class FAQController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * fAQRepository
	 *
	 * @var \JS\JsFaq\Domain\Repository\FAQRepository
	 * @inject
	 */
	protected $fAQRepository = NULL;

	/**
	 * fAQService
	 *
	 * @var \JS\JsFaq\Service\FAQService
	 * @inject
	 */
	protected $fAQService = NULL;

	/**
	 * action faq
	 *
	 * @return void
	 */
	public function faqAction() {

		$GLOBALS['TSFE']->set_no_cache();

		$detail = 0;

		if ($this->request->hasArgument('faq')) {

			$data = $this->request->getArguments('faq');

			if(intVal($data['faq'])){
				$detail = $data['faq'];
			}
		}

		$template = $this->fAQService->missingConfiguration($this->settings);
		
		$faq = $this->fAQRepository->getFAQData($this->settings, $detail);

		$categoryGroupWise = 0;

		if ($this->settings['displayFAQ'] == 'categoryGroupWise' && $detail==0) {
			$categoryGroupWise = 1;
			$faq = $this->fAQRepository->getFAQCategoryData($faq);
		}

		if (count($faq) == 0) {
			$template = 3;
		}

		$this->view->assign('FAQ', $faq);
		$this->view->assign('template', $template);
		$this->view->assign('detail', $detail);
		$this->view->assign('categoryGroupWise', $categoryGroupWise);
		
		// Include Additional Data
		$this->fAQService->includeAdditionalData($this->settings);
	}
}