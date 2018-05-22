<?php
/*
 * Author: Johannes Baumann
 * Email: info@bmmnit.com
 * 
 * ----------------------------------------------------------------------------
 * "THE BEER-WARE LICENSE" (Revision 42):
 * <info@bmnnit.com> wrote this file. As long as you retain this notice you
 * can do whatever you want with this stuff. If we meet some day, and you think
 * this stuff is worth it, you can buy me a beer in return Johannes Baumann
 * ----------------------------------------------------------------------------
 */

class bmnewsletterprotect extends bmnewsletterprotect_parent {

    public function send() {

        $hit = false;
        $tmpdir = oxRegistry::getConfig()->getConfigParam('sCompileDir') . "newsletterProtect.txt";
        $oxutilsserver = oxRegistry::get("oxUtilsServer");
        $remoteIp = $oxutilsserver->getRemoteAddress();
        $cleanRemoteIp = long2ip(ip2long($remoteIp) & 0xFFFFFF00); //clean the last 8 octets
        $handle = fopen($tmpdir , "r");
        
        if ($handle) {
            while (($ip = fgets($handle)) !== false) {
                if (strcmp($ip, $cleanRemoteIp) == 0) {
                    $hit = true;
                    break;
                }
            }
            fclose($handle);
        }

        if ($hit) {
            //TODO make it better
            oxRegistry::getUtils()->logger("Newsletter Anmeldung geblockt", true);
            die("Newsletter Anmeldung geblockt: " .  $oxutilsserver->getRemoteAddress() );
        } else {
            parent::send();

            //stupid way to detect errors, better way welcome.
            $errors = oxRegistry::getSession()->getVariable('Errors');
            if (count($errors['default']) <= 0) {
                file_put_contents($tmpdir, $cleanRemoteIp);
            }
        }
    }

}
