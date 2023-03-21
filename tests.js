console.log('tests.js');

function addUser()
{
    fetch('https://murder-in-aggieland.herokuapp.com/API/users.php', 
    {
        method: 'POST',
        headers: 
        {
          'Content-Type': 'application/json',
          'Access-Control-Allow-Origin': '*'
        },
        body: JSON.stringify(
        {
          functionName: 'addUser',
          username: 'tes4t',
          email: 'test@gmail.com',
          password: 'test'
        })
    })
    .then(response => response.json())
    .then(data => {console.log(data);})
    .catch(error => {console.error('Error:', error);});
}

function verifyCredentials()
{
    fetch('https://murder-in-aggieland.herokuapp.com/API/users.php', 
    {
        method: 'POST',
        headers: 
        {
          'Content-Type': 'application/json',
          'Access-Control-Allow-Origin': '*'
        },
        body: JSON.stringify(
        {
            functionName: "verifyCredentials",
            username: "test",
            password: "test",
        })
    })
    .then(response => response.json())
    .then(data => {console.log(data);})
    .catch(error => {console.error('Error:', error);});}

function getCurrentGames()
{
    const params = new URLSearchParams(
    {
        functionName: 'getCurrentGames',
        user_id: 1
    });
      
    fetch(`https://murder-in-aggieland.herokuapp.com/API/users.php?${params}`, 
    {
        method: 'GET',
        headers: 
        {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': '*'
        }
    })
    .then(response => response.json())
    .then(data => {console.log(data);})
    .catch(error => {console.error('Error:', error);});
}

function getNotStartedGames()
{
    const params = new URLSearchParams(
    {
        functionName: "getNotStartedGames",
        user_id: 1
    });
        
    fetch(`https://murder-in-aggieland.herokuapp.com/API/users.php?${params}`, 
    {
        method: 'GET',
        headers: 
        {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': '*'
        }
    })
    .then(response => response.json())
    .then(data => {console.log(data);})
    .catch(error => {console.error('Error:', error);});
}

function getFinishedGames()
{
    const params = new URLSearchParams(
    {
        functionName: "getFinishedGames",
        user_id: 1
    });
        
    fetch(`https://murder-in-aggieland.herokuapp.com/API/users.php?${params}`, 
    {
        method: 'GET',
        headers: 
        {
            'Content-Type': 'application/json',
            'Access-Control-Allow-Origin': '*'
        }
    })
    .then(response => response.json())
    .then(data => {console.log(data);})
    .catch(error => {console.error('Error:', error);});
}

function enrollUserInGame()
{
    $.ajax({
        type: "POST",
        headers: {  'Access-Control-Allow-Origin': '*' },
        url: "https://murder-in-aggieland.herokuapp.com/API/game.php",
        data: {
            functionName: "enrollUserInGame",
            user_id: 1,
            game_id: 3
        },
        success: function(response) {
            console.log("Enroll User In Game:");
            console.log(response);
        }
    });
}

function getInitialGameText()
{
    $.ajax({
        type: "GET",
        headers: {  'Access-Control-Allow-Origin': '*' },
        url: "https://murder-in-aggieland.herokuapp.com/API/game.php",
        data: {
            functionName: "getInitialGameText",
            game_id: 1
        },
        success: function(response) {
            console.log("Get Initial Game Text:");
            console.log(response);
        }
    });
}

function checkUserReachedLocation()
{
    $.ajax({
        type: "POST",
        headers: {  'Access-Control-Allow-Origin': '*' },
        url: "https://murder-in-aggieland.herokuapp.com/API/game.php",
        data: {
            functionName: "checkUserReachedLocation",
            x_cord: 100,
            y_cord: 100,
            z_cord: 100,
            game_id: 1,
            user_id: 1
        },
        success: function(response) {
            console.log("Check User Reached Location:");
            console.log(response);
        }
    });
}

