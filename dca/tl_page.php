<?php

/**
 * changelanguage Extension for Contao Open Source CMS
 *
 * @copyright  Copyright (c) 2008-2016, terminal42 gmbh
 * @author     terminal42 gmbh <info@terminal42.ch>
 * @license    http://opensource.org/licenses/lgpl-3.0.html LGPL
 * @link       http://github.com/terminal42/contao-changelanguage
 */


/**
 * Config
 */
$GLOBALS['TL_DCA']['tl_page']['config']['sql']['keys']['languageMain'] = 'index';

$GLOBALS['TL_DCA']['tl_page']['config']['onload_callback'][]     = array('Terminal42\ChangeLanguage\DataContainer\Page','showSelectbox');
$GLOBALS['TL_DCA']['tl_page']['config']['oncopy_callback'][]     = array('Terminal42\ChangeLanguage\DataContainer\Page','resetFallbackCopy');
$GLOBALS['TL_DCA']['tl_page']['config']['oncut_callback'][]      = array('Terminal42\ChangeLanguage\DataContainer\Page','resetFallbackAll');
$GLOBALS['TL_DCA']['tl_page']['config']['onsubmit_callback'][]   = array('Terminal42\ChangeLanguage\DataContainer\Page','resetFallbackAll');
$GLOBALS['TL_DCA']['tl_page']['config']['ondelete_callback'][]   = array('Terminal42\ChangeLanguage\DataContainer\Page','resetLanguageMain');
$GLOBALS['TL_DCA']['tl_page']['list']['label']['label_callback'] = array('Terminal42\ChangeLanguage\DataContainer\Page', 'addFallbackNotice');


/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_page']['fields']['fallback']['eval']['submitOnChange'] = true;

$GLOBALS['TL_DCA']['tl_page']['fields']['languageMain'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_page']['languageMain'],
    'exclude'                 => true,
    'inputType'               => 'pageTree',
    'eval'                    => array('fieldType'=>'radio', 'rootNodes'=>array(1)),
    'sql'                     => "int(10) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_page']['fields']['languageRoot'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_page']['languageRoot'],
    'exclude'                 => true,
    'inputType'               => 'select',
    'options_callback'        => array('Terminal42\ChangeLanguage\DataContainer\Page', 'getRootPages'),
    'eval'                    => array('includeBlankOption'=>true, 'blankOptionLabel'=>&$GLOBALS['TL_LANG']['tl_page']['languageRoot'][2], 'tl_class'=>'w50'),
    'sql'                     => "int(10) unsigned NOT NULL default '0'"
);
