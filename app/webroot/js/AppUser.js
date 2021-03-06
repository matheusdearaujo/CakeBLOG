$(document).ready(function() {
	habilitaBotoesUser();
	loadEventosUser();
});

var habilitaBotoesUser = function() {
	$('.btnDeletePost').click(function(e) {
		e.preventDefault();

		let element = $(this);
		let id = $(this).attr("idDelete");
		let url = `/posts/delete/${id}`;

		deletePost(url, element);
	});

	$('.btnDeleteUser').click(function(e) {
		e.preventDefault();

		let id = $(this).attr("idDeleteUser");
		let url = `/users/deleteUser/${id}`;

		deleteUser(url);
	});
}

var loadEventosUser = function() {

}

function deletePost(url, element) {
	const Toast = Swal.mixin({
		toast: true,
		position: 'top-end',
		showConfirmButton: false,
		timer: 3000,
		timerProgressBar: true,
	});

	Swal.fire({
		title: 'Você deseja deletar este post?',
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#218838',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Sim, quero deletar!',
		cancelButtonText: 'Cancelar',
	}).then((result) => {
		if (result.value) {
			$.ajax({
				type: 'POST',
				url: url,
				dataType: 'JSON',
				success: function (response) {
					element.parents('.card-container').remove();
					if (!response.error) {
						Toast.fire({
							icon: 'success',
							title: response.msg,
						});
					}
				},
				error: function(response) {
					Toast.fire({
						icon: 'error',
						title: response.msg,
					});
				}
			});
		}
	});
}

function deleteUser(url) {
	const Toast = Swal.mixin({
		toast: true,
		position: 'top-end',
		showConfirmButton: false,
		timer: 3000,
		timerProgressBar: true,
	});

	Swal.fire({
		title: 'Você deseja deletar este usuário?',
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#218838',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Sim, quero deletar!',
		cancelButtonText: 'Cancelar',
	}).then((result) => {
		if (result.value) {
			$.ajax({
				type: 'POST',
				url: url,
				dataType: 'JSON',
				success: function (response) {
					if (!response.error) {
						Toast.fire({
							icon: 'success',
							title: response.msg,
						});
					}
				},
				error: function(response) {
					Toast.fire({
						icon: 'error',
						title: response.msg,
					});
				},
				complete: function() {
					if (window.location.href == `${baseUrl}/users/schedule`) {
						location.reload();
					} else {
						window.location.href = '/logout';
					}
				}
			});
		}
	});
}