function checkUserReachedStartLocation()
{
    $.ajax({
        type: "POST",
        headers: {  'Access-Control-Allow-Origin': '*' },
        url: "https://murder-in-aggieland.herokuapp.com/API/game.php",
        data: {
            functionName: "checkUserReachedStartLocation",
            x_cord: 0,
            y_cord: 0,
            z_cord: 0,
            game_id: 1,
            user_id: 1
        },
        success: function(response) {
            console.log("Check User Reached Start Location:");
            console.log(response);
        }
    });
}

function checkHasGameStarted()
{
    $.ajax({
        type: "POST",
        headers: {  'Access-Control-Allow-Origin': '*' },
        url: "https://murder-in-aggieland.herokuapp.com/API/game.php",
        data: {
            functionName: "checkHasGameStarted",
            game_id: 1,
            user_id: 1
        },
        success: function(response) {
            console.log("Check Has Game Started:");
            console.log(response);
        }
    });
}

function updateUserGamePriority()
{
    $.ajax({
        type: "POST",
        headers: {  'Access-Control-Allow-Origin': '*' },
        url: "https://murder-in-aggieland.herokuapp.com/API/game.php",
        data: {
            functionName: "updateUserGamePriority",
            game_id: 1,
            user_id: 1
        },
        success: function(response) {
            console.log("Update User Game Priority:");
            console.log(response);
        }
    });
}

function getCurrentDestination()
{
    $.ajax({
        type: "GET",
        headers: {  'Access-Control-Allow-Origin': '*' },
        url: "https://murder-in-aggieland.herokuapp.com/API/game.php",
        data: {
            functionName: "getCurrentDestination",
            game_id: 1,
            user_id: 1
        },
        success: function(response) {
            console.log("Get Current Destination:");
            console.log(response);
        }
    });
}

function getCurrentCharacterDialogue()
{
    $.ajax({
        type: "GET",
        headers: {  'Access-Control-Allow-Origin': '*' },
        url: "https://murder-in-aggieland.herokuapp.com/API/character.php",
        data: {
            functionName: "getCurrentCharacterDialogue",
            game_id: 1,
            user_id: 1
        },
        success: function(response) {
            console.log("Get Current Character Dialogue:");
            console.log(response);
        }
    });
}

function getAllPastCharactersDialogue()
{
    $.ajax({
        type: "GET",
        headers: {  'Access-Control-Allow-Origin': '*' },
        url: "https://murder-in-aggieland.herokuapp.com/API/character.php",
        data: {
            functionName: "getAllPastCharactersDialogue",
            game_id: 1,
            user_id: 1
        },
        success: function(response) {
            console.log("Get All Past Characters Dialogue:");
            console.log(response);
        }
    });
}

function getCharacterDisplayData()
{
    $.ajax({
        type: "GET",
        headers: {  'Access-Control-Allow-Origin': '*' },
        url: "https://murder-in-aggieland.herokuapp.com/API/character.php",
        data: {
            functionName: "getCharacterDisplayData",
            game_id: 1
        },
        success: function(response) {
            console.log("Get Character Display Data:");
            console.log(response);
        }
    });
}

function placeGuess()
{
    $.ajax({
        type: "POST",
        headers: {  'Access-Control-Allow-Origin': '*' },
        url: "https://murder-in-aggieland.herokuapp.com/API/game.php",
        data: {
            functionName: "placeGuess",
            user_id: 1,
            game_id: 1,
            character_guess_id: 1
        },
        success: function(response) {
            console.log("Place Guess:");
            console.log(response);
        }
    });
}


// addUser();
// verifyCredentials();
// getCurrentGames();
// getNotStartedGames();
// getFinishedGames();

// enrollUserInGame();
// getInitialGameText();
// checkHasGameStarted();
// checkUserReachedStartLocation();
// updateUserGamePriority();
// checkUserReachedLocation();
// updateUserGamePriority();
// getCurrentDestination();

// getCurrentCharacterDialogue();
// getAllPastCharactersDialogue();
// getCharacterDisplayData();

// placeGuess();