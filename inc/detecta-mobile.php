<?
  require_once 'Mobile_Detect.php';
  $detect = new Mobile_Detect;
  $isMobile = $detect->isMobile();
  $isTablet = $detect->isTablet();
  $isPhone = ($isMobile && !$isTablet)?true:false;
