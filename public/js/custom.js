// Receber o seletor do campo valor
let inputValor = document.getElementById('valor');

// Aguardar o usuário digitar valor no campo
inputValor.addEventListener('input', function(){

    // Obter o valor atual removendo qualquer caractere que não seja número
    let valueValor = this.value.replace(/[^\d]/g, '');

    // Adicionar os separadores de milhares
    var formattedValor = (valueValor.slice(0, -2).replace(/\B(?=(\d{3})+(?!\d))/g, '.')) + '' + valueValor.slice(-2);

    // Adicionar a vírgula e até dois dígitos se houver centavos
    formattedValor = formattedValor.slice(0, -2) + ',' + formattedValor.slice(-2);

    // Atualizar o valor do campo
    this.value = formattedValor;

});

let num_documento = document.getElementById('num_documento');

// Aguardar o usuário digitar valor no campo
num_documento.addEventListener('input', function(){

    // Obter o valor atual removendo qualquer caractere que não seja número
    let valueValor = this.value.replace(/[^\d]/g, '');

    // Adicionar os separadores de milhares
    var formattedValor = (valueValor.replace(/[^0-9,./]/g, "")) ;



    // Atualizar o valor do campo
    this.value = formattedValor;

});


$(document).ready(function(){
    $('.select2').select2({
        theme: "bootstrap-5",
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        closeOnSelect: false,
    }).on('select2:select', function (e) {
        var data = e.params.data;
        console.log(data.id); // exibe o ID do item selecionado no console
    });
});
