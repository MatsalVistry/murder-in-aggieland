console.log('temp.js');

$.ajax({
    type: "POST",
    headers: {  'Access-Control-Allow-Origin': '*' },
    url: "https://murder-in-aggieland.herokuapp.com/index.php",
    data: {
        functionName: "print",
    },
    success: function(response) {
        console.log(response);
    }
});