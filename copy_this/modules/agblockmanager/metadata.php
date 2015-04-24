<?php

$sMetadataVersion = '1.1';

$aModule = array(
    'id'           => 'agblockmanager',
    'title'        => 'Block Manager',
    'description'  => 'Manage Template Blocks through Admin Backend',
    'version'      => '1.0',
    'author'       => 'Aggrosoft GbR',
    'url'		   => 'http://www.aggrosoft.de',
    'files' 	  => array(
    	'blockmanager_list' => 'agblockmanager/controller/admin/blockmanager_list.php',
		'blockmanager_main' => 'agblockmanager/controller/admin/blockmanager_main.php',
        'blockmanager' => 'agblockmanager/controller/admin/blockmanager.php'
    ),
    'templates' => array(
    	'blockmanager_list.tpl' => 'agblockmanager/out/admin/tpl/blockmanager_list.tpl',
        'blockmanager_main.tpl' => 'agblockmanager/out/admin/tpl/blockmanager_main.tpl',
        'blockmanager.tpl' => 'agblockmanager/out/admin/tpl/blockmanager.tpl',
    ),
    'extend'      => array(
        
    )
);
?>
