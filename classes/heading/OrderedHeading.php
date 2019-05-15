<?php
/**
 * DynamicPageList3
 * DPL OrderedHeading Class
 *
 * @package DynamicPageList3
 * @author  Alexia E. Smith
 * @license GPL-2.0-or-later
 **/

namespace DPL\Heading;

class OrderedHeading extends UnorderedHeading {
	/**
	 * List(Section) Start
	 *
	 * @var string
	 */
	public $listStart = '<ol%s>';

	/**
	 * List(Section) End
	 *
	 * @var string
	 */
	public $listEnd = '</ol>';
}
