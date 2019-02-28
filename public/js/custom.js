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
/*$(document).ready(function() {
    $(window).scroll(function() {
        if($(window).scrollTop()>0) {
            $('nav').addClass('sticky-nav');
            $('.menu-custom').addClass('menu-custom-scroll');
        }else{
            $('nav').removeClass('sticky-nav');
            $('.menu-custom').removeClass('menu-custom-scroll');
        }
    });
}) ;*/

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
                //evento.preventDefault();
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
                retorno = validaTamanhoMaxString(patients.documentCPF.value,11);
            }

            if(retorno === true) {
                retorno = validaConteudoNumerico(patients.documentCPF.value);
            }

            if(retorno === true) {
                retorno = validaNumeroCpf(patients.documentCPF.value);
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

/* ======================================================================= */
/* === Validação de DDD para todo o Brasil =============================== */
/* ======================================================================= */
function validaDdd(valorNumero) {
    
    let dddValido = 
        [
            '11','12','13','14','15','16','17','18','19','21',
            '22','24','27','28','31','32','33','34','35','37',
            '38','41','42','43','44','45','46','47','48','49',
            '51','53','54','55','61','62','63','64','65','66',
            '67','68','69','71','73','74','75','77','79','81',
            '82','83','84','85','86','87','88','89','91','92',
            '93','94','95','96','97','98','99'
        ];

    let estadosComregraDeNonoDigito =
        [
            'sp','rj'
        ]    

    let cidadesComregraDeNonoDigito =
        [
            'sao paulo','rio de janeiro'
        ]    

    
    let resultado;
    let mensagemErro;

    return true;
    
}
/* ======================================================================= */

/* ======================================================================= */
/* === Validação de CPF ================================================== */
/* ======================================================================= */
function validaNumeroCpf(numeroCpf) {	
    let mensagemErro;

    // Transforma qualquer caracter que não seja número em espaço.
	numeroCpf = numeroCpf.replace(/[^\d]+/g,'');	
    
    // Verifica se CPF está totalmente em branco.
    if(numeroCpf == '') {
        mensagemErro = "CPF inválido - Validação = 1.";
        console.log(mensagemErro)
        return false;	
    }
    
	// Após conversão de caracteres inválidos em espaço, verifica se o conteúdo está com 11 bytes.	
    if(numeroCpf.length != 11) {
        mensagemErro = "CPF inválido - Validação = 2.";
        console.log(mensagemErro)
        return false;		
    } 

   	// Verifica CPF's inválidos conhecidos.	
    if( numeroCpf == "00000000000" || numeroCpf == "11111111111" || 
        numeroCpf == "22222222222" || numeroCpf == "33333333333" || 
        numeroCpf == "44444444444" || numeroCpf == "55555555555" || 
        numeroCpf == "66666666666" || numeroCpf == "77777777777" || 
        numeroCpf == "88888888888" || numeroCpf == "99999999999") {
            mensagemErro = "CPF inválido - Validação = 3.";
            console.log(mensagemErro)
		    return false;		
    }

	// === Valida primeiro dígito.	
	var add = 0;	
	for (i=0; i < 9; i ++)	{
        add += parseInt(numeroCpf.charAt(i)) * (10 - i);	
        rev = 11 - (add % 11);	
    }
    
    var primeiroDigito = rev;

	if (primeiroDigito == 10 || primeiroDigito == 11) {		
        console.log("PRIMEIRO DÍGITO - ",primeiroDigito);
        primeiroDigito = 0;	
    }

    if (primeiroDigito != parseInt(numeroCpf.charAt(9))) {
        mensagemErro = "CPF inválido - Validação = 4.";
        console.log(mensagemErro)
        return false;	
    }
            	
	// === Valida segundo dígito.	
	add = 0;	
	for (i = 0; i < 10; i ++) {	
        add += parseInt(numeroCpf.charAt(i)) * (11 - i);
        rev = 11 - (add % 11);	
    }

    var segundoDigito = rev;

	if (segundoDigito == 10 || segundoDigito == 11)	{
        console.log("SEGUNDO DÍGITO - ",segundoDigito);
        segundoDigito = 0;	
    }
	if (segundoDigito != parseInt(numeroCpf.charAt(10))) {
        mensagemErro = "CPF inválido - Validação = 5.";
        console.log(mensagemErro)
        return false;		
    }

    // CPF validado com sucesso.
	return true;   
}
/* ======================================================================= */



