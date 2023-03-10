console.log('temp.js');

$.ajax({
    type: "GET",
    headers: {  'Access-Control-Allow-Origin': '*' },
    url: "https://murder-in-aggieland.herokuapp.com/API/users.php",
    data: {
        functionName: "getCurrentGames",
        user_id: 1
    },
    success: function(response) {
        console.log(response);
    }
});