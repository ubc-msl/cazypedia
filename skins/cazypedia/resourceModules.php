<?php
/*
 * Definition of resources (CSS and Javascript) required for this skin.
 * This file must be included from LocalSettings.php since that is the only way
 * that this file is included by loader.php
 */
global $wgResourceModules, $wgStylePath, $wgStyleDirectory;

$wgResourceModules['skins.cazypedia'] = array(
   'styles' => array( 	'common/commonElements.css' => array( 'media' => 'screen'),
						'common/commonContent.css' => array( 'media' => 'screen'),
						'common/commonInterface.css' => array( 'media' => 'screen'),
						'cazypedia/screen.css' => array( 'media' => 'screen')  ),
   'scripts' => array('cazypedia/cazypedia.js', 'cazypedia/tooltipConfig.js'),
   'remoteBasePath' => $wgStylePath,
   'localBasePath' => $wgStyleDirectory,
);
?>