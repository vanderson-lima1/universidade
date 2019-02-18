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
const btnSubmit       = document.getElementById('btnSubmit');
const formParaValidar = document.forms[0].id;
/* ======================================================================= */

switch (formParaValidar) {
    // Courses
    case 'formCoursesCreate': 
    case 'formCoursesAlter' :
    // Institutions
    case 'formInstitutionsCreate': 
    case 'formInstitutionsAlter' :
    // Employees
    case 'formEmployeesCreate': 
    case 'formEmployeesAlter' :
    // Students
    case 'formStudentsCreate': 
    case 'formStudentsAlter' :
    // Subjects
    case 'formSubjectsCreate': 
    case 'formSubjectsAlter' :
    // Teachers
    case 'formTeachersCreate': 
    case 'formTeachersAlter' :
    // Unities
    case 'formUnitiesCreate' :
    case 'formUnitiesAlter': 
        btnSubmit.addEventListener('click', validaFormGenericCreate, false); // Apenas form com o campo [NAME].
        break;    
    // Patients
    case 'formPatientsCreate': 
    case 'formPatientsAlter' :
        btnSubmit.addEventListener('click', validaFormPatientsCreate, false);
        break;
    default:
        break;
}

/* ======================================================================= */
/* === Validação Frontend - Formulário (( GENERIC - CREATE )) ============ */
/* ======================================================================= */
function validaFormGenericCreate(evento) {

    let name  = document.getElementById('name')
    //let form  = document.forms[0];

        // Validação de NOME.
        if(name) {
            retorno = validaCampoVazio(name.value);

            if(retorno === true) {
                retorno = validaTamanhoMaxString(name.value, 100);
            }

            if(retorno === true) {
                retorno = validaConteudoAlpha(name.value);
            }

            if(retorno === true) {
                retorno = validaEspacos(name.value);
                name.value = retorno;

                retornaCss(name);
                name.blur();
                evento.preventDefault();
            } else {
                formataCss(name);
                //validaFocus(name) 
                evento.preventDefault();
            }

        } 
       
}
/* ======================================================================= */

