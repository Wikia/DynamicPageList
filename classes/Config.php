<?php
/**
 * DynamicPageList3
 * DPL Config Class
 *
 * @package DynamicPageList3
 * @author  IlyaHaykinson, Unendlich, Dangerville, Algorithmix, Theaitetos, Alexia E. Smith
 * @license GPL-2.0-or-later
 **/

namespace DPL;

class Config {
	/**
	 * Configuration Settings
	 *
	 * @var array
	 */
	static private $settings = [];

	/**
	 * Initialize the static object with settings.
	 *
	 * @param array	Settings to initialize for DPL.
	 *
	 * @return void
	 */
	public static function init($settings = false) {
		if ($settings === false) {
			global $wgDplSettings;

			$settings = $wgDplSettings;
		}

		if (!is_array($settings)) {
			throw new MWException(__METHOD__ . ": Invalid settings passed.");
		}

		self::$settings = array_merge(self::$settings, $settings);
	}

	/**
	 * Return a single setting.
	 *
	 * @param string	Setting Key
	 *
	 * @return mixed	The setting's actual setting or null if it does not exist.
	 */
	public static function getSetting($setting) {
		return (array_key_exists($setting, self::$settings) ? self::$settings[$setting] : null);
	}

	/**
	 * Return a all settings.
	 *
	 * @return array	All settings
	 */
	public static function getAllSettings() {
		return self::$settings;
	}

	/**
	 * Set a single setting.
	 *
	 * @param string	Setting Key
	 * @param mixed	[Optional] Appropriate value for the setting key.
	 *
	 * @return void
	 */
	public static function setSetting($setting, $value = null) {
		if (empty($setting) || !is_string($setting)) {
			throw new MWException(__METHOD__ . ": Setting keys can not be blank.");
		}
		self::$settings[$setting] = $value;
	}
}
