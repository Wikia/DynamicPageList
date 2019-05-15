<?php
/**
 * DynamicPageList3
 * DPL UnorderedHeading Class
 *
 * @package DynamicPageList3
 * @author  Alexia E. Smith
 * @license GPL-2.0-or-later
 **/

namespace DPL\Heading;

class UnorderedHeading extends Heading {
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
