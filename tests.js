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
          username: 'hello',
          email: '1',
          password: '1'
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
            username: "hello",
            password: "1",
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
            game_id: 2
        })
    })
    .then(response => response.json())
    .then(data => {console.log(data);})
    .catch(error => {console.error('Error:', error);});
}

function unenrollUserFromGame()
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
            functionName: "unenrollUserFromGame",
            user_id: 1,
            game_id: 2
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
            latitude: 300,
            longitude: 300,
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
            latitude: 300,
            longitude: 300,
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

function getStartDestination()
{
    const params = new URLSearchParams(
    {
        functionName: "getStartDestination",
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

function getCurrentCharacterDialogue()
{
    const params = new URLSearchParams(
    {
        functionName: "getCurrentCharacterDialogue",
        game_id: 1,
        user_id: 1
    });
        
    fetch(`https://murder-in-aggieland.herokuapp.com/API/character.php?${params}`, 
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

function getAllPastCharactersDialogue()
{
    const params = new URLSearchParams(
    {
        functionName: "getAllPastCharactersDialogue",
        game_id: 1,
        user_id: 1
    });
        
    fetch(`https://murder-in-aggieland.herokuapp.com/API/character.php?${params}`, 
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

function getCharacterDisplayData()
{
    const params = new URLSearchParams(
    {
        functionName: "getCharacterDisplayData",
        game_id: 1
    });
        
    fetch(`https://murder-in-aggieland.herokuapp.com/API/character.php?${params}`, 
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

function placeGuess()
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
            functionName: "placeGuess",
            user_id: 1,
            game_id: 1,
            character_guess_id: 2
        })
    })
    .then(response => response.json())
    .then(data => {console.log(data);})
    .catch(error => {console.error('Error:', error);});
}

function getCurrentGamePriority()
{
    const params = new URLSearchParams(
    {
        functionName: "getCurrentGamePriority",
        game_id: 1,
        user_id: 2
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

// getCurrentGamePriority();

// addUser();
// verifyCredentials();
// getCurrentGames();
// getNotStartedGames();
// getFinishedGames();

// enrollUserInGame();
// unenrollUserFromGame();
// getInitialGameText();
// checkHasGameStarted();
// checkUserReachedStartLocation();
// updateUserGamePriority();
// checkUserReachedLocation();
// updateUserGamePriority();
// getCurrentDestination();
// getStartDestination();

// getCurrentCharacterDialogue();
// getAllPastCharactersDialogue();
getCharacterDisplayData();

// placeGuess();

