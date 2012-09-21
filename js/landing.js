(function($, global) {

	/* Load the iframe later, its low priority */
	setTimeout(setIframe, 2500);
	function setIframe() {
		$("#ideasrow").html('<iframe src="http://createchusf.uservoice.com/forums/177021-general" class="" style="height: 700px; width: 98%;"><a href="http://createchusf.uservoice.com/forums/177021-general" class="button" target="_blank">View the ideas</a></iframe>');
	}

	/* Mailchimp Form */
	var signup = {

		// open and set up mailchimp form
		init: function() {

			var _this = this;
			this.hero1 = $("#hero1");
			this.hero2 = $("#hero2");

			helpers.autoClearInput($("input.first"));
			helpers.autoClearInput($("input.last"));
			helpers.autoClearInput($("input.email"));
			helpers.autoClearInput($("input.phone"));
			helpers.autoClearInput($("input.website"));

			// bind events
			$(".signup.button").on("click", function() {

				// set the skill value
				$("input.skill").val($(this).data("value"));

				$(".signup.button").addClass("inactive");

				// prevent height from dropping
				_this.hero2.height( Math.max(_this.hero1.height(), _this.hero2.height) );

				_this.hero1.fadeOut(500, function() {

					_this.hero2.fadeIn(500, function() {
						$("input.autofocus").focus().select();
					});
				});
			});


			$('#signup-form').isHappy({
				submitButton: '#signup-form .submit',
				submitCallback: function() {
					alert("Hai");
					$.ajax({
						type: 'POST',
						url: 'subscribe.php',
						data: $("#signup-form").serialize(),
						success: function(data) {
							if (data.result === "success") {
								window.location.hash = "!/thanks";
								// _gaq.push(["_trackEvent","Landing", "Signup"]);
							} else {
								helpers.showAjaxError($("#signup-form"), "There was an error, try again", data.message);
							}
						},
						error: function(error) {
							console.log(error);
							helpers.showAjaxError($("#signup-form"), "There was an error, try again", error.responseText.message);
						}
					});
				},
				fields: {
					'#signup-form .email': {
						required: true,
						test: function(val) {
							return (/^(?:\w+\.?)*\w+@(?:\w+\.)+\w+$/).test(val);
						},
						message: 'Invalid email'
					},
					'#signup-form .first': {
						required: true
					},
					'#signup-form .last': {
						required: true
					},
					'#signup-form .phone': {
						required: true,
						test: function(val) {
							return (/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/).test(val);
						}
					},
					'#signup-form .website': {
						required: false
					}
				},
				when: 'paste blur input' // propertychange input paste blur focus
			});

		}

	};

	/* helpers */

	// some miscellaneous helpers used internally
	var helpers = {

		// empty input when value is default
		autoClearInput : function ($selector) {

			var defaultVal = $selector.attr("default");
			$selector.val(defaultVal);

			$selector.on("click", function() {
				var val = $(this).val();
				if (val === defaultVal) {
					$(this).select();
				}
			});
			$selector.on("blur", function() {
				var val = $(this).val();
				if (val === "") {
					$(this).val(defaultVal);
				}
			});

		},

		// display error message beneath input
		showAjaxError : function ($form, message) {
			var errorDetails = arguments[2] || undefined;
			if (errorDetails) {
				message = errorDetails;
			}
			$form.find(".error-message").empty().html(message);
		},

		// transition to new content
		toggleElements : function ($section1, $section2) {
			$section1.fadeOut(500, function() {
				$section2.fadeIn(1000);
			});
		}
	};


	signup.init();

})(jQuery, window);
