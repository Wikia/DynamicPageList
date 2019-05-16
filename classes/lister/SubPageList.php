<?php
/**
 * DynamicPageList3
 * DPL SubPageList Class
 *
 * @package DynamicPageList3
 * @author  Alexia E. Smith
 * @license GPL-2.0-or-later
 **/

namespace DPL\Lister;

class SubPageList extends UnorderedList {
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

	/**
	 * Format the list of articles.
	 *
	 * @param array   $articles List of \DPL\Article
	 * @param integer $start    Start position of the array to process.
	 * @param integer $count    Total objects from the array to process.
	 *
	 * @return string Formatted list.
	 */
	public function formatList(array $articles, int $start, int $count) {
		$filteredCount = 0;
		$items = [];
		for ($i = $start; $i < $start + $count; $i++) {
			$article = $articles[$i];
			if (empty($article) || empty($article->getTitle())) {
				continue;
			}

			$pageText = null;
			if ($this->includePageText) {
				$pageText = $this->transcludePage($article, $filteredCount);
			} else {
				$filteredCount++;
			}

			$this->rowCount = $filteredCount++;

			$parts = explode('/', $article->getTitle()->getPrefixedText());
			$item = $this->formatItem($article, $pageText);
			$items = $this->nestItem($parts, $items, $item);
		}

		return $this->getListStart() . $this->implodeItems($items) . $this->listEnd;
	}

	/**
	 * Nest items down to the proper level.
	 *
	 * @param array  $parts Part levels to nest down to.
	 * @param array  $items Items holder to nest the item into.
	 * @param string $item  Formatted Item
	 *
	 * @return array	Nest Items
	 */
	private function nestItem(array &$parts, array $items, string $item) {
		$firstPart = reset($parts);
		if (count($parts) > 1) {
			array_shift($parts);
			if (!isset($items[$firstPart])) {
				$items[$firstPart] = [];
			}
			$items[$firstPart] = $this->nestItem($parts, $items[$firstPart], $item);
			return $items;
		}
		$items[$firstPart][] = $item;

		return $items;
	}

	/**
	 * Join together items after being processed by formatItem().
	 *
	 * @param array $items Items as formatted by formatItem().
	 *
	 * @return string Imploded items.
	 */
	protected function implodeItems(array $items) {
		$list = '';
		foreach ($items as $key => $item) {
			if (is_string($item)) {
				$list .= $item;
				continue;
			}
			if (is_array($item)) {
				$list .= $this->getItemStart() . $key . $this->getListStart() . $this->implodeItems($item) . $this->listEnd . $this->getItemEnd();
			}
		}
		return $list;
	}
}
