
function fillLuogoData() {

    var url = window.location.href;
    var splitted_url = url.split("/");
    var codice = splitted_url[splitted_url.length - 1];

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var risposta = JSON.parse(xmlhttp.responseText);
            setTable(risposta, codice);
        }
    };

    xmlhttp.open("GET", "/TicketStore/Json/" + codice, true);
    xmlhttp.send();
}



function setTable(risposta, codice) {

    var dettagli = '';
    var table = '';

    for (let i = 0; i < risposta.eventi.length; i++) {
        if (risposta.eventi[i].hasOwnProperty('casa')) {
            dettagli = risposta.eventi[i].casa + "-" + risposta.eventi[i].ospite;
        }
        if (risposta.eventi[i].hasOwnProperty('compagnia')) {
            dettagli = risposta.eventi[i].compagnia;
        }
        if (risposta.eventi[i].hasOwnProperty('artista')) {
            dettagli = risposta.eventi[i].artista;
        }

        var splitted_data = risposta.eventi[i].data.split(" ");
        var data = splitted_data[0] + "_" + splitted_data[1];

        let html_command = '<tr><td>' + risposta.eventi[i].data + '</td>' +
                '<td>' + risposta.eventi[i].luogo.citta + '</td>' +
                '<td>' + risposta.eventi[i].luogo.struttura + '</td>' +
                '<td>' + dettagli + '</td>' +
                '<td>' + risposta.eventi[i].partecipazioni[0].prezzo + '</td>' +
                '<td><a type="button" class="btn btn-warning" href="/TicketStore/zona/' + codice + '/' + data + '">Acquista</a></td></tr>';
        table = table + html_command;
    }
    document.getElementById("table-section").innerHTML = table;
    let html_command_nome = '<h4>' + risposta.nome + '</h4>';
    document.getElementById("nome").innerHTML = html_command_nome;
    let html_command_immagine = '<img src=/TicketStore/' + risposta.img + ' class="img-fluid" alt="Responsive image">';
    document.getElementById("immagine").innerHTML = html_command_immagine;

}
