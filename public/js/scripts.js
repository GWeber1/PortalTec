$(document).ready(function () {
	$('.delete-button').on('click', function () {
		var categoryId = $(this).data('category-id');
		$('#category_id').val(categoryId); // Defina o ID no campo oculto
	});

	$('.delete-button').on('click', function () {
		var postId = $(this).data('post-id');
		$('#post_id').val(postId); // Defina o ID no campo oculto
	});

	$('.delete-button').on('click', function () {
		var positionId = $(this).data('position-id');
		$('#position_id').val(positionId); // Defina o ID no campo oculto
	});

	$('.fa-bars').click(function () {
		$('.sidebar').toggle();
	});

	$("#search").keyup(function () {
		var value = this.value;

		$("table").find("tr").each(function (index) {
			if (!index) return;
			var id = $(this).find("td").text();
			$(this).toggle(id.indexOf(value) !== -1);
		});
	});

	function slugify(text) {
		return text.toString().toLowerCase()
			.replace(/\s+/g, '-') // Replace spaces with -
			.replace(/[^\w\-]+/g, '') // Remove all non-word chars
			.replace(/\-\-+/g, '-') // Replace multiple - with single -
			.replace(/^-+/, '') // Trim - from start of text
			.replace(/-+$/, ''); // Trim - from end of text
	}

	$('#category_name').keyup(function () {
		var slug = $(this).val();
		$('#slug').val(slugify(slug));
	});

	$('#post_title').keyup(function () {
		var slug = $(this).val();
		$('#slug').val(slugify(slug));
	});

	$('#select-all').click(function (event) {
		if (this.checked) {
			$(':checkbox').each(function () {
				this.checked = true;
			});
		} else {
			$(':checkbox').each(function () {
				this.checked = false;
			});
		}
	});

	socialCounter = $('.socialCount').length;
	$('#addSocialField').click(function () {
		socialCounter++;
		if (socialCounter > 5) {
			$('#socialAlert').removeClass('noshow');
			return;
		}
		newDiv = $(document.createElement('div')).attr("class", "form-group");
		newDiv.after().html('<input type="url" name="social[]" class="form-control"></div>');
		newDiv.appendTo('#socialFieldGroup');
	});

	var list = document.getElementById("my-ui-list");
	Sortable.create(list);
});
