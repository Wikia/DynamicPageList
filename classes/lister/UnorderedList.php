<?php
/**
 * DynamicPageList3
 * DPL UnorderedList Class
 *
 * @package DynamicPageList3
 * @author  Alexia E. Smith
 * @license GPL-2.0-or-later
 **/

namespace DPL\Lister;

class UnorderedList extends Lister {
	/**
	 * Listing style for this class.
	 *
	 * @var constant
	 */
	public $style = parent::LIST_UNORDERED;

	/**
	 * List(Section) Start
	 *
	 * @var string
	 */
	public $listStart = '<ul%s>';

	/**
	 * List(Section) End
	 *
	 * @var string
	 */
	public $listEnd = '</ul>';

	/**
	 * Item Start
	 *
	 * @var string
	 */
	public $itemStart = '<li%s>';

	/**
	 * Item End
	 *
	 * @var string
	 */
	public $itemEnd = '</li>';
}