/* ======================================================================= */
/* ======================================================================= */
/* === Validação Frontend - Formulário (( Patients )) ==================== */
/* ======================================================================= */
function validaFormPatientsCreate(evento) {

        let patients = {
            name        :document.getElementById('name'),
            //sex       :document.getElementById('sex'),    // Já carrega validado do server.
            //period    :document.getElementById('period'), // Já carrega validado do server.
            //ddd       :document.getElementById('ddd'),    // Depois vou incluir o ddd na base de dados.
            //phone_whats // Depois incluir algum parâmetro para saber se número de telefone é whatsapp [S/N]. 
            phone       :document.getElementById('phone'),
            documentRG  :document.getElementById('documentRG'),
            documentCPF :document.getElementById('documentCPF'),
            documentSUS :document.getElementById('documentSUS'),
            objPatients :document.forms[0].elements, // Todos elementos do formulário.
        }

        let retorno;

        // Validação de NOME.
        if(patients.name) {
            retorno = false;
            retorno = validaCampoVazio(patients.name.value);

            if(retorno === true) {
                retorno = validaTamanhoMaxString(patients.name.value, 100);
            }

            if(retorno === true) {
                retorno = validaConteudoAlpha(patients.name.value);
            }

            if(retorno === true) {
                retorno = validaEspacos(patients.name.value);
                patients.name.value = retorno;

                retornaCss(patients.name);
                patients.name.blur();
            } else {
                formataCss(patients.name);
                validaFocus(patients.objPatients) 
                evento.preventDefault();
            }

        }

        // Validação de TELEFONE.
        if(patients.phone) {
            retorno = false;
            retorno = validaCampoVazio(patients.phone.value);

            if(retorno === true) {
                retorno = validaTamanhoMaxString(patients.phone.value,9);
            }

            if(retorno === true) {
                retorno = validaConteudoNumerico(patients.phone.value);
            }

            if(retorno === true) {
                retorno = validaEspacos(patients.phone.value);
                patients.phone.value = retorno;

                retornaCss(patients.phone);
                patients.phone.blur();
            } else {
                formataCss(patients.phone);
                validaFocus(patients.objPatients) 
                evento.preventDefault();
            }

        }

        // Validação de DOCUMENTO - RG.
        if(patients.documentRG) {
            retorno = validaCampoVazio(patients.documentRG.value);

            if(retorno === true) {
                retorno = validaTamanhoMaxString(patients.documentRG.value,15);
            }

            if(retorno === true) {
                retorno = validaConteudoNumerico(patients.documentRG.value);
            }

            if(retorno === true) {
                retorno = validaEspacos(patients.documentRG.value);
                patients.documentRG.value = retorno;

                retornaCss(patients.documentRG);
                patients.documentRG.blur();
            } else {
                formataCss(patients.documentRG);
                validaFocus(patients.objPatients) 
                evento.preventDefault();
            }

        }

        // Validação de DOCUMENTO - CPF.
        if(patients.documentCPF) {
            retorno = validaCampoVazio(patients.documentCPF.value);

            if(retorno === true) {
                retorno = validaTamanhoMaxString(patients.documentCPF.value,15);
            }

            if(retorno === true) {
                retorno = validaConteudoNumerico(patients.documentCPF.value);
            }

            if(retorno === true) {
                retorno = validaEspacos(patients.documentCPF.value);
                patients.documentCPF.value = retorno;

                retornaCss(patients.documentCPF);
                patients.documentCPF.blur();
            } else {
                formataCss(patients.documentCPF);
                validaFocus(patients.objPatients) 
                evento.preventDefault();
            }

        }

        // Validação de DOCUMENTO - SUS.
        if(patients.documentSUS) {
            retorno = validaCampoVazio(patients.documentSUS.value);

            if(retorno === true) {
                retorno = validaTamanhoMaxString(patients.documentSUS.value,15);
            }

            if(retorno === true) {
                retorno = validaConteudoNumerico(patients.documentSUS.value);
            }

            if(retorno === true) {
                retorno = validaEspacos(patients.documentSUS.value);
                patients.documentSUS.value = retorno;

                retornaCss(patients.documentSUS);
                patients.documentSUS.blur();
            } else {
                formataCss(patients.documentSUS);
                validaFocus(patients.objPatients) 
                evento.preventDefault();
            }

        }

}
/* ======================================================================= */


/* ======================================================================= */
/* === Validação Frontend - Funções utilizadas para validações =========== */
/* ======================================================================= */
function formataCss(campoAtual) {
    campoAtual.style.backgroundColor = "#f8eced",
    campoAtual.style.border = "2px solid #721c24",
    campoAtual.style.borderRadius = "4px",
    campoAtual.style.padding = "4px"
}
function retornaCss(campoAtual) {
    campoAtual.style.backgroundColor = "#fff",
    campoAtual.style.border = "0px solid #fff",
    campoAtual.style.borderRadius = "0px",
    campoAtual.style.padding = "0px"
}
/* ======================================================================= */

/* ======================================================================= */
/* === Verifica se campo está vazio e força o cursor do mouse focus() ==== */
/* ======================================================================= */
function validaFocus(objCampos) {

    let elementos  = objCampos;

    if(elementos['name'].value === '') {
        return elementos['name'].focus();
    } 

    if(elementos['phone'].value === '') {
        return elementos['phone'].focus();
    }

    if(elementos['documentRG'].value === '') {
        return elementos['documentRG'].focus();
    }

    if(elementos['documentCPF'].value === '') {
        return elementos['documentCPF'].focus();
    }

    if(elementos['documentSUS'].value === '') {
        return elementos['documentSUS'].focus();
    }

}
 
    /*
    switch (elementos[0].id) {
        case name:
        if(elementos['name'].value === '') {
            //return elementos['name'].focus();
            return false;
        } else if (elementos['name'].value != '' && campo === elementos['name'].id) {
            //return elementos['name'].focus();
            alert("AQUI")
            return false;
        } 
        break;

        case phone:
        if(elementos['phone'].value === '') {
            //return elementos['phone'].focus();
            return false;
        } else if (elementos['phone'].value != '' && campo === elementos['phone'].id) {
            //return elementos['phone'].focus();
            return false;
        }
        break;

        case documentRG:
        if(elementos['documentRG'].value === '') {
            //return elementos['documentRG'].focus();
            return false;
        } else if (elementos['documentRG'].value != '' && campo === elementos['documentRG'].id) {
            //return elementos['documentRG'].focus();
            return false;
        }
        break;

        case documentCPF:
        if(elementos['documentCPF'].value === '') {
            //return elementos['documentCPF'].focus();
            return false;
        } else if (elementos['documentCPF'].value != '' && campo === elementos['documentCPF'].id) {
            //return elementos['documentCPF'].focus();
            return false;
        }
        break;

        case documentSUS:
        if(elementos['documentSUS'].value === '') {
            //return elementos['documentSUS'].focus();
            return false;
        } else if (elementos['documentSUS'].value != '' && campo === elementos['documentSUS'].id) {
            //return elementos['documentSUS'].focus();
            return false;
        }
        break;

        default:
            break;
    }
*/
/* ======================================================================= */




