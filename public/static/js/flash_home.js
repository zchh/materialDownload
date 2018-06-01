$(document).ready(function(){

  // 修改密码和 修改邮箱的 js ，id全部以password开头	

  $("#password_display_email").hide();
  $("#password_btn_two").css({"background":"transparent","color":"black"});

  $("#password_btn_one").click(function(){
  		 $("#password_display_phone").show();
  		 $("#password_display_email").hide();
  		 $("#password_btn_one").css({"background":"rgba(255, 255, 255, .3)","color":"white"});
  		 $("#password_btn_two").css({"background":"transparent","color":"black"});
  		
  })

  $("#password_btn_two").click(function(){
  		 $("#password_display_phone").hide();
  		 $("#password_display_email").show();
  		 $("#password_btn_two").css({"background":"rgba(255, 255, 255, .3)","color":"white"});
  		 $("#password_btn_one").css({"background":"transparent","color":"black"});
  })

	//主页的效果

	$("#uzi_odd_one").css("color","#034889");

	$("#uzi_odd_one").click(function(){
		$("#uzi_odd_one").css("color","#034889");
		$("#uzi_odd_two").css("color","#333333");
		$("#uzi_odd_three").css("color","#333333");

		$("#uzi_haha_one").show();
		$("#uzi_haha_two").hide();
		$("#uzi_haha_three").hide();
	})

	$("#uzi_odd_two").click(function(){
		$("#uzi_odd_one").css("color","#333333");
		$("#uzi_odd_two").css("color","#034889");
		$("#uzi_odd_three").css("color","#333333");

		$("#uzi_haha_two").show();
		$("#uzi_haha_one").hide();
		$("#uzi_haha_three").hide();
	})

	$("#uzi_odd_three").click(function(){
		$("#uzi_odd_one").css("color","#333333");
		$("#uzi_odd_two").css("color","#333333");
		$("#uzi_odd_three").css("color","#034889");

		$("#uzi_haha_three").show();
		$("#uzi_haha_two").hide();
		$("#uzi_haha_one").hide();
	})





	$("#uzi_top_nav_left").hover(function(){
		$("#uzi_top_nav_left").css("background-color","rgba(0,0,0,.6)");
		$("#uzi_tubiao").removeClass("fa-angle-down").addClass("fa-angle-up");
		$(".uzi_hover_content").show();

	},function(){
		$("#uzi_top_nav_left").css("background-color","transparent");
		$("#uzi_tubiao").removeClass("fa-angle-up").addClass("fa-angle-down");
		$(".uzi_hover_content").hide();
	});


  //密码
	$("#karsa_close").click(function(){
		$("#karsa_board").hide()
	})


	$("#karsa_xiugai_password").click(function(){
		$("#karsa_board").show()
	})


//手机
	$("#clearlove_two_click").click(function(){
		$("#clearlove_two").show()
	})

	$("#clearlove_two_close").click(function(){
		$("#clearlove_two").hide()
	})


	//邮箱

	$("#clearlove_three_click").click(function(){
		$("#clearlove_three").show()
	})

	$("#clearlove_three_close").click(function(){
		$("#clearlove_three").hide()
	})


	// $("#clearlove_off").click(function(){
	// 	//alert("haha");
	// 	window.location.href='login.html';
	// })



});