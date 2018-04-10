window.onload = function() {
    var d = new Date();
    var month = new Array();
    month[0] = 1;
    month[1] = 2;
    month[2] = 3;
    month[3] = 4;
    month[4] = 5;
    month[5] = 6;
    month[6] = 7;
    month[7] = 8;
    month[8] = 9;
    month[9] = 10;
    month[10] = 11;
    month[11] = 12;
    var n = month[d.getMonth()];

    var thanghientai = document.getElementById('thang-hien-tai').innerHTML = "Tháng " + n%12;
    var thanghientai = document.getElementById('thang-hien-tai-1').innerHTML = "Tháng " + (n%12-1);
    var thanghientai = document.getElementById('thang-hien-tai-2').innerHTML = "Tháng " + (n%12-2);
    var thanghientai = document.getElementById('thang-hien-tai-3').innerHTML = "Tháng " + (n%12-3);
    var thanghientai = document.getElementById('thang-hien-tai-4').innerHTML = "Tháng " + (n%12-4);
    var thanghientai = document.getElementById('thang-hien-tai-5').innerHTML = "Tháng " + (n%12-5);
}