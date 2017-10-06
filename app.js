			function login(callback) {
				FB.login(function (response) {
					if (response.authResponse) {
						if (callback) {
							callback(response);
						}
					} else {
						console.log('กรุณาล็อกอิน');
					}
				}, {
					scope: 'publish_actions,user_friends'
				});
			}
			var docReady = $.Deferred();
			var facebookReady = $.Deferred();
			$(document).ready(docReady.resolve);
			window.fbAsyncInit = function () {
				FB.init({
					appId: '1702339276748394',
					channelUrl: '',
					status: true,
					cookie: true,
					xfbml: true
				});
				facebookReady.resolve();
			};
			$.when(docReady, facebookReady).then(function () {
				login(function (login) {
					FB.api('/me', 'GET', {
						fields: 'taggable_friends,first_name,last_name,name,id,picture.width(300).height(300)'
					}, function (response) {
						var friends = response.taggable_friends.data;
						var friends_list = [];
						$('#profile').append('<br/><img class="img-thumbnail" width="300px" src="' + response.picture.data.url + '" />');
						$('#logo').append('<br/><img  width="100px" src="' + response.picture.data.url + '" />');
						$('#name').append("สวัสดีคุณ " + response.first_name);
						$("#play").append(r);
						var r = $('<input/>').attr({
							type: "button",
							onclick: "",
							class: "btn btn-primary btn-lg",
							id: "play",
							style: "cursor: pointer",
							value: 'PLAY'
						});
						$("#play").append(r);

						for (let i in friends) {
							$('#friends').append('<img  width="50px" src="' + friends[i].picture.data.url + '" />');
						}
						$("#play").click(function () {
							window.location.href = "app.php?id=" + response.id + "&url=" + encodeURIComponent(response.picture.data.url) + "&fname=" + response.first_name + "&lname=" + response.last_name;
						});
						$("#share").click(function () {
							$(function () {
								var captureArea = $("#capture-area");
								html2canvas(captureArea, {
									onrendered: function (canvas) {
										$("#capture-area").html("").append(canvas);
										var img = canvas.toDataURL("image/png", 1.0);
										$.ajax({
											type: 'POST',
											url: "app.php",
											data: {
												"img": img,
												"id": response.id
											},
											success: function (data) {
											}
										});
									},
									useCORS: true
								});
							});
							FB.ui({
								method: 'feed',
								link: document.URL,
								caption: '',
							}, function(response){
								window.location.href = "index.php";
							});
						});
					});
				});
			});
			(function (d) {
				var js, id = 'facebook-jssdk';
				if (d.getElementById(id)) {
					return;
				}
				js = d.createElement('script');
				js.id = id;
				js.async = true;
				js.src = "http://connect.facebook.net/en_US/all.js";
				d.getElementsByTagName('head')[0].appendChild(js);
			}(document));