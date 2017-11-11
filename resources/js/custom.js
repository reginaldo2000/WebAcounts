/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(function () {
    $('#data, #data-inicial, #data-final').datetimepicker({
        format: 'DD/MM/YYYY',
        locale: 'pt-br'
    });
});

$(document).ready(function () {
    $("#moeda").maskMoney({showSymbol: true, symbol: "R$", decimal: ",", thousands: ""});
});

$(document).ready(function () {
    $('#tabela').DataTable();
    if ($('#tabela tr td').hasClass('dataTables_empty')) {
        $('#tabela .odd td').html("Clique em buscar para realizar a consulta");
    }
});

function linkFrom(link) {
    location.href = link;
}

function loadDataMonetary(id) {
    $.ajax({
        type: 'post',
        dataType: 'json',
        url: '../controller/MonetaryController.php?param=6',
        data: {
            mid: id
        },
        success: function (ret) {
            document.getElementById('id-conta').value = ret[0]['id'];
            document.getElementById('desc').value = ret[0]['descricao'];
            document.getElementById('tipo').value = ret[0]['tipo'];
            var str = ret[0]['valor'];
            document.getElementById('moeda').value = str.replace(".", ",");
            document.getElementById('data-conta').value = ret[0]['data'];
        }
    });
}

function getId(id) {
    document.getElementById('id-exclusao').value = id;
}

function initGraphics() {
    loadBarGraphic();
}

function loadBarGraphic() {
//    var labels = 
    var myChart = new Chart('bar-graphic', {
        type: 'bar',
        data: {
            labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
            datasets: [{
                    label: '# Valores Mensais',
                    data: [40,40,40,50],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
        },
        options: {
            scales: {
                yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
            }
        }
    });

    Morris.Bar({
        element: 'morris-bar-chart',
        data: [{
                y: '2008',
                a: 3,
                b: 50
            }, {
                y: '2007',
                a: 75,
                b: 65
            }, {
                y: '2008',
                a: 50,
                b: 40
            }, {
                y: '2009',
                a: 75,
                b: 65
            }, {
                y: '2010',
                a: 50,
                b: 40
            }, {
                y: '2011',
                a: 75,
                b: 65
            }, {
                y: '2012',
                a: 100,
                b: 90
            }],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Receita', 'Despesa'],
        hideHover: 'auto',
        resize: true
    });
}
