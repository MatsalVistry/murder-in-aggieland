console.log('temp.js');

function addUser()
{
    $.ajax({
        type: "POST",
        headers: {  'Access-Control-Allow-Origin': '*' },
        url: "https://murder-in-aggieland.herokuapp.com/API/users.php",
        data: {
            functionName: "addUser",
            username: "test",
            email: "test@gmail.com",
            password: "test",
        },
        success: function(response) {
            console.log("Add User:");
            console.log(response);
        }
    });
}

function verifyCredentials()
{
    $.ajax({
        type: "POST",
        headers: {  'Access-Control-Allow-Origin': '*' },
        url: "https://murder-in-aggieland.herokuapp.com/API/users.php",
        data: {
            functionName: "verifyCredentials",
            username: "test",
            password: "test",
        },
        success: function(response) {
            console.log("Verify Credentials:");
            console.log(response);
        }
    });
}

function getCurrentGames()
{
    $.ajax({
        type: "GET",
        headers: {  'Access-Control-Allow-Origin': '*' },
        url: "https://murder-in-aggieland.herokuapp.com/API/users.php",
        data: {
            functionName: "getCurrentGames",
            user_id: 1
        },
        success: function(response) {
            console.log("Get Current Games:");
            console.log(response);
        }
    });
}

function getNotStartedGames()
{
    $.ajax({
        type: "GET",
        headers: {  'Access-Control-Allow-Origin': '*' },
        url: "https://murder-in-aggieland.herokuapp.com/API/users.php",
        data: {
            functionName: "getNotStartedGames",
            user_id: 1
        },
        success: function(response) {
            console.log("Get Not Started Games:");
            console.log(response);
        }
    });
}

// addUser();
verifyCredentials();
// getCurrentGames();
// getNotStartedGames();
