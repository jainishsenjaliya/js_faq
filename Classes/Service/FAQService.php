<?php
namespace JS\JsFaq\Service;

/*
 *  (c) 2014-2016 Jainish Senjaliya <jainishsenjaliya@gmail.com>
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
		}else if($settings['main']['startingPoint']=="" ){
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
		// Inlcude JS

		$javascript = $settings['additional']['javascript'];

		if($javascript['jQueryLib']['include']==1){

			$jQueryLib = '<script src="typo3conf/ext/js_faq/Resources/Public/Script/jquery.min.js" type="text/javascript"></script>'.$additionalDataJS;

			if($javascript['jQueryLib']['includeInFooter']==1){
				$GLOBALS['TSFE']->additionalFooterData['JsFaq.jQueryLib'] = $jQueryLib;
			}else{
				$GLOBALS['TSFE']->additionalHeaderData['JsFaq.jQueryLib'] = $jQueryLib;	
			}
		}

		$toggleJS = '<script src="typo3conf/ext/js_faq/Resources/Public/Script/JsFaqToggle.js" type="text/javascript"></script>';

		if(isset($javascript['toggle']['includeInFooter']) && $javascript['toggle']['includeInFooter'] ==0){
			$GLOBALS['TSFE']->additionalHeaderData['JsFaq.Toggle'] = $toggleJS;
		}else{
			$GLOBALS['TSFE']->additionalFooterData['JsFaq.Toggle'] = $toggleJS;
		}

		// Inlcude CSS

		$css = $settings['additional']['css'];

		$style = $css['fancy']['include']==1?'Fancy':'Basic';

		$additionalDataCSS = '<link rel="stylesheet" href="typo3conf/ext/js_faq/Resources/Public/Css/'.$style.'.css" type="text/css" media="all" />';
		
		if($css['responsive']['include']==1){
			$additionalDataCSS .= '<link rel="stylesheet" href="typo3conf/ext/js_faq/Resources/Public/Css/Responsive.css" type="text/css" media="all" />';
		}

		if($css['includeInFooter']==1){
			$GLOBALS['TSFE']->additionalFooterData['JsFaq.CSS'] = $additionalDataCSS;
		}else{
			$GLOBALS['TSFE']->additionalHeaderData['JsFaq.CSS'] = $additionalDataCSS;	
		}
	}
}

?>