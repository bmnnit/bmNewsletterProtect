<?php
/*
 * ----------------------------------------------------------------------------
 * "THE BEER-WARE LICENSE" (Revision 42):
 * <info@bmnnit.com> wrote this file. As long as you retain this notice you
 * can do whatever you want with this stuff. If we meet some day, and you think
 * this stuff is worth it, you can buy me a beer in return Johannes Baumann
 * ----------------------------------------------------------------------------
 */
$aModule = array('id'  => 'bmnewsletterprotect',
	'title'        => '[BM] Bmnnit Newsletter Protection',
        'description' => array(
            'de' => 'BmnnIT Newsletter Protect, blockiert Newsletteranmeldungen aus dem gleichen IP Range (/24)',
            'en' => 'BmnnIT Newsletter Protect, blocks multiple Newsletter registrations from the same ip range (/24)',
        ),
	'thumbnail'    => 'logo.png',
	'version'      => '0.1',
	'author'       => 'Johannes Baumann',
        'email'	       => 'info@bmnnit.com',
        'url'          => 'http://www.bmnnit.com',
	'extend'       => array(
            'Newsletter' => 'bmnnit/bmNewsletterProtect/bmnewsletterprotect',
        )
);

