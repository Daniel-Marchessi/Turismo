<?php

namespace Ait\Updater;


class ThemesAndPluginsDetector
{
	/** @var array */
	protected static $detectedAitThemes;

	/** @var array */
	protected static $detectedAitPlugins;



	protected static function searchForAitThemes()
	{
		if(self::$detectedAitThemes === null){
			$themes = wp_get_themes();

			self::$detectedAitThemes = array('club' => array(), 'themeforest' => array());

			foreach($themes as $theme){
				$codename = $theme->stylesheet;
				$author = strtolower($theme->get('Author'));
				if($author === 'aitthemes.com'){
					self::$detectedAitThemes['themeforest'][$codename] = $theme->get('Version');
				}elseif(
					$author === 'aitthemes.club' and
					$theme->template !== 'skeleton' and // built themes do not have 'Template:' header, so our dev child themes are not detected
					$theme->stylesheet !== 'skeleton'  // also skip Skeleton itself
				){
					if(self::isThemeForThemeforest($theme)){
						self::$detectedAitThemes['themeforest'][$codename] = $theme->get('Version');
					}else{
						self::$detectedAitThemes['club'][$codename] = $theme->get('Version');
					}
				}
			}
		}

		return self::$detectedAitThemes;
	}



	public static function checkIfActiveThemeIsRenamed()
	{
		$stylesheet = get_option('stylesheet');
		$template = get_option('template');

		$themes = wp_get_themes();



		$checkCodename = function($themephp, $codename)
		{
			$content = file_get_contents($themephp);
			preg_match("/define\('AIT_THEME_CODENAME',\s'(.+)'/i", $content, $result);
			if(isset($result[1]) and $result[1] === $codename){
				return true;
			}
			return false;
		};

		$getCodename = function($themephp)
		{
			$content = file_get_contents($themephp);
			preg_match("/define\('AIT_THEME_CODENAME',\s'(.+)'/i", $content, $result);
			if(isset($result[1])){
				return $result[1];
			}
			return '';
		};


		$isActiveTheme = function($theme) use($stylesheet)
		{
			return ($theme->stylesheet === $stylesheet);
		};


		$isChildTheme = function($theme) use($stylesheet, $template)
		{
			return ($stylesheet !== $template and $theme->stylesheet === $stylesheet);
		};


		$result = array(
			'path'         => '',
			'theme_name'        => '',
			'parent_theme_name' => '',
			'dir_name'     => '',
			'codename'     => '',
			'valid'        => true,
			'type'         => 'normal',
		);

		if(is_multisite() and is_network_admin()){
			return $result;
		}

		foreach($themes as $theme){
			if(!$isActiveTheme($theme)) continue;

			$author = strtolower($theme->get('Author'));
			$result['theme_name'] = $theme->name;

			if($isChildTheme($theme)){ // check the parent theme instead
				if(file_exists($themephp = $theme->template_dir . '/ait-theme/@theme.php')){
					$result['parent_theme_name'] = $theme->parent()->name;
					$result['path'] = $theme->template_dir;
					$result['dir_name'] = basename($theme->template_dir);
					$result['codename'] = $getCodename($themephp);
					$result['type'] = 'parent';
					if(!$checkCodename($themephp, $theme->template)){
						$result['valid'] = false;
						break;
					}
				}
			}else{
				if(file_exists($themephp = $theme->stylesheet_dir . '/ait-theme/@theme.php')){
					$result['path'] = $theme->stylesheet_dir;
					$result['dir_name'] = basename($theme->stylesheet_dir);
					$result['codename'] = $getCodename($themephp);
					if(!$checkCodename($themephp, $theme->stylesheet)){
						$result['valid'] = false;
						break;
					}
				}
			}
		}

		return $result;
	}



	public static function getTypeOfTheme($codename)
	{
		$themes = self::searchForAitThemes();
		if(isset($themes['club'][$codename])) return 'club';
		if(isset($themes['themeforest'][$codename])) return 'themeforest';
		return null;
	}



