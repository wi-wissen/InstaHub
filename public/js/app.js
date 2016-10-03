$(document).ready(function(){

	$('.like_form').submit(function(e){
		// $.post("http://localhost/like/");
		var $photo_id = $("input[name=photo_id]").val();
		var $token = $("input[name=_token]").val();

		var $data = {
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
		e.preventDefault();
		console.log($(this));
		var $username = $('#username').contents()[0];
		console.log($username);
		var $comment = $("textarea[name=comment]").val();
		var $photo_id = $("input[name=photo_id]").val();
		var $token = $("input[name=_token]").val();
		var $comment_data = {
			"_token": $token,
			"comment": $comment
		};

		// console.log($comment_data);
		// console.log($(this));
		// console.log($(this)[0].lastElementChild.children);
		var comment_list_group = $(this)[0].lastElementChild.children;
		console.log($comment);
		// console.log($(comment_list_group));
		$(comment_list_group).append('<div class="list-group-item">' + $comment +'</div>');

		return false;
		$.ajax({
			url: '../comment/' + $photo_id,
			headers: {'X-CSRF-TOKEN': $token},
	      data: $comment_data,
	      type: 'POST',
	      datatype: 'JSON',
	      success: function(resp) {
	      	console.log(resp);
	      }
		});
		
	});
	// $('.like-btn').click(function(e){
	// 	console.log(this.innerHTML);
	// 	console.log($(this)[0].lastChild.innerHTML);
	// 	$(this)[0].lastChild.innerHTML = Number($(this)[0].lastChild.innerHTML) + 1;
	// })
});