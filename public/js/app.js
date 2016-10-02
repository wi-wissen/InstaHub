$(document).ready(function(){

	$('.like_form').submit(function(e){
		// $.post("http://localhost/like/");
		$photo_id = $("input[name=photo_id]").val();
		$token = $("input[name=_token]").val();

		$data = {
			"id": $photo_id,
			"_token": $token
		};

		var likesCount = $(this)[0].lastElementChild.childNodes[2];
		// console.log(likesCount);

		$.ajax({
			url: '../like/' + $photo_id,
			headers: {'X-CSRF-TOKEN': $token},
	      data: $data,
	      type: 'POST',
	      datatype: 'JSON',
	      success: function(resp) {
	      	console.log(resp);
	      	if(resp.liked === "true") {
	      		likesCount.innerHTML = Number(likesCount.innerHTML) + 1;
	      	} else {
	      		likesCount.innerHTML = Number(likesCount.innerHTML) - 1;
	      	}
	      	
	      }
		});
		e.preventDefault();
	});

	$('.comment_form').submit(function(e) {
		console.log('Submiting');
		var comment = $("input[name=comment]").val();
		$data = {
			comment: comment
		}
		
		$.ajax({
			url: '../comment/' + $photo_id,
			headers: {'X-CSRF-TOKEN': $token},
	      data: $data,
	      type: 'POST',
	      datatype: 'JSON',
	      success: function(resp) {
	      	console.log(resp);
	      	
	      }
		});

		e.preventDefault();
	});
	// $('.like-btn').click(function(e){
	// 	console.log(this.innerHTML);
	// 	console.log($(this)[0].lastChild.innerHTML);
	// 	$(this)[0].lastChild.innerHTML = Number($(this)[0].lastChild.innerHTML) + 1;
	// })
});