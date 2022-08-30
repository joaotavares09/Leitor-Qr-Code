
function CriaRequest() {
    try {
        request = new XMLHttpRequest();
    } catch (IEAtual) {
        try {
            request = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (IEAntigo) {
            try {
                request = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (falha) {
                request = false;
            }
        }
    }
    if (!request)
        alert("Seu Navegador não suporta Ajax!");
    else
        return request;
}

function  relatorio_entrada_cafe() {
    var result = document.getElementById("relatorio_entrada");
    var botao = document.getElementById("relatorio_entrada_botao");
    var data_inicial = document.getElementById("data_inicial").value;
    var data_final = document.getElementById("data_final").value;

    var xmlreq = CriaRequest();
    xmlreq.open("GET", "../Controller/Relatorio_entrada_cafe.php?data_inicial="+data_inicial+"&data_final="+data_final, true);
    xmlreq.onreadystatechange = function () {
        // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
        if (xmlreq.readyState == 4) {
            if (xmlreq.status == 200) { 
                result.innerHTML= xmlreq.responseText;
                botao.innerHTML="<label></label>";//+
                // "<a href='relatorio_entrada_pdf.php?data_inicial="+data_inicial+"&data_final="+data_final+
                //"' class='btn btn-block bg-gradient-warning btn-lg' >GERAR PDF</a>"
            } else {
                
            }
        }
    };
    xmlreq.send(null);
}

function  relatorio_entrada_almoco() {
    var result = document.getElementById("relatorio_entrada");
    var botao = document.getElementById("relatorio_entrada_botao");
    var data_inicial = document.getElementById("data_inicial").value;
    var data_final = document.getElementById("data_final").value;

    var xmlreq = CriaRequest();
    xmlreq.open("GET", "../Controller/Relatorio_entrada_almoco.php?data_inicial="+data_inicial+"&data_final="+data_final, true);
    xmlreq.onreadystatechange = function () {
        // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
        if (xmlreq.readyState == 4) {
            if (xmlreq.status == 200) { 
                result.innerHTML= xmlreq.responseText;
                botao.innerHTML="<label></label>";//+
                // "<a href='relatorio_entrada_pdf.php?data_inicial="+data_inicial+"&data_final="+data_final+
                //"' class='btn btn-block bg-gradient-warning btn-lg' >GERAR PDF</a>"
            } else {
                
            }
        }
    };
    xmlreq.send(null);
}


function  ultimas_entradas() {
    var result = document.getElementById("ultimas_entradas");
    var xmlreq = CriaRequest();
    xmlreq.open("GET", "../Controller/Ultimas_entradas.php", true);
    xmlreq.onreadystatechange = function () {
        // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
        if (xmlreq.readyState == 4) {
            if (xmlreq.status == 200) { 
                result.innerHTML= xmlreq.responseText;
            } else {
                
            }
        }
    };
    xmlreq.send(null);
}

function  registrar_entrada(qrcode) {
    //var result = document.getElementById("resultado_pesquisa");
    var xmlreq = CriaRequest();
    xmlreq.open("GET", "../Controller/Registrar_entrada.php?qrcode="+qrcode, true);
    xmlreq.onreadystatechange = function () {
        // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
        if (xmlreq.readyState == 4) {
            if (xmlreq.status == 200) { 
                var dados= xmlreq.responseText;
                if (dados!="erro") {
                    array=dados.split('/');
                    var nome=array[0];
                    var matricula=array[1];
                   Swal.fire({
                     position: 'center',
                     icon: 'success',
                     title: ''+nome+' - '+ matricula,
                     showConfirmButton: false,
                     timer: 3000
                   });

                }else{
                    Swal.fire({
                     position: 'center',
                     icon: 'error',
                     title: 'Opss, tente novamente!',
                     showConfirmButton: false,
                     timer: 2000
                   }); 
                }
            } else {
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Opss, tente novamente!',
                    showConfirmButton: false,
                    timer: 2000
                }); 
            }
        }
    };
    xmlreq.send(null);
    ultimas_entradas();
}