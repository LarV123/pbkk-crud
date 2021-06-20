function editProject(id){
    $('#editParam').attr('value', id);
    $.ajax({
        type: "get",
        url: url+"index.php/data/"+id,
        success: function (response) {
            var data = JSON.parse(response);
            $('#editProjectModal input[name="name"]').attr('value', data['name']);
            $('#editProjectModal select[name="status"]').attr('value', data['status']).change();
            $('#editProjectModal select[name="status"]').prop('value', data['status']).change();
            $('#editProjectModal input[name="type"]').attr('value', data['types']);
            $('#editProjectModal input[name="deadline"]').attr('value', data['deadline']);
        }
    });
}

function deleteProject(id){
    $('#deleteProjectModal #deleteParam').attr('value', id);
}