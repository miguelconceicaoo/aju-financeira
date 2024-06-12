const cpf = document.querySelector('#cpf')
cpf.addEventListener('keypress', () =>{
    let inputlength = cpf.value.length

    if(inputlength === 3 || inputlength === 7){
        cpf.value += '.'

    }else if(inputlength === 11){
        cpf.value += '-'
    }
})

const cep = document.querySelector('#cep')
cep.addEventListener('keypress', () =>{
    let inputlength = cep.value.length

    if(inputlength === 5){
        cep.value += '-'
    }
})

const tel1 = document.querySelector('#telefonecelular')
tel1.addEventListener('keypress', () =>{
    let inputlength = tel1.value.length

    if(inputlength === 0){
        tel1.value += '('

    }else if(inputlength === 3){
        tel1.value += ')'

    }else if(inputlength === 9){
        tel1.value += '-'
    }
})

const tel2 = document.querySelector('#telefonefixo')
tel2.addEventListener('keypress', () =>{
    let inputlength = tel2.value.length

    if(inputlength === 0){
        tel2.value += '('

    }else if(inputlength === 3){
        tel2.value += ')'

    }else if(inputlength === 9){
        tel2.value += '-'
    }
})

const conta = document.querySelector('#numeroconta')
conta.addEventListener('keypress', () =>{
    let inputlength = conta.value.length

    if(inputlength === 8){
        conta.value += '-'
    }
})