	public static function getAllAitThemes()
	{
		$themes = self::searchForAitThemes();
		return array_merge($themes['club'], $themes['themeforest']);
	}



	public static function getAitClubThemes()
	{
		$themes = self::searchForAitThemes();
		return $themes['club'];
	}



	public static function isThereAnyAitClubThemes()
	{
		return (bool) count(self::getAitClubThemes());
	}



	public static function getAitThemeforestThemes()
	{
		$themes = self::searchForAitThemes();
		return $themes['themeforest'];
	}



	public static function isThereAnyThemeforestThemes()
	{
		return (bool) count(self::getAitThemeforestThemes());
	}



	public static function isThemeForThemeforest($theme)
	{
		$themephp = $theme->get_template_directory() . '/ait-theme/@theme.php';
		if(file_exists($themephp)){
			$content = file_get_contents($themephp);
			preg_match("/define\('AIT_THEME_PACKAGE',\s'(.+)'/i", $content, $result);
			if(isset($result[1]) and $result[1] === 'themeforest'){
				return true;
			}
		}

		return false;
	}



	public static function getAitPlugins()
	{
		if(self::$detectedAitPlugins === null){

			$plugins = get_plugins();

			self::$detectedAitPlugins = array();

			foreach($plugins as $pluginBasename => $data){
				if(strtolower($data['Author']) === 'aitthemes.club'){
					$codename = dirname($pluginBasename);
					self::$detectedAitPlugins[$codename] = array(
						'codename' => $codename,
						'plugin' => $pluginBasename,
						'version' => $data['Version'],
					);
				// revslider bundled with our themes is updated via our server
				}elseif($pluginBasename === 'revslider/revslider.php'){
					self::$detectedAitPlugins['revslider'] = array(
						'codename' => 'revslider',
						'plugin' => $pluginBasename,
						'version' => $data['Version'],
					);
				}
			}
		}

		return self::$detectedAitPlugins;
	}



	public static function getAitPluginsExceptPrepackedAndFree()
	{
		$p = self::getAitPlugins();
		foreach(self::getFreePlugins() as $plugin){
			unset($p[$plugin]);
		}

		foreach(self::getPrepackedPlugins() as $plugin){
			unset($p[$plugin]);
		}

		return $p;
	}



	public static function getAitPluginsExceptFree()
	{
		$p = self::getAitPlugins();
		foreach(self::getFreePlugins() as $plugin){
			unset($p[$plugin]);
		}

		return $p;
	}



	public static function isThereAnyAitPlugins()
	{
		return (bool) count(self::getAitPlugins());
	}



	public static function isThereAnyAitPluginsExceptPrepacked()
	{
		$p = self::getAitPlugins();
		foreach(self::getPrepackedPlugins() as $plugin){
			unset($p[$plugin]);
		}
		return (bool) count($p);
	}



	public static function isThereAnyAitPluginsExceptFree()
	{
		$p = self::getAitPlugins();
		foreach(self::getFreePlugins() as $plugin){
			unset($p[$plugin]);
		}
		return (bool) count($p);
	}



	public static function isThereAnyAitPluginsExceptPrepackedAndFree()
	{
		return (bool) count(self::getAitPluginsExceptPrepackedAndFree());
	}



	public static function isFreePlugin($plugin)
	{
		return in_array($plugin, self::getFreePlugins());
	}



	public static function isPrepackedPlugin($plugin)
	{
		return in_array($plugin, self::getPrepackedPlugins());
	}



	public static function getFreePlugins()
	{
		return array(
			'ait-updater',
			'ait-wp42-compatibility-fix',
			'ait-directory-migrations',
		);
	}



	public static function getPrepackedPlugins()
	{
		return array(
			'ait-toolkit',
			'ait-shortcodes',
			'revslider',
		);
	}
}
