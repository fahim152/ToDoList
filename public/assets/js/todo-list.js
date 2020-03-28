function editTask(taskId){
    editedText = document.getElementById("editTaskText_"+taskId).innerHTML;
    $.ajax({
        url: "/task-edit",
        type: 'POST',
        data: {
                taskId: taskId,
                editedText: editedText
        },
        success: function() {
            toastAlert('success', 'Task Has Been Edited Successfully');
        },
        error: function() {
            toastAlert('error', 'Internal Error Occured. Code: X718SD');
       
        },
    });
}      

window.livewire.on('toast:show', function (type, message) {
     toastAlert(type, message)
}); 

function toastAlert(type, message, position = 'top-end', time = 2000)
{
    Swal.fire({
        toast: true,
        position: position,
        icon: type,
        title: message,
        showConfirmButton: false,
        timer: time
    });
}