jQuery ($) ->
	if($('body').hasClass('home'))
		if($('#featured li').size() > 1)
			$('#featured img').first().load ->
				$('#featured').unslider({
					delay: 4*1000,
					fluid: true
				})