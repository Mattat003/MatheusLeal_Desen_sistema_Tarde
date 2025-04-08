//EXECUTAR MASCARAS

//DEFINE O OBJETO E CHAMA FUNÇÃO
function mascara(o, f){
    objeto=o
    funcao=f
    setTimeout ("executaMascara()",1)
}

function executaMascara(){
    objeto.value=funcao (objeto.value)
}

//MASCARAS

//Mascara do Telefone
function telefone(variavel){
    variavel=variavel.replace(/\D/g,"") //Remove tudo que não é digito

    //A LINHA ABAIXO É RESPONSAVEL DE ADICIONAR OS PARENTESES EM VOLTA DOS DOIS PRIMEIROS DIGITOS
    variavel=variavel.replace(/^(\d\d)(\d)/g,"($1) $2")

    //A LINHA ABAIXO É RESPONSAVEL DE ADICIONAR O HIFEM ENTRE O QUARTO E QUINTO DIGITOS
    variavel=variavel.replace(/(\d{4})(\d)/,"$1-$2") //Coloca a segunda
    return variavel
}

//Mascara do RG e CPF
function RGeCPF(variavel){
    variavel=variavel.replace(/\D/g,"") //Remove tudo que não é número
    
    //A LINHA ABAIXO É RESPONSAVEL DE ADICIONAR O PONTO APOS O TERCEIRO DIGITO E QUARTO DIGITO
    variavel=variavel.replace(/(\d{3})(\d)/,"$1.$2")

    //A LINHA ABAIXO É RESPONSAVEL DE ADICIONAR O PONTO APOS O SEXTO DIGITO E O SETIMO DIGITO
    variavel=variavel.replace(/(\d{3})(\d)/,"$1.$2")

    //A LINHA ABAIXO É RESPONSAVEL DE ADICIONAR O HIFEM APOS O SETIMO DIGITO E PERMITE APENAS 
    // 2 DIGITOS APOS O HIFEM
    variavel=variavel.replace(/(\d{3})(\d{1,2})$/,"$1-$2")

}

//Mascara do CEP
function cep(variavel){
    variavel=variavel.replace(/\D/g,"") //Remove tudo que não é número
    variavel=variavel.replace(/(\d{2})(\d)/,"$1.$2")
    variavel=variavel.replace(/(\d{3})(\d{1,3})$/,"$1-$2")
    return variavel

}

//Mascara da DATA
function data(variavel){
    variavel=variavel.replace(/\D/g,"") //Remove tudo que não é número
    variavel=variavel.replace(/(\d{2})(\d)/,"$1/$2") //Coloca a primeira barra
    variavel=variavel.replace(/(\d{2})(\d)/,"$1/$2")
    return variavel
}


