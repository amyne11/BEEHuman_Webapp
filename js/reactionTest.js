
let running = false;
let initialTime = 0;
let time = initialTime
let interval;
let light_interval;
let lightsGreen = false;
let lights = ["lab1", "lab2", "lab3", "lab4", "lab5"];
let li_index = 0
let first = true;
let changing = false;

function startGame(){
    // When start button is clicked, game is set to its original state
    // lightTimer is then called so the lights start going green
    resetGame();
    console.log(li_index)
    lightTimer(lights[li_index]);
}

function lightTimer(current_id){
    // This causes the delay between the lights changing.
    // Each light changes after a random amount of time under 10s
    if (lightsGreen == false){
        console.log("Here");
        changing = true
        light_interval = setInterval(changeLight, Math.floor(Math.random() * 1000))
    }
}

function changeLight(){
    // This waits the first time the function is called but changes a light the second time.
    // This is done to allow for the interval betwen lights changing to take place
    let current_id=lights[li_index];
    console.log("Starting here");
    if (first){
        console.log("We good")
        first = false;
        
    }
    else{
        document.getElementById(current_id).style.cssText = "background-color: green; box-shadow: 0px 0px 30px 15px green";
        li_index += 1;
        console.log(li_index)
        if (current_id == lights[lights.length-1]){
            lightsGreen = true;
            li_index = 0;
            clearInterval(light_interval);
            changing = false
            // After the last light changes, the timer for the reaction starts
            interBegin();
        }
        clearInterval(light_interval);
        lightTimer(lights[li_index])
        first=true;
    }
}

function stopGame(){
    // When reaction button is clicked, timer stops if all lights have gone green
    if (lightsGreen==true){
        stopTimer();
    }
    // If the lights haven't all changed, then the button goes red to show they went too early
    else{
        document.getElementById("clickButton").style.cssText = "background-color: red; box-shadow: 0px 0px 20px 10px red";
        clearInterval(light_interval);
    }
}

function interBegin(){
    // This increases the timer by 10 milliseconds every 10 milliseconds
	if (running == false){
		interval = setInterval(startTimer, 10)
	}
}

function resetGame(){
    // This changes the background colour back to the original and calls resetTimer
    document.getElementById("clickButton").style.cssText = "background-color: transparent";
    for (let i = 0; i < lights.length; i++){
        document.getElementById(lights[i]).style.cssText = "background-color: red; box-shadow: 0px 0px 20px 10px red";
    }
    if (changing == true){
        clearInterval(light_interval)
    }
    lightsGreen = false;
    time = 0;
    resetTimer();

}

function startTimer(){
    // This controls the timer and how it is displayed on the screen
	running = true;
	console.log("working...")
	console.log(time)
	time = time + 0.01
	time = Math.round(time * 100) / 100
	if (time < 10 && time%1 == 0){
		document.getElementById("timer").innerHTML = "0"+time+".00"
	}
	else if (time < 10 && (time*10)%1 == 0){
		document.getElementById("timer").innerHTML = "0"+time+"0"
	}
	else if(time < 10 && (time*10)%1 != 0){
		document.getElementById("timer").innerHTML = "0"+time
	}
	else if(time >= 10 && time%1 == 0){
		document.getElementById("timer").innerHTML = time+".00"
	}
	else if (time >= 10 && (time*10)%1 == 0){
		document.getElementById("timer").innerHTML = time+"0"
	}
	else{
		document.getElementById("timer").innerHTML = time
	}
}


function stopTimer(){
    // This stops the timer from running
	console.log("stop clicked")
	clearInterval(interval)
	running = false
}

function resetTimer(){
    // This sets the timer being shown back to 00.00 and stops it if it is still going
	console.log("Reset clicked")
	clearInterval(interval)
	time = 0
	document.getElementById("timer").innerHTML = "00.00"
	running = false
    li_index = 0
}


