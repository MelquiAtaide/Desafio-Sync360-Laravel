
$(document).ready(function() {
    // Função para carregar os estados do Brasil na inicialização da página
    $.ajax({
        url: 'https://servicodados.ibge.gov.br/api/v1/localidades/estados?orderBy=nome',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            data.forEach(function(estado) {
                $('#estado').append($('<option>', {
                    value: estado.id,
                    text: estado.nome
                }));
            });
        },
        error: function() {
            console.error('Erro ao carregar os estados');
        }
    });

    // Função para carregar as cidades com base no estado selecionado
    $('#estado').change(function() {
        var estadoId = $(this).val();
        if (estadoId) {
            $.ajax({
                url: 'https://servicodados.ibge.gov.br/api/v1/localidades/estados/' + estadoId + '/municipios',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    data.forEach(function(cidade) {
                        $('#cidade').append($('<option>', {
                            value: cidade.nome,
                            text: cidade.nome
                        }));
                    });
                },
                error: function() {
                    console.error('Erro ao carregar as cidades');
                }
            });
        } else {
            // Se nenhum estado foi selecionado, limpa o select de cidades
            $('#cidade').empty().append('<option value="">Selecione a Cidade</option>');
        }
    });

    $('form').submit(function(event) {
        // Impede o envio padrão do formulário para alterar o value do estado, salvando o nome do estado ao invés do ID no banco de dados
        event.preventDefault();
        
        var estadoId = $('#estado').val();

        $.ajax({
            url: 'https://servicodados.ibge.gov.br/api/v1/localidades/estados/' + estadoId,
            type: 'GET',
            dataType: 'json',
            success: function(estado) {
                var optionEstado = $('<option>', {
                    value: estado.nome,
                    text: estado.nome,
                    selected: 'selected'
                });
                $('#estado').empty().append(optionEstado);
                
                $('form')[0].submit();
            },
            error: function() {
                console.error('Erro ao obter detalhes do estado');
            }
        });
    });
});
