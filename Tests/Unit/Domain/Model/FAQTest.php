<?php

namespace JS\JsFaq\Tests;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Jainish Senjaliya <jainish.online@gmail.com>
 *  			
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
 * Test case for class \JS\JsFaq\Domain\Model\FAQ.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage FAQ - Frequently Asked Questions
 *
 * @author Jainish Senjaliya <jainish.online@gmail.com>
 */
class FAQTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {
	/**
	 * @var \JS\JsFaq\Domain\Model\FAQ
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new \JS\JsFaq\Domain\Model\FAQ();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getQuestionReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setQuestionForStringSetsQuestion() { 
		$this->fixture->setQuestion('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getQuestion()
		);
	}
	
	/**
	 * @test
	 */
	public function getAskedByReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setAskedByForStringSetsAskedBy() { 
		$this->fixture->setAskedBy('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getAskedBy()
		);
	}
	
	/**
	 * @test
	 */
	public function getRelatedLinkReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setRelatedLinkForStringSetsRelatedLink() { 
		$this->fixture->setRelatedLink('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getRelatedLink()
		);
	}
	
	/**
	 * @test
	 */
	public function getExpertReturnsInitialValueForExpert() { }

	/**
	 * @test
	 */
	public function setExpertForExpertSetsExpert() { }
	
	/**
	 * @test
	 */
	public function getRelatedReturnsInitialValueForFAQ() { 
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getRelated()
		);
	}

	/**
	 * @test
	 */
	public function setRelatedForObjectStorageContainingFAQSetsRelated() { 
		$related = new \JS\JsFaq\Domain\Model\FAQ();
		$objectStorageHoldingExactlyOneRelated = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneRelated->attach($related);
		$this->fixture->setRelated($objectStorageHoldingExactlyOneRelated);

		$this->assertSame(
			$objectStorageHoldingExactlyOneRelated,
			$this->fixture->getRelated()
		);
	}
	
	/**
	 * @test
	 */
	public function addRelatedToObjectStorageHoldingRelated() {
		$related = new \JS\JsFaq\Domain\Model\FAQ();
		$objectStorageHoldingExactlyOneRelated = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneRelated->attach($related);
		$this->fixture->addRelated($related);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneRelated,
			$this->fixture->getRelated()
		);
	}

	/**
	 * @test
	 */
	public function removeRelatedFromObjectStorageHoldingRelated() {
		$related = new \JS\JsFaq\Domain\Model\FAQ();
		$localObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$localObjectStorage->attach($related);
		$localObjectStorage->detach($related);
		$this->fixture->addRelated($related);
		$this->fixture->removeRelated($related);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getRelated()
		);
	}
	
	/**
	 * @test
	 */
	public function getCategoryReturnsInitialValueForCategory() { 
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getCategory()
		);
	}

	/**
	 * @test
	 */
	public function setCategoryForObjectStorageContainingCategorySetsCategory() { 
		$category = new \JS\JsFaq\Domain\Model\Category();
		$objectStorageHoldingExactlyOneCategory = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneCategory->attach($category);
		$this->fixture->setCategory($objectStorageHoldingExactlyOneCategory);

		$this->assertSame(
			$objectStorageHoldingExactlyOneCategory,
			$this->fixture->getCategory()
		);
	}
	
	/**
	 * @test
	 */
	public function addCategoryToObjectStorageHoldingCategory() {
		$category = new \JS\JsFaq\Domain\Model\Category();
		$objectStorageHoldingExactlyOneCategory = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneCategory->attach($category);
		$this->fixture->addCategory($category);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneCategory,
			$this->fixture->getCategory()
		);
	}

	/**
	 * @test
	 */
	public function removeCategoryFromObjectStorageHoldingCategory() {
		$category = new \JS\JsFaq\Domain\Model\Category();
		$localObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$localObjectStorage->attach($category);
		$localObjectStorage->detach($category);
		$this->fixture->addCategory($category);
		$this->fixture->removeCategory($category);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getCategory()
		);
	}
	
	/**
	 * @test
	 */
	public function getAnswerReturnsInitialValueForContent() { 
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getAnswer()
		);
	}

	/**
	 * @test
	 */
	public function setAnswerForObjectStorageContainingContentSetsAnswer() { 
		$answer = new \JS\JsFaq\Domain\Model\Content();
		$objectStorageHoldingExactlyOneAnswer = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneAnswer->attach($answer);
		$this->fixture->setAnswer($objectStorageHoldingExactlyOneAnswer);

		$this->assertSame(
			$objectStorageHoldingExactlyOneAnswer,
			$this->fixture->getAnswer()
		);
	}
	
	/**
	 * @test
	 */
	public function addAnswerToObjectStorageHoldingAnswer() {
		$answer = new \JS\JsFaq\Domain\Model\Content();
		$objectStorageHoldingExactlyOneAnswer = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$objectStorageHoldingExactlyOneAnswer->attach($answer);
		$this->fixture->addAnswer($answer);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneAnswer,
			$this->fixture->getAnswer()
		);
	}

	/**
	 * @test
	 */
	public function removeAnswerFromObjectStorageHoldingAnswer() {
		$answer = new \JS\JsFaq\Domain\Model\Content();
		$localObjectStorage = new \TYPO3\CMS\Extbase\Persistence\Generic\ObjectStorage();
		$localObjectStorage->attach($answer);
		$localObjectStorage->detach($answer);
		$this->fixture->addAnswer($answer);
		$this->fixture->removeAnswer($answer);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getAnswer()
		);
	}
	
}
?>