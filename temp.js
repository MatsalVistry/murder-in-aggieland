console.log('temp.js');

$.ajax({
    type: "GET",
    headers: {  'Access-Control-Allow-Origin': '*' },
    url: "https://murder-in-aggieland.herokuapp.com/API/users.php",
    data: {
        functionName: "getCurrentGames",
        username: "vatsal",
        password: "123",
        email: "vm@gmail.com"
    },
    success: function(response) {
        console.log(response);
    }
});