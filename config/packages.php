<?php
$installed = array(
	'cake_djjob' => array(
		'source' => 'git://github.com/josegonzalez/cake_djjob.git',
		'package' => 'cake_djjob',
		'description' => 'job queues for cakephp using seatgeek's djjob',
		'type' => 'plugin',
		'homepage' => 'http://github.com/josegonzalez/cake_djjob',
		'section' => 'background',
		'pre-depends' => 'CakePHP==1.3',
		'install-path' => '/Users/jose/Sites/repositories/cakepackages/app/plugins/cake_djjob',
	),
	'package_installer' => array(
		'source' => 'git://github.com/josegonzalez/package_installer.git',
		'package' => 'package_installer',
		'description' => 'installs existing cakephp applications, plugins and utilities',
		'type' => 'plugin',
		'homepage' => 'http://github.com/josegonzalez/package_installer',
		'section' => 'utility',
		'pre-depends' => 'CakePHP==1.3',
		'install-path' => '/Users/jose/Sites/repositories/cakepackages/app/plugins/package_installer',
	),
	'sanction' => array(
		'source' => 'git://github.com/josegonzalez/sanction.git',
		'package' => 'sanction',
		'description' => 'give sanction to your users when they intend to navigate to certain portions of your website',
		'type' => 'plugin',
		'homepage' => 'http://github.com/josegonzalez/sanction',
		'section' => 'authorization',
		'suggests' => 'cakephp-authsome',
		'pre-depends' => 'CakePHP==1.3',
		'install-path' => '/Users/jose/Sites/repositories/cakepackages/app/plugins/sanction',
	),
	'searchable' => array(
		'source' => 'git://github.com/neilcrookes/searchable.git',
		'package' => 'searchable',
		'description' => 'CakePHP plugin for site search functionality',
		'type' => 'plugin',
		'homepage' => 'http://github.com/neilcrookes/searchable',
		'section' => 'search',
		'pre-depends' => 'CakePHP==1.3',
		'install-path' => '/Users/jose/Sites/repositories/cakepackages/app/plugins/searchable',
	),
	'settings' => array(
		'source' => 'git://github.com/josegonzalez/settings.git',
		'package' => 'settings',
		'description' => 'a simple plugin to track application settings',
		'type' => 'plugin',
		'homepage' => 'http://github.com/josegonzalez/settings',
		'section' => 'component',
		'pre-depends' => 'CakePHP==1.3',
		'install-path' => '/Users/jose/Sites/repositories/cakepackages/app/plugins/settings',
	),
	'webservice' => array(
		'source' => 'git://github.com/josegonzalez/webservice_plugin.git',
		'package' => 'webservice_plugin',
		'description' => 'CakePHP plugin that takes the data you set and automatically serves it as JSON and XML',
		'type' => 'plugin',
		'homepage' => 'http://github.com/josegonzalez/webservice_plugin',
		'alias' => 'webservice',
		'section' => 'api',
		'pre-depends' => 'CakePHP==1.3',
		'install-path' => '/Users/jose/Sites/repositories/cakepackages/app/plugins/webservice',
	),
);
?>