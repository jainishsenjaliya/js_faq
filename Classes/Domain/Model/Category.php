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
 * Category
 */
class Category extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * name
	 *
	 * @var \string
	 */
	protected $name = '';

	/**
	 * image
	 *
	 * @var \string
	 */
	protected $image = NULL;

	/**
	 * shortcutToPage
	 *
	 * @var \string
	 */
	protected $shortcutToPage = NULL;

	/**
	 * Returns the image
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
	 */
	public function getImage() {
		return $this->image;
	}

	/**
	 * Sets the image
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
	 * @return void
	 */
	public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image) {
		$this->image = $image;
	}

	/**
	 * Returns the shortcutToPage
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $shortcutToPage
	 */
	public function getShortcutToPage() {
		return $this->shortcutToPage;
	}

	/**
	 * Sets the shortcutToPage
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $shortcutToPage
	 * @return void
	 */
	public function setShortcutToPage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $shortcutToPage) {
		$this->shortcutToPage = $shortcutToPage;
	}

	/**
	 * Returns the name
	 *
	 * @return string name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets the name
	 *
	 * @param string $name
	 * @return string name
	 */
	public function setName($name) {
		$this->name = $name;
	}

}
?>