$(document).ready(function(){

	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
	});
	
	$('.like_form').submit(function(e){
		//var $photo_id = $("input[name=photo_id]").val();
		var $token = $("input[name=_token]").val();

		var $data = {
			"id": $(this).data("id"),
			"_token": $token
		};

		var likesCount = $(this)[0].lastElementChild.childNodes[2];
		// console.log(likesCount);

		$.ajax({
			url: '../like/' + $(this).data("id"),
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
		var $photo_id = $(this).data("id");
		var $comment = $("textarea[name=comment" + $photo_id + "]").val();
		var $token = $("input[name=_token]").val();
		var comment_list_group = $("#list-group" + $photo_id);
		var $comment_data = {
			"_token": $token,
			"comment": $comment
		};

		// console.log($comment_data);
		// console.log($(this));
		// console.log($(this)[0].lastElementChild.children);
		//var comment_list_group = $(this)[0].lastElementChild.children;
		console.log($comment);
		console.log("#list-group" + $photo_id);
		$(comment_list_group).append('<div class="list-group-item"><b><a href="/user/' + $username + '">' + $username.textContent + '</a></b>: ' + $comment +'</div>');
		$("textarea[name=comment" + $photo_id + "]").val("");

		//return false;
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

	$(".newPassword").click(function(){
        var id = $(this).data("id");
        var token = $(this).data("token");
        $.ajax(
        {
			url: "/user/password/"+id,
			headers: {'X-CSRF-TOKEN': token},
            type: 'GET',
            dataType: "JSON",
            data: {
                "id": id,
                "_method": 'GET',
                "_token": token,
            },
            success: function ( result )
            {
               
                $.each(result, function(key, value){
                    $('#pw' + id).text(value);
                    $('#pw' + id).css("font-family", "Monospace");
                });                
            },

        });
    });
});