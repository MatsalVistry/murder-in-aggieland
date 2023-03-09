console.log('temp.js');

$.ajax({
    type: "GET",
    url: "https://murder-in-aggieland.herokuapp.com/index.php",
    data: {
        functionName: "print",
    },
    success: function(response) {
        console.log(response);
    }
});