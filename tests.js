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
    fetch('https://murder-in-aggieland.herokuapp.com/API/game.php', 
    {
        method: 'POST',
        headers: 
        {
          'Content-Type': 'application/json',
          'Access-Control-Allow-Origin': '*'
        },
        body: JSON.stringify(
        {
            functionName: "enrollUserInGame",
            user_id: 1,
            game_id: 3
        })
    })
    .then(response => response.json())
    .then(data => {console.log(data);})
    .catch(error => {console.error('Error:', error);});
}

function getInitialGameText()
{
    const params = new URLSearchParams(
    {
        functionName: "getInitialGameText",
        game_id: 1
    });
        
    fetch(`https://murder-in-aggieland.herokuapp.com/API/game.php?${params}`, 
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

function checkUserReachedLocation()
{
    fetch('https://murder-in-aggieland.herokuapp.com/API/game.php', 
    {
        method: 'POST',
        headers: 
        {
          'Content-Type': 'application/json',
          'Access-Control-Allow-Origin': '*'
        },
        body: JSON.stringify(
        {
            functionName: "checkUserReachedLocation",
            x_cord: 300,
            y_cord: 300,
            z_cord: 300,
            game_id: 1,
            user_id: 1
        })
    })
    .then(response => response.json())
    .then(data => {console.log(data);})
    .catch(error => {console.error('Error:', error);});
}

function checkUserReachedStartLocation()
{
    fetch('https://murder-in-aggieland.herokuapp.com/API/game.php', 
    {
        method: 'POST',
        headers: 
        {
          'Content-Type': 'application/json',
          'Access-Control-Allow-Origin': '*'
        },
        body: JSON.stringify(
        {
            functionName: "checkUserReachedStartLocation",
            x_cord: 300,
            y_cord: 300,
            z_cord: 300,
            game_id: 1,
            user_id: 1
        })
    })
    .then(response => response.json())
    .then(data => {console.log(data);})
    .catch(error => {console.error('Error:', error);});
}

function checkHasGameStarted()
{
    fetch('https://murder-in-aggieland.herokuapp.com/API/game.php', 
    {
        method: 'POST',
        headers: 
        {
          'Content-Type': 'application/json',
          'Access-Control-Allow-Origin': '*'
        },
        body: JSON.stringify(
        {
            functionName: "checkHasGameStarted",
            game_id: 1,
            user_id: 1
        })
    })
    .then(response => response.json())
    .then(data => {console.log(data);})
    .catch(error => {console.error('Error:', error);});
}

function updateUserGamePriority()
{
    fetch('https://murder-in-aggieland.herokuapp.com/API/game.php', 
    {
        method: 'POST',
        headers: 
        {
          'Content-Type': 'application/json',
          'Access-Control-Allow-Origin': '*'
        },
        body: JSON.stringify(
        {
            functionName: "updateUserGamePriority",
            game_id: 1,
            user_id: 1
        })
    })
    .then(response => response.json())
    .then(data => {console.log(data);})
    .catch(error => {console.error('Error:', error);});
}

function getCurrentDestination()
{
    const params = new URLSearchParams(
    {
        functionName: "getCurrentDestination",
        game_id: 1,
        user_id: 1
    });
        
    fetch(`https://murder-in-aggieland.herokuapp.com/API/game.php?${params}`, 
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