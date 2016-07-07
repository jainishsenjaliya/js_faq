plugin.tx_jsfaq{

	settings{

		showAllButton	= {$plugin.tx_jsfaq.settings.showAllButton}

		list{
			image{
				width = {$plugin.tx_jsfaq.settings.list.image.width}
				height = {$plugin.tx_jsfaq.settings.list.image.height}
			}
		}

		detail{
			image{
				width = {$plugin.tx_jsfaq.settings.detail.image.width}
				height = {$plugin.tx_jsfaq.settings.detail.image.height}
			}
		}

		additional{
			css{
			
				basic{
					uri 	= {$plugin.tx_jsfaq.settings.additional.css.basic.uri}
				}

				fancy{
					uri 	= {$plugin.tx_jsfaq.settings.additional.css.fancy.uri}
					include	= {$plugin.tx_jsfaq.settings.additional.css.fancy.include}
				}

				responsive{
					uri 	= {$plugin.tx_jsfaq.settings.additional.css.responsive.uri}
					include	= {$plugin.tx_jsfaq.settings.additional.css.responsive.include}
				}

				includeInFooter = {$plugin.tx_jsfaq.settings.additional.css.includeInFooter}
			}

			javascript{

				jQueryLib{
					uri 			= {$plugin.tx_jsfaq.settings.additional.javascript.jQueryLib.uri}
					include 		= {$plugin.tx_jsfaq.settings.additional.javascript.jQueryLib.include}
					includeInFooter	= {$plugin.tx_jsfaq.settings.additional.javascript.jQueryLib.includeInFooter}
				}

				toggle{
					uri				= {$plugin.tx_jsfaq.settings.additional.javascript.toggle.uri}
					includeInFooter	= {$plugin.tx_jsfaq.settings.additional.javascript.toggle.includeInFooter}
				}
			}
		}
	}
}

config.tx_jsfaq.features.skipDefaultArguments = 1
plugin.tx_jsfaq.features.skipDefaultArguments = 1