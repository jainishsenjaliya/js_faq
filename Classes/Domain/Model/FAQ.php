<?php
namespace JS\JsFaq\Domain\Model;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014 Jainish Senjaliya <jainish.online@gmail.com>
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
 * FAQ
 */
class FAQ extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * question
	 *
	 * @var \string
	 */
	protected $question = '';

	/**
	 * askedBy
	 *
	 * @var \string
	 */
	protected $askedBy = '';

	/**
	 * relatedLink
	 *
	 * @var \string
	 */
	protected $relatedLink = '';

	/**
	 * expert
	 *
	 * @var \JS\JsFaq\Domain\Model\Expert
	 */
	protected $expert = NULL;

	/**
	 * related
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JS\JsFaq\Domain\Model\FAQ>
	 */
	protected $related = NULL;

	/**
	 * category
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JS\JsFaq\Domain\Model\Category>
	 * @cascade remove
	 */
	protected $category = NULL;

	/**
	 * answer
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JS\JsFaq\Domain\Model\Content>
	 * @cascade remove
	 */
	protected $answer = NULL;

	/**
	 * Returns the question
	 *
	 * @return string $question
	 */
	public function getQuestion() {
		return $this->question;
	}

	/**
	 * Sets the question
	 *
	 * @param string $question
	 * @return void
	 */
	public function setQuestion($question) {
		$this->question = $question;
	}

	/**
	 * Returns the askedBy
	 *
	 * @return string $askedBy
	 */
	public function getAskedBy() {
		return $this->askedBy;
	}

	/**
	 * Sets the askedBy
	 *
	 * @param string $askedBy
	 * @return void
	 */
	public function setAskedBy($askedBy) {
		$this->askedBy = $askedBy;
	}

	/**
	 * Returns the expert
	 *
	 * @return \JS\JsFaq\Domain\Model\Expert $expert
	 */
	public function getExpert() {
		return $this->expert;
	}

	/**
	 * Sets the expert
	 *
	 * @param \JS\JsFaq\Domain\Model\Expert $expert
	 * @return void
	 */
	public function setExpert(\JS\JsFaq\Domain\Model\Expert $expert) {
		$this->expert = $expert;
	}

	/**
	 * Returns the relatedLink
	 *
	 * @return string $relatedLink
	 */
	public function getRelatedLink() {
		return $this->relatedLink;
	}

	/**
	 * Sets the relatedLink
	 *
	 * @param string $relatedLink
	 * @return void
	 */
	public function setRelatedLink($relatedLink) {
		$this->relatedLink = $relatedLink;
	}

	/**
	 * __construct
	 *
	 * @return
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all ObjectStorage properties.
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		/**
		 * Do not modify this method!
		 * It will be rewritten on each save in the extension builder
		 * You may modify the constructor of this class instead
		 */
		$this->related = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		
		$this->category = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		
		$this->answer = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Adds a Category
	 *
	 * @param \JS\JsFaq\Domain\Model\Category $category
	 * @return void
	 */
	public function addCategory(\JS\JsFaq\Domain\Model\Category $category) {
		$this->category->attach($category);
	}

	/**
	 * Removes a Category
	 *
	 * @param \JS\JsFaq\Domain\Model\Category $categoryToRemove The Category to be removed
	 * @return void
	 */
	public function removeCategory(\JS\JsFaq\Domain\Model\Category $categoryToRemove) {
		$this->category->detach($categoryToRemove);
	}

	/**
	 * Returns the category
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JS\JsFaq\Domain\Model\Category> $category
	 */
	public function getCategory() {
		return $this->category;
	}

	/**
	 * Sets the category
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JS\JsFaq\Domain\Model\Category> $category
	 * @return void
	 */
	public function setCategory(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $category) {
		$this->category = $category;
	}

	/**
	 * Adds a FAQ
	 *
	 * @param \JS\JsFaq\Domain\Model\FAQ $related
	 * @return void
	 */
	public function addRelated(\JS\JsFaq\Domain\Model\FAQ $related) {
		$this->related->attach($related);
	}

	/**
	 * Removes a FAQ
	 *
	 * @param \JS\JsFaq\Domain\Model\FAQ $relatedToRemove The FAQ to be removed
	 * @return void
	 */
	public function removeRelated(\JS\JsFaq\Domain\Model\FAQ $relatedToRemove) {
		$this->related->detach($relatedToRemove);
	}

	/**
	 * Returns the related
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JS\JsFaq\Domain\Model\FAQ> $related
	 */
	public function getRelated() {
		return $this->related;
	}

	/**
	 * Sets the related
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JS\JsFaq\Domain\Model\FAQ> $related
	 * @return void
	 */
	public function setRelated(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $related) {
		$this->related = $related;
	}

	/**
	 * Adds a Content
	 *
	 * @param \JS\JsFaq\Domain\Model\Content $answer
	 * @return void
	 */
	public function addAnswer(\JS\JsFaq\Domain\Model\Content $answer) {
		$this->answer->attach($answer);
	}

	/**
	 * Removes a Content
	 *
	 * @param \JS\JsFaq\Domain\Model\Content $answerToRemove The Content to be removed
	 * @return void
	 */
	public function removeAnswer(\JS\JsFaq\Domain\Model\Content $answerToRemove) {
		$this->answer->detach($answerToRemove);
	}

	/**
	 * Returns the answer
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JS\JsFaq\Domain\Model\Content> $answer
	 */
	public function getAnswer() {
		return $this->answer;
	}

	/**
	 * Sets the answer
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\JS\JsFaq\Domain\Model\Content> $answer
	 * @return void
	 */
	public function setAnswer(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $answer) {
		$this->answer = $answer;
	}

}
?>