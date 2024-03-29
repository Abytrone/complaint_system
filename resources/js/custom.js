window.swalConfirm = async function (confirmText = null, message= null, icon=null){
    return Swal.fire({
        title: "Are you sure?",
        text: message??'This action cannot be reverted',
        icon: icon??'warning',
        showCancelButton: true,
        buttonsStyling: false,
        confirmButtonText: confirmText ?? "Yes, delete!",
        customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger"
        }
    });
}


window.swalCustom = async function (message, title='Success', icon='success'){
    return Swal.fire({
        title: title,
        text: message,
        icon: icon
    });
}
