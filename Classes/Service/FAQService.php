<?php
namespace JS\JsFaq\Service;

/*
 *  (c) 2014 Jainish Senjaliya <jainishsenjaliya@gmail.com>
 *  Jainish Senjaliya <jainishsenjaliya@gmail.com>
*/

class FAQService implements \TYPO3\CMS\Core\SingletonInterface {

	/**
	 * fAQRepository
	 *
	 * @var \JS\JsFaq\Domain\Repository\FAQRepository
	 * @inject
	 */
	protected $fAQRepository;
	
	/**
	 * missingConfiguration
	 *
	 * @param $settings
	 * @return
	 */
	 
	function missingConfiguration($settings)
	{
		if($settings['configuration']!=1){
			return 2;
		}else if($settings['storagePID']=="" ){
			return 0;
		}
		return 1;
	}

 	/**
	 * includeAdditionalData
	 *
	 * @param $settings
	 * @return
	 */
	
	function includeAdditionalData($settings)
	{
		$additionalDataJS = $additionalDataCSS = "";
		
		if($settings['jQueryLib']==1){
			$additionalDataJS .= '<script src="typo3conf/ext/js_faq/Resources/Public/Script/jquery.min.js" type="text/javascript"></script>';
		}
		
		$additionalDataJS .= '<script src="typo3conf/ext/js_faq/Resources/Public/Script/JqueryToggle.js" type="text/javascript"></script>';
		
		$css = $settings['fancyCSS']==1?'fancy':'basic';
		
		$additionalDataCSS .= '<link rel="stylesheet" href="typo3conf/ext/js_faq/Resources/Public/Css/'.$css.'.css" type="text/css" media="all" />';
		
		if($settings['responsiveLayout']==1){
			$additionalDataCSS .= '<link rel="stylesheet" href="typo3conf/ext/js_faq/Resources/Public/Css/responsiveLayout.css" type="text/css" media="all" />';
		}
		
		if($settings['includeJSinFooter']==1){
			$GLOBALS['TSFE']->additionalFooterData['9149'] = $additionalDataJS;
		}else{
			$GLOBALS['TSFE']->additionalHeaderData['9149'] = $additionalDataJS;	
		}
		
		if($settings['includeCSSinFooter']==1){
			$GLOBALS['TSFE']->additionalFooterData['852'] = $additionalDataCSS;
		}else{
			$GLOBALS['TSFE']->additionalHeaderData['852'] = $additionalDataCSS;	
		}
		
	}
	
}

?>