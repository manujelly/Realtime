// Enable pusher logging - don't include this in production
// Pusher.logToConsole = true;

var pusher = new Pusher('*****************', {
    cluster: 'eu',
    forceTLS: true
});

function parseMessage(message,user){
    return "<div class=\"card mt-2\">\n" +
        "<div class='user_name ml-3'>" +
        "<small>"+user+"</small>"+
        "</div>"+
        "                    <div class=\"card-body\">\n" + message +
        ".\n" +
        "                    </div>\n" +
        "                </div>";
}

var channel = pusher.subscribe('my-channel');
channel.bind('my-event', function(data) {
    $('.chat-messages').append(parseMessage(data.message,data.user.name));
    $('.messageAlert').prop('hidden',false).text(data.user.name+' a envoyé un message');
    setTimeout(()=>{
        $('.messageAlert').prop('hidden',true);
    },4000)
});
