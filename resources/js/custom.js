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
$(document).ready(function () {
    $('#tabela').DataTable();
});