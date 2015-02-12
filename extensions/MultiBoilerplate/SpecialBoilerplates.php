<?php
/**
 * Special:boilerplates, provides a list of MediaWiki:Multiboilerplate or $wgMultiBoilerplateOptions
 * For more info see http://mediawiki.org/wiki/Extension:Multiboilerplate
 *
 * This program is free software; you can redistribute it and/or modify
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
 * @ingroup SpecialPage
 * @author Al Maghi
 *
 * @TODO Use special page to actually edit [[MediaWiki:MultiBoilerplate]]
 */

class SpecialBoilerplates extends IncludableSpecialPage {

	function __construct() {
		parent::__construct( 'Boilerplates' );
		$this->mIncludable = true;
	}

	public function execute( $par ) {
		global $wgMultiBoilerplateOptions;
		$output = $this->getOutput();

		// No options found in either configuration file, abort.
		if ( !isset( $wgMultiBoilerplateOptions ) ) {
			return true;
		}

		if ( !$this->mIncluding ) {
			$this->setHeaders();
			$output->addWikiMsg( 'multiboilerplate-special-pagetext' );
		}
		if ( is_array( $wgMultiBoilerplateOptions ) ) {
			if ( !$this->mIncluding ) {
				$output->addWikiMsg( 'multiboilerplate-special-define-in-localsettings' );
			}
			foreach ( $wgMultiBoilerplateOptions as $name => $template ) {
				$output->addWikiText( "* [[$template]]\n" );
			}
		} else {
			if ( !$this->mIncluding ) {
				$output->addWikiMsg( 'multiboilerplate-special-define-in-interface' ) ;
			}
			$things = explode( "\n", str_replace( "\r", "\n", str_replace( "\r\n", "\n", wfMessage( 'multiboilerplate' ) ) ) ); // Ensure line-endings are \n
			foreach ( $things as $row ) {
				if ( substr( ltrim( $row ), 0, 1 ) === '*' ) {
					$row = ltrim( $row, '* ' ); // Remove the asterisk (and a space if found) from the start of the line.
					$row = explode( '|', $row );
					if ( !isset( $row[ 1 ] ) ) {
						return true; // Invalid syntax, abort
					}
					$output->addWikiText( "* [[$row[1]|$row[0]]]\n" );
				}
			}
		}

		return true;
	}
}

