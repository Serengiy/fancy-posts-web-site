// If at least one checkbox chosen

const myModal= document.getElementById('my-modal')
const myModal2= document.getElementById('my-modal-2')
const myForm = document.getElementById('my-form')



function modal_is_on(id){
    myModal.style.display='flex'
    return myForm.action = '/posts/'+id
}

function modal_is_off(){
    myModal.style.display='none'
}

function stop_ppg(e){
    e.stopPropagation()
}


function modal_likes_is_on(){
    myModal2.style.display='flex'
}

function modal_likes_is_off(){
    myModal2.style.display='none'
}

