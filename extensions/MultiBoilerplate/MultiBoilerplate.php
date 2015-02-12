<?php

/**
 * Allows a boilerplate to be selected from a drop down box located above the
 * edit form when editing non-exstant pages or, optionally (based upon
 * configuration variable $wgMultiBoilerplateOverwrite), load the template
 * over the current contents.
 *
 *  * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 *
 * @file
 * @ingroup Extensions
 *
 * @link https://www.mediawiki.org/wiki/Extension:MultiBoilerplate
 * @author Robert Leverington <robert@rhl.me.uk>
 * @author Al Maghi
 * @author Dror S. [FFS] <FreedomFighterSparrow@gmail.com
 * @copyright Copyright © 2007 - 2009 Robert Leverington.
 * @copyright Copyright © 2009 Al Maghi.
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 * @version 2.0.0a
 *
 * @TODO use the core ?preload=boilerplate when $wgMultiBoilerplateOverwrite == false
 * @TODO ajax-load the boilerplate, if possible
 * @TODO per-namespace boilerplates
 */

$extensionCredits = array(
	'path'           => __FILE__,
	'name'           => 'MultiBoilerplate',
	'version'        => '2.0.0a',
	'license-name'   => 'GPL-2.0+',
	'url'            => 'https://www.mediawiki.org/wiki/Extension:MultiBoilerplate',
	'author'         => array(
		'Robert Leverington',
		'Al Maghi',
		'Dror S.'
	)
);

$GLOBALS[ 'wgExtensionCredits' ][ 'other' ][] = $extensionCredits + array(
	'descriptionmsg' => 'multiboilerplate-desc',
);
$GLOBALS[ 'wgExtensionCredits' ][ 'specialpage' ][] = $extensionCredits + array(
	'descriptionmsg' => 'specialboilerplate-desc',
);

// Default configuration variables.
/**
 * Array of boilerplate names to boilerplate pages to load, for example:
 * $wgMultiBoilerplateOptions[ 'My Boilerplate' ] = 'Template:My Boilerplate';
 * If set to false then the MediaWiki:multiboilerplate message is used to configure
 * boilerplates in the format of:
 * "* Boilerplate Name|Template:Boilerplate Template"
 */
$GLOBALS['wgMultiBoilerplateOptions'] = array();
// Whether or not to show the form when editing pre-existing pages.
$GLOBALS['wgMultiBoilerplateOverwrite'] = false;

// To display a special page listing defined boilerplates, set *before* require_once:
// $wgMultiBoilerplateDiplaySpecialPage = true;

$GLOBALS[ 'wgAutoloadClasses' ][ 'MultiBoilerplateHooks' ] = __DIR__ . '/MultiBoilerplate.hooks.php';
$GLOBALS[ 'wgMessagesDirs']['MultiBoilerplate'] = __DIR__ . '/i18n';
$GLOBALS[ 'wgExtensionMessagesFiles' ][ 'MultiBoilerplate' ] = __DIR__ . '/MultiBoilerplate.i18n.php';

if ( isset( $GLOBALS[ 'wgMultiBoilerplateDiplaySpecialPage' ] )
     && $GLOBALS[ 'wgMultiBoilerplateDiplaySpecialPage' ] === true
) {
	$GLOBALS[ 'wgAutoloadClasses' ][ 'SpecialBoilerplates' ] = __DIR__ . '/SpecialBoilerplates.php';
	$GLOBALS[ 'wgExtensionMessagesFiles' ][ 'MultiBoilerplateAlias' ] = __DIR__ . '/MultiBoilerplate.alias.php';
	$GLOBALS[ 'wgSpecialPages' ][ 'Boilerplates' ] = 'SpecialBoilerplates';
	$GLOBALS[ 'wgSpecialPageGroups' ][ 'Boilerplates' ] = 'pages';
}

$GLOBALS['wgHooks'][ 'EditPage::showEditForm:initial' ][] =
	'MultiBoilerplateHooks::onEditPageShowEditFormInitial';
