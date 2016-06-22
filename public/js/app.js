/**
 * Created by kareem on 6/18/2016.
 */
(function () {
    var pusher = new pusher('d0a38dbacc96e2f1a44d') ;
    var channel = pusher.subscribe('demochannel') ;
    channel.bind('notifaication',function (data) {
        alert('this is a notification');
        
    })
    
})
