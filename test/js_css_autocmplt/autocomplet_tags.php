<?php

/* Copyrights by Praxis Infotech (c)2017,2018
 * Product Name: MSHMS V1.0
 * File Name:
 * File Path:
 * Description:
 * //Purpose :
 * First Created By: Sr. Tech Leader, Praxis Infotech
 * First Created On: Jan 4, 2018 @15:05
 * Modified By:
 * Modified On:
 * Reason for Modifications:
 * 1.
 * Latest Version Label:
 */

// Start Typing from Here ....
?>
<div id="example">
    <h4>Live Demo</h4>
    <textarea id="textarea" class="example" rows="1"></textarea>
</div>
	
<script type="text/javascript">
	$('#textarea')
		.textext({
			plugins : 'tags autocomplete'
		})
		.bind('getSuggestions', function(e, data)
		{
			var list = [
					'Basic',
					'Closure',
					'Cobol',
					'Delphi',
					'Erlang',
					'Fortran',
					'Go',
					'Groovy',
					'Haskel',
					'Java',
					'JavaScript',
					'OCAML',
					'PHP',
					'Perl',
					'Python',
					'Ruby',
					'Scala'
				],
				textext = $(e.target).textext()[0],
				query = (data ? data.query : '') || ''
				;

			$(this).trigger(
				'setSuggestions',
				{ result : textext.itemManager().filter(list, query) }
			);
		})
		;
</script>
