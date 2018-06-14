
function getAndFill() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var risposta = JSON.parse(xmlhttp.responseText);
        setDettagli(risposta.ordine);
        setTable(risposta);
        setImg(risposta);
    }
};
    xmlhttp.open("GET","/TicketStore/Json/ordine", true);
    xmlhttp.send();
}


function setTable(risposta) {
    var table = '';

    for(let i = 0; i < risposta.ordine.items.length ; i++) {
        let html = '<div class="biglietti">'+
                '<ul>'+
                    '<li>Zona: '+risposta.ordine.items[i].zona.nome+'</li>'+
                    '<li>Posto: f'+risposta.posti[i].fila+', p'+risposta.posti[i].posto+'</li>'+
                    '<li>Prezzo: '+risposta.ordine.items[i].prezzo+'</li>'+
                    '<li><button type="button" class="btn btn-warning" onclick="alterTable('+i+')">X</button></li>' +   
                '</ul>'+    
            '</div>';
        table = table + html; 
    }
    document.getElementById("items").innerHTML = table;
    
}

function setDettagli(risposta) {
    let html = '<li><h4>'+risposta.nomeEvento+'</h4></li>'+
                '<li><h6>'+risposta.evento.data+'</h6></li>'+
                '<li><h6>'+risposta.evento.luogo.citta+'</h6></li>'+
                '<li><h6>'+risposta.evento.luogo.struttura+'</h6></li>'+
                '<li><h6>'+risposta.evento.luogo.via+'</h6></li>';
    
    document.getElementById("dettagli").innerHTML = html;
    
}  

function setImg(risposta) {
    let path_img = '<img src="'+risposta.img+'" class="img-fluid" alt="Responsive image" id="side-img">';
    document.getElementById("box-img").innerHTML = path_img;
}


function alterTable(p) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var risposta = JSON.parse(xmlhttp.responseText);
        setTable(risposta);
    }
};
    xmlhttp.open("GET","/TicketStore/ordine/"+p, true);
    xmlhttp.send();
}