function clearInput(input) {
    $(input).val('');
}

$(document).ready(function () {
    $('#cpf').mask('000.000.000-00', { reverse: true });
    $('#cellphone').mask('(00) 00000-0000');
});