/* ======================================================================= */
/* === Validação para retirar espaços desnecessários (>= 2 espaços) ====== */
/* ======================================================================= */
function validaEspacos(valorString) {

    valorString = valorString.split(' ').join('<>');
    valorString = valorString.split('><').join('');
    valorString = valorString.split('<>').join(' ');

/* === Validação para retirar espaços no início e no final da string ===== */
    valorString = valorString.trim();

    return valorString;

}
/* ======================================================================= */

/* ======================================================================= */
/* === Validação de campo vazio ========================================== */
/* ======================================================================= */
function validaCampoVazio(valorString) {
    let resultado;
    let mensagemErro;

    resultado = valorString.length > 0 ? true : false;
    if (resultado === false) {
        mensagemErro = "Campo de preenchimento obrigatório.";
        //Chamar função para alterar conteúdo DIV e apreentar mensagem.
        console.log(mensagemErro)
        return false;
    } else {
        return true;
    }

}
/* ======================================================================= */

/* ======================================================================= */
/* === Validação de tamanho da String ==================================== */
/* ======================================================================= */
    function validaTamanhoMaxString(valorString,tamanhoMax) {
    let resultado;
    let mensagemErro;

    resultado = valorString.length > tamanhoMax ? true : false;
    if (resultado === true) {
        mensagemErro = "Você ultrapassou o limite de " + tamanhoMax + " caracteres.";
        //Chamar função para alterar conteúdo DIV e apreentar mensagem.
        console.log(mensagemErro)
        return false;
    } else {
        return true;
    }

}
/* ======================================================================= */

/* ======================================================================= */
/* === Validação de conteúdo alpha ======================================= */
    //Regex para tratar apenas conteúdo alpha, sendo:
    // De a - z minúsculo e maiúsculo, incluindo acentuação.
/* ======================================================================= */
    function validaConteudoAlpha(valorString) {
    let regexStr  = /^[a-záàâãéèêíïóôõöúçñA-ZÁÀÂÃÉÈÊÍÏÓÒÖÚÇÑ ]+$/;
    let resultado;
    let mensagemErro;

    resultado = regexStr.test(valorString);  
    if (resultado === false) {
        mensagemErro = "Informe somente letras.";
        //Chamar função para alterar conteúdo DIV e apreentar mensagem.
        console.log(mensagemErro)
        return false;
    } else {
        return true;
    }

}
/* ======================================================================= */

/* ======================================================================= */
/* === Validação de conteúdo numérico ==================================== */
/* ======================================================================= */
function validaConteudoNumerico(valorNumero) {
    let regexNum = new RegExp(/^[0-9]{1,}$/);
    let resultado;
    let mensagemErro;

    //Regex para tratar apenas conteúdo número de [0-9].
    resultado = (regexNum.test(valorNumero));
    if (resultado === false) {
        mensagemErro = "Informe somente números.";
        //Chamar função para alterar conteúdo DIV e apreentar mensagem.
        console.log(mensagemErro)
        return false;
    } else {
        return true;
    }

}
/* ======================================================================= */



