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

