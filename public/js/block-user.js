$(document).on('click','.blocking-user', function(){
    var id = $(this).attr('data-id');
    var status = $(this).attr('data-status');
    let _token   = $('meta[name="csrf-token"]').attr('content');
    let _url = `/admin/block/user`
    $.ajax({
        url: _url,
        type: 'post',
        dataType: 'json',
        data: {'user_id':id,'user_status':status,'_token':_token},
        success: function (data) {
            if (data == 0) {
                $('.blocking-user').attr('data-status','inactive');
            } else {
                $('.blocking-user').attr('data-status','active');
            }
        }, error: function (error) {

        },
    });
});
