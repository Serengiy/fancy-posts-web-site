const authorName = document.getElementById('author-name').innerHTML
const commentLabel = document.getElementById('comment-label')
const commentCancelBtn = document.getElementById('comment-cancel-btn')
// const commentId = document.getElementById('get-comment-id').value
const commentFormValueId = document.getElementById('reply-to-form')
const commentSubmitBtn = document.getElementById('comment-submit-btn')

function replyTo(id){
    commentSubmitBtn.innerText = `Reply to ${authorName.split(' ')[0]}`
    commentFormValueId.value = id
    commentCancelBtn.style.display= 'inline'
    commentLabel.innerText = `Reply to ${authorName}`
    console.log(commentFormValueId.value)
}


function getDefault(){
    commentSubmitBtn.innerText = 'Leave the comment'
    commentFormValueId.value = null
    commentCancelBtn.style.display= 'none'
    commentLabel.innerText = `Comment`
}
