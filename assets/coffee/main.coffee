jQuery ($) ->
	if($('body').hasClass('home'))
		if($('#featured li').size() > 1)
			$('#featured img').first().load ->
				$('#featured').unslider({
					delay: 6*1000,
					fluid: true
				})