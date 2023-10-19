const hiddenBtn = document.getElementById('admin-save-changes')
const userRoleChanges ={};



function getBtn(userId, roleId){
    hiddenBtn.style.display = 'inline'
    // console.log(userId)
    userRoleChanges[userId] = roleId
}


function saveChanges(e){
    e.preventDefault()
    $.ajax({
        method:'PATCH',
        url:'/user/update-role',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            '_token': $('meta[name="csrf-token"]').attr('content'),
            changes: userRoleChanges,
        },

        success:function(data){
            // $('div.flash-message').html(data);
            $('#flash-msg').html('<div class="alert alert-info col-ssm-12 text-center" >' + data.message + '</div>');
            setTimeout(function() {
                $('#flash-msg').remove()
            }, 3000);
            hiddenBtn.style.display = 'none'
        }
    });
}


