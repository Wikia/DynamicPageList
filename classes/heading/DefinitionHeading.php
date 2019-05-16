<?php
/**
 * DynamicPageList3
 * DPL DefinitionHeading Class
 *
 * @package DynamicPageList3
 * @author  Alexia E. Smith
 * @license GPL-2.0-or-later
 **/

namespace DPL\Heading;

use DPL\Lister\Lister;

class DefinitionHeading extends Heading {
	/**
	 * Heading List Start
	 * Use %s for attribute placement.  Example: <div%s>
	 *
	 * @var string
	 */
	public $headListStart = '<dt>';

	/**
	 * Heading List End
	 *
	 * @var string
	 */
	public $headListEnd = '</dt>';

	/**
	 * Heading List Start
	 * Use %s for attribute placement.  Example: <div%s>
	 *
	 * @var string
	 */
	public $headItemStart = '';

	/**
	 * Heading List End
	 *
	 * @var string
	 */
	public $headItemEnd = '';

	/**
	 * List(Section) Start
	 *
	 * @var string
	 */
	public $listStart = '<dl%s>';

	/**
	 * List(Section) End
	 *
	 * @var string
	 */
	public $listEnd = '</dl>';

	/**
	 * Item Start
	 *
	 * @var string
	 */
	public $itemStart = '<dd%s>';

	/**
	 * Item End
	 *
	 * @var string
	 */
	public $itemEnd = '</dd>';

	/**
	 * Format a heading group.
	 *
	 * @param integer $headingStart Article start index for this heading.
	 * @param integer $headingCount Article count for this heading.
	 * @param string  $headingLink  Heading link/text display.
	 * @param array   $article      List of \DPL\Article.
	 * @param object  $lister       List of \DPL\Lister\Lister
	 *
	 * @return string Heading HTML
	 */
	public function formatItem(int $headingStart, int $headingCount, string $headingLink, array $articles, Lister $lister) {
		$item = '';

		$item .= $this->headListStart . $headingLink;
		if ($this->showHeadingCount) {
			$item .= $this->articleCountMessage($headingCount);
		}
		$item .= $this->headListEnd;
		$item .= $this->getItemStart() . $lister->formatList($articles, $headingStart, $headingCount) . $this->getItemEnd();

		return $item;
	}
}
