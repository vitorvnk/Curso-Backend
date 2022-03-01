$(document).ready(function(){
    $(".cpf").mask("999.999.999-99");
    $(".rg").mask("99.999.999-9");
    $('.salary').mask('#.##0,00', {reverse: true});
});