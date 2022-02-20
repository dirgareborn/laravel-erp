<script>
    // form submit function
    function submitForm() {
        // get all form data
        let formData = new FormData(document.getElementById("form-kategori"));
        // get the form action
        let formAction = document.getElementById("form-kategori").action;
        // make the ajax call
        var Toast = Swal.mixin({
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        timer: 3000
        });
        $.ajax({
            url: formAction,
            type: "POST",
            data: formData,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function (response) {
                Toast.fire({
                    text: response.message,
                    icon: response.status,
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                Toast.fire({
                    text: errorThrown,
                    icon: 'error',
                });
            }
        });
        return false;
    }
</script>