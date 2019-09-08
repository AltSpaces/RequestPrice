$j(document).on('click', '.request-price span', function () {
   $j('#request-popup').show();
});

$(document).on('click', '.request-price-modal .close', function () {
    $j('#request-popup').hide();
});

$(document).on('click', '.btn-request-price', function () {
    submitRequest();
});

function submitRequest () {
    console.log(1);
    let form = $j('#request-form');
    let validationForm = new VarienForm('request-form', true);
    if (validationForm.validator.validate()) {
        $j.ajax({
            type: "POST",
            url: form.attr('action'),
            data: form.serialize(),
            success: function () {
                $j('#request-popup .popup-content').hide();
                $j('#request-popup .success').show();
            },
            error: function (r) {
                alert(JSON.parse(r.responseText));
            }
        });
    }
}