$(document).on('click', '#delete', function (e) {
    e.preventDefault();
    var link = $(this).attr("href");

    Swal.fire({
        title: 'Bist du dir sicher?',
        text: "Soll die Löschung fortgesetzt werden?",
        icon: 'warning',
        iconColor: '#d33',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: 'rgba(143, 143, 143, 1)',
        confirmButtonText: 'Ja, löschen',
        cancelButtonText: 'Abbrechen'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = link
            Swal.fire(
                'Meldung',
                'Datensatz wurde gelöscht.',
                'success'
            )
        }
    })
});
