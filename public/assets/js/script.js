$(document).ready(function (e) {
    $(".select2").select2();

    $(".delete-data").click(function (e) {
        swal({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            type: "warning",
            buttons: {
                confirm: {
                    text: "Yes, delete it!",
                    className: "btn btn-success",
                },
                cancel: {
                    visible: true,
                    className: "btn btn-danger",
                },
            },
        }).then((Delete) => {
            if (Delete) {
                swal({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    type: "success",
                    buttons: {
                        confirm: {
                            className: "btn btn-success",
                        },
                    },
                });
            } else {
                swal.close();
            }
        });
    });
});
