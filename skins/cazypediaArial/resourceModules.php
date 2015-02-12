<?php
/*
 * Definition of resources (CSS and Javascript) required for this skin.
 * This file must be included from LocalSettings.php since that is the only way
 * that this file is included by loader.php
 */
global $wgResourceModules, $wgStylePath, $wgStyleDirectory;

$wgResourceModules['skins.cazypediaArial'] = array(
   'styles' => array( 	'Common/commonElements.css' => array( 'media' => 'screen'),
						'Common/commonContent.css' => array( 'media' => 'screen'),
						'Common/commonInterface.css' => array( 'media' => 'screen'),
						'CazypediaArial/screen.css' => array( 'media' => 'screen')  ),
   'scripts' => array('CazypediaArial/CazypediaArial.js', 'CazypediaArial/tooltipConfig.js'),
   'remoteBasePath' => $wgStylePath,
   'localBasePath' => $wgStyleDirectory,
);
?>