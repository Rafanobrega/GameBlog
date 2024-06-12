var tbody = document.getElementById("tbody");

var dados = [
    ["Red Dead Redemption 2","Ação/Aventura","PS4, Xbox One, PC","2018"],
    ["The Witcher 3: Wild Hunt","RPG","PS4, Xbox One, PC","2015"],
    ["Forza Horizon 5","Corrida","Xbox One","2021"],
    ["Tekken 8","Luta","PS5, Xbox Series X/S, PC","2024"],
    ["Resident Evil 4 Remake","Survival Horror","PS5, Xbox Series X/S, PC","2023"],
    ["Bloodborn","RPG","PS4","2015"],
    ["Sekiro","RPG","PS4, Xbox One, PC (Windows), Stadia",  "2019"]
];

for(var i=0; i < dados.length; i++){
    var tr = "<tr>" +
        "<td>" + dados[i][0] + "</td>" +
        "<td>" + dados[i][1] + "</td>" +
        "<td>" + dados[i][2] + "</td>" +
        "<td>" + dados[i][3] + "</td>" +
        "<tr>";
tbody.innerHTML += tr;

}

document.getElementById("txtbusca").addEventListener("keyup", function()   
{
    var busca = document.getElementById("txtbusca").value.toLowerCase();

    for (var i=0; i< tbody.children.length; i++){
        var tr = tbody.children[i];
        var achou= false;

        for(var j=0; j< tr.children.length; j++){
            var value = tr.children[j].textContent.toLowerCase();

            if (value.indexOf(busca) >= 0){
                achou= true;
                break;
            }
        }
        tr.style.display = achou ? "table-row" : "none";
    }
});

