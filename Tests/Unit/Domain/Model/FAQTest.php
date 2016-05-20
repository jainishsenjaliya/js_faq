<?php

namespace JS\JsFaq\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 Jainish Senjaliya <jainishsenjaliya@gmail.com>
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
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Jainish Senjaliya <jainishsenjaliya@gmail.com>
 */
class FAQTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \JS\JsFaq\Domain\Model\FAQ
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \JS\JsFaq\Domain\Model\FAQ();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getQuestionReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getQuestion()
		);
	}

	/**
	 * @test
	 */
	public function setQuestionForStringSetsQuestion()
	{
		$this->subject->setQuestion('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'question',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getAskedByReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getAskedBy()
		);
	}

	/**
	 * @test
	 */
	public function setAskedByForStringSetsAskedBy()
	{
		$this->subject->setAskedBy('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'askedBy',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getRelatedLinkReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getRelatedLink()
		);
	}

	/**
	 * @test
	 */
	public function setRelatedLinkForStringSetsRelatedLink()
	{
		$this->subject->setRelatedLink('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'relatedLink',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getExpertReturnsInitialValueForExpert()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getExpert()
		);
	}

	/**
	 * @test
	 */
	public function setExpertForExpertSetsExpert()
	{
		$expertFixture = new \JS\JsFaq\Domain\Model\Expert();
		$this->subject->setExpert($expertFixture);

		$this->assertAttributeEquals(
			$expertFixture,
			'expert',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getRelatedReturnsInitialValueForFAQ()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getRelated()
		);
	}

	/**
	 * @test
	 */
	public function setRelatedForObjectStorageContainingFAQSetsRelated()
	{
		$related = new \JS\JsFaq\Domain\Model\FAQ();
		$objectStorageHoldingExactlyOneRelated = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneRelated->attach($related);
		$this->subject->setRelated($objectStorageHoldingExactlyOneRelated);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneRelated,
			'related',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addRelatedToObjectStorageHoldingRelated()
	{
		$related = new \JS\JsFaq\Domain\Model\FAQ();
		$relatedObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$relatedObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($related));
		$this->inject($this->subject, 'related', $relatedObjectStorageMock);

		$this->subject->addRelated($related);
	}

	/**
	 * @test
	 */
	public function removeRelatedFromObjectStorageHoldingRelated()
	{
		$related = new \JS\JsFaq\Domain\Model\FAQ();
		$relatedObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$relatedObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($related));
		$this->inject($this->subject, 'related', $relatedObjectStorageMock);

		$this->subject->removeRelated($related);

	}

	/**
	 * @test
	 */
	public function getCategoryReturnsInitialValueForCategory()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getCategory()
		);
	}

	/**
	 * @test
	 */
	public function setCategoryForObjectStorageContainingCategorySetsCategory()
	{
		$category = new \JS\JsFaq\Domain\Model\Category();
		$objectStorageHoldingExactlyOneCategory = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneCategory->attach($category);
		$this->subject->setCategory($objectStorageHoldingExactlyOneCategory);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneCategory,
			'category',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addCategoryToObjectStorageHoldingCategory()
	{
		$category = new \JS\JsFaq\Domain\Model\Category();
		$categoryObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$categoryObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($category));
		$this->inject($this->subject, 'category', $categoryObjectStorageMock);

		$this->subject->addCategory($category);
	}

	/**
	 * @test
	 */
	public function removeCategoryFromObjectStorageHoldingCategory()
	{
		$category = new \JS\JsFaq\Domain\Model\Category();
		$categoryObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$categoryObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($category));
		$this->inject($this->subject, 'category', $categoryObjectStorageMock);

		$this->subject->removeCategory($category);

	}

	/**
	 * @test
	 */
	public function getAnswerReturnsInitialValueForContent()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getAnswer()
		);
	}

	/**
	 * @test
	 */
	public function setAnswerForObjectStorageContainingContentSetsAnswer()
	{
		$answer = new \JS\JsFaq\Domain\Model\Content();
		$objectStorageHoldingExactlyOneAnswer = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneAnswer->attach($answer);
		$this->subject->setAnswer($objectStorageHoldingExactlyOneAnswer);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneAnswer,
			'answer',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addAnswerToObjectStorageHoldingAnswer()
	{
		$answer = new \JS\JsFaq\Domain\Model\Content();
		$answerObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$answerObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($answer));
		$this->inject($this->subject, 'answer', $answerObjectStorageMock);

		$this->subject->addAnswer($answer);
	}

	/**
	 * @test
	 */
	public function removeAnswerFromObjectStorageHoldingAnswer()
	{
		$answer = new \JS\JsFaq\Domain\Model\Content();
		$answerObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$answerObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($answer));
		$this->inject($this->subject, 'answer', $answerObjectStorageMock);

		$this->subject->removeAnswer($answer);

	}
}
