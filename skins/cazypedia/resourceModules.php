<?php
/*
 * Definition of resources (CSS and Javascript) required for this skin.
 * This file must be included from LocalSettings.php since that is the only way
 * that this file is included by loader.php
 */
global $wgResourceModules, $wgStylePath, $wgStyleDirectory;

$wgResourceModules['skins.cazypedia'] = array(
   'styles' => array( 	'Common/commonElements.css' => array( 'media' => 'screen'),
						'Common/commonContent.css' => array( 'media' => 'screen'),
						'Common/commonInterface.css' => array( 'media' => 'screen'),
						'Cazypedia/screen.css' => array( 'media' => 'screen')  ),
   'scripts' => array('Cazypedia/cazypedia.js', 'Cazypedia/tooltipConfig.js'),
   'remoteBasePath' => $wgStylePath,
   'localBasePath' => $wgStyleDirectory,
);
?>