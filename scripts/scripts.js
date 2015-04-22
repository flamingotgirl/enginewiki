	
	/* main_frame.php */
	
	function displayContentsByURL() {
		var currentUrl = window.location.hash.replace('#/','');
		if (currentUrl!="") {
			var urlvals = currentUrl.split('/');
			
			var section = urlvals[1];
			var article = urlvals[3];
			
			if(typeof article && article!=""){
				contentDisp(article);
			} else if(typeof section && section!=""){
				sectionDisp(section);
			}
		}
		else {
			allDisplay();
		}
	}
	
	function searchDisp(e) {
		var unicode=e.keyCode? e.keyCode : e.charCode;
		var entry_type = "m";
		if (unicode!=13) { /* not enter */
			entry_type = "";
		}
		$.ajax ({
			url : "search_results.php?entry_type="+entry_type+"&search="+$('#suggestBox').val(),
			success : function (data) {
				$('#feeds').html(data);
			}
		})
	}
	function sectionDisp(section_id) {
		$.ajax({
			url : "read_sections.php?section_id="+section_id,
			success : function (data) {
				$("#feeds").html(data);
			}
		});
	}
	function contentDisp(entry_id) {
		$.ajax({
			url : "read_entries.php?entry_id="+entry_id,
			success : function (data) {
				$("#feeds").html(data);
			}
		});
	}
	function allDisplay() {
		$.ajax({
			url : "search_results.php",
			success : function (data) {
				$("#feeds").html(data);
			}
		});
	}
	function submit_form() {
		$('#actionx').val("addsection");
		$('#form_main').submit();
	}
	function formaddsectionDisp() {
		$.ajax({
			url : "form_add_new_section.php",
			success : function (data) {
				$('#feeds').html(data);
			}
		});		
	}
	function formaddcontentsDisp() {
		var instance = CKEDITOR.instances['textarea'];
		if(instance) {
			CKEDITOR.remove(instance);
		}
		$.ajax({
			url : "form_add_new_contents.php",
			success : function (data) {
				$('#feeds').html(data);
			}
		});		
	}
	
	/* read_entries.php */
	
	function formaddDisp(pid) {
		$.ajax({
			url : "form_edit.php?pid="+pid,
			success : function (data) {
				$('#content_0').hide();
				$('#content_0').after('<div id="content_edit_0" class="content_edit">' + data + '</div>');
			}
		});		
	}
	function formeditDisp(entry_id,pid) {
		$.ajax({
			url : "form_edit.php?entry_id="+entry_id+"&pid="+pid,
			success : function (data) {
				$('#content_' + entry_id).hide();
				$('#content_' + entry_id).after('<div id="content_edit_' + entry_id +'" class="content_edit">' + data + '</div>');
			}
		});
	}
	function formdeleteDisp(entry_id,pid) {
		$('#content_' + entry_id).css('background-color', 'red');
		if (confirm("Are you sure you want to delete this entry?")) {
			$.ajax({
				url : "edit_entry.php?entry_id="+entry_id+"&pid="+pid+"&delete=ok",
				success : function (data) {
					//$('#content_' + entry_id).hide();
					location.reload();
				}
			});
		}
		else {
			//$('#content_' + entry_id).css('background-color', '#dddddd');
		}
	}
	
	// if you don't like it, do it yourself
	