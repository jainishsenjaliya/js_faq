plugin.tx_jsfaq{

	settings{

		# cat=jsfaq_general/enable/001; type=boolean; label= Show All / Hide all button : If disable then it will not display in list page
		showAllButton = 1

		list{
			image{
				# cat=jsfaq_list/0010; type=string; label= Image Width : Image width overwrites flexform settings 
				width = 300c

				# cat=jsfaq_list/0020; type=string; label= Image Height : Image Height overwrites flexform settings 
				height = 300c

			}
		}

		detail{
			image{
				# cat=jsfaq_detail/text; type=string; label= Image Width : Image width overwrites flexform settings 
				width = 500c

				# cat=jsfaq_detail/text; type=string; label= Image Height : Image height overwrites flexform settings 
				height = d00c
			}
		}

		additional {
			css {
				
				basic{
					# cat=jsfaq_additional/file; type=string; label= Basic CSS Path
					uri = typo3conf/ext/js_faq/Resources/Public/Css/Basic.css
				}

				fancy{
					# cat= jsfaq_additional/file; type=string; label= Fancy CSS Path
					uri = typo3conf/ext/js_faq/Resources/Public/Css/Fancy.css

					# cat=jsfaq_additional/enable/0100; type=boolean; label= Fancy CSS: Enable Fancy CSS
					include = 0
				}

				responsive{
					# cat= jsfaq_additional/file; type=string; label= Responsive CSS Path
					uri = typo3conf/ext/js_faq/Resources/Public/Css/Responsive.css

					# cat=jsfaq_additional/enable/0110; type=boolean; label= Responsive CSS: Responsive CSS
					include = 0
				}

				# cat=jsfaq_additional/enable/0120; type=boolean; label= Include CSS in header section: If Enable then it will include in footer section
				includeInFooter = 0
			}
			
			javascript{

				jQueryLib{
					# cat=jsfaq_additional/file; type=string; label= jQuery Library
					uri = typo3conf/ext/js_faq/Resources/Public/Script/jquery.min.js
					
					# cat=jsfaq_additional/enable/0130; type=boolean; label= jQuery Library: If Enable then include jQuery Library 
					include = 0

					# cat=jsfaq_additional/enable/0140; type=boolean; label= Include jQuery Library in header section: If Enable then it will include in footer section
					includeInFooter = 0
				}

				toggle{
					# cat=jsfaq_additional/file; type=string; label= jQuery Library
					uri = typo3conf/ext/js_faq/Resources/Public/Script/JsFaqToggle.js

					# cat=jsfaq_additional/enable/0150; type=boolean; label= Include Toggle jQuery in header section: If Enable then it will include in footer section
					includeInFooter = 1
				}
			}
		}
	}
}