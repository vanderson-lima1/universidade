/* ======================================================================= */
/* === Menu Toggle / Recolher/Expandir =================================== */
/* === Desativado em 29/01/2019 ========================================== */
/* ======================================================================= */
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});

/* ======================================================================= */
/* === Header Secundário / Topo Fixo ===================================== */
/* ======================================================================= */
$(document).ready(function() {
    $(window).scroll(function() {
        if($(window).scrollTop()>100) {
            $('nav').addClass('sticky-nav');
            $('.menu-custom').addClass('menu-custom-scroll');
        }else{
            $('nav').removeClass('sticky-nav');
            $('.menu-custom').removeClass('menu-custom-scroll');
        }
    });
}) ;

/* ======================================================================= */
/* ======================================================================= */
/* ======================================================================= */
$(document).ready(function(){
    $('.tabs').tabs();
});

/* ======================================================================= */
/* === Tooltips para botões: Alterar/Visualizar/Excluir ================== */
/* ======================================================================= */
$(document).ready(function(){
    $('.tooltipped').tooltip();
});

$(document).ready(function() {
    $('select').material_select();
});

/* ======================================================================= */
/* === Função para remover DIV de alerta (com JQuery) ==================== */
/* ======================================================================= */
setTimeout(function() {
    $('#mensagemDeConfirmacao').fadeOut('fast');
 }, 2000);

/* ======================================================================= */
/* === Validação Frontend de formulários ================================= */
/* ======================================================================= */
const formParaValidar = document.forms[0].id;
const btnSubmit       = document.getElementById('btnSubmit');
const result          = document.getElementById('result');
btnSubmit.addEventListener('click', validaForm, true);

function validaForm(evento) {
    let nomeForm = formParaValidar;

    // Valida formulário de Pacientes.
    if(nomeForm === 'formPatients') {

        let patients = {
            name        :document.getElementById('name'),
            //sex       :document.getElementById('sex'),    // Já carrega validado do server.
            //period    :document.getElementById('period'), // Já carrega validado do server.
            //ddd       :document.getElementById('ddd'),      // Depois vou incluir o ddd na base de dados.
            phone       :document.getElementById('phone'),
            documentRG  :document.getElementById('documentRG'),
            documentCPF :document.getElementById('documentCPF'),
            documentSUS :document.getElementById('documentSUS'),
        }

        if(patients.name.value === '') {
            let retorno = validaString(patients.name.value);
            if(retorno) {
                //Não consigo sobrescrever o style e retornar o evento para continuar.
                retornaCss(patients.documentSUS);
            } else {
                alteraCss(patients.name);
                patients.name.focus();
                evento.preventDefault();
            }
        } 

        if(patients.phone.value === '') {
            let retorno = validaTelefone(patients.phone.value, '011');
            if(retorno) {
                //Não consigo sobrescrever o style e retornar o evento para continuar.
                retornaCss(patients.documentSUS);
            } else {
                alteraCss(patients.phone);
                patients.phone.focus();
                evento.preventDefault();
            }
        } 

        if(patients.documentRG.value === '') {
            let retorno = validaDocumento(patients.documentRG.value, 'rg');
            if(retorno) {
                //Não consigo sobrescrever o style e retornar o evento para continuar.
                retornaCss(patients.documentSUS);
            } else {
                alteraCss(patients.documentRG);
                patients.documentRG.focus();
                evento.preventDefault();
            }
        } 

        if(patients.documentCPF.value === '') {
            let retorno = validaDocumento(patients.documentCPF.value, 'cpf');
            if(retorno) {
                //Não consigo sobrescrever o style e retornar o evento para continuar.
                retornaCss(patients.documentSUS);
            } else {
                alteraCss(patients.documentCPF);
                patients.documentCPF.focus();
                evento.preventDefault();
            }
        } 

        if(patients.documentSUS.value === '') {
            let retorno = validaDocumento(patients.documentSUS.value,'sus');
            if(retorno) {
                //Não consigo sobrescrever o style e retornar o evento para continuar.
                retornaCss(patients.documentSUS);
            } else {
                alteraCss(patients.documentSUS);
                patients.documentSUS.focus();
                evento.preventDefault();
            }
        } 

    }

    // Valida formulário de Cursos.
    if(nomeForm === 'formCourses') {

        let courses = {
            name        :document.getElementById('name'),
        }

        if(courses.name.value === '') {
            let retorno = validaString(courses.name.value);
            if(retorno) {
                //Não consigo sobrescrever o style e retornar o evento para continuar.
                retornaCss(courses.name);
            } else {
                alteraCss(courses.name);
                courses.name.focus();
                evento.preventDefault();
            }
        } 

    }
}

function alteraCss(campoAtual) {
    retorno = campoAtual.style.backgroundColor = "#f8eced",
              campoAtual.style.border = "2px solid #721c24",
              campoAtual.style.borderRadius = "4px",
              campoAtual.style.padding = "4px"
}

function retornaCss(campoAtual) {
    retorno = campoAtual.style.backgroundColor = "#fff",
              campoAtual.style.border = "0px solid #fff",
              campoAtual.style.borderRadius = "0px",
              campoAtual.style.padding = "0px"
}

function validaString(conteudoString) {
    let conteudo = conteudoString;

    if(conteudo === '') {
        // Conteúdo NOK.
        return false;
    } else {
        // Conteúdo OK.
        return true;
    }
};

function validaTelefone(numeroTelefone, dddTelefone) {
    let conteudoTel = numeroTelefone;
    let dddTel      = dddTelefone;

    //Falta o DDD

    if(conteudoTel === '' || conteudoTel === 0) {
        // Conteúdo NOK.
        return false;
    } else {
        // Conteúdo OK.
        return true;
    }
};

function validaDocumento(numeroDocumento, tipoDocumento) {
    let numeroDoc = numeroDocumento;
    let tipoDoc   = tipoDocumento;

    //RG
    //CPF
    //SUS

    if(numeroDoc === '' || numeroDoc === 0) {
        // Conteúdo NOK.
        return false;
    } else {
        // Conteúdo OK.
        return true;
    }
};
