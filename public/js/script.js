$(document).ready(function ()
{
    var $form = $(".form-control");
    $(".datepicker").datepicker({
        format: "dd/mm/yyyy"
    });
    $form.on('focus',function()
    {
        $(".phone").setMask("phone");
        $(".cpf").setMask("cpf");
        $(".anoSemestre").setMask("anoSemestre");
        $(".cnpj").setMask("cnpj");
        $(".planoconta").setMask("planoconta");
        $(".datepicker").setMask("date");
        $(".cep").setMask("cep");
        $(".time").setMask("time");
        $(".cc").setMask("cc");
        $(".integer").setMask("integer");
        $(".decimal").setMask("decimal");
        $(".percentual").setMask("percentual");
        $(".signed-decimal").setMask("signed-decimal");
    });
    $(".remove-link").on("click", function (e)
    {
        e.preventDefault();
        console.log($(this).data("url"));
        $("#form-delete").attr('action',$(this).data("url"));
    });
});
