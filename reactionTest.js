
let running = false;
let initialTime = 0;
let time = initialTime
let interval;
let light_interval;
let lightsGreen = false;
let lights = ["lab1", "lab2", "lab3", "lab4", "lab5"];
let li_index = 0
let first = true;

// while (running){
// 	console.log("started")
// 	// slightPause()
// 	// currentTime = currentTime + 1;
// 	document.getElementById("timer").innerHTML = 0.01
// 	console.log("finished")
// }

function startGame(){
    // for (let i=0; i<lights.length; i++){
    //     console.log(i)
    //     lightTimer(lights[i]);
    // }
    resetGame();
    console.log(li_index)
    lightTimer(lights[li_index]);
}

function lightTimer(current_id){
    if (lightsGreen == false){
        console.log("Here");
        light_interval = setInterval(changeLight, Math.floor(Math.random() * 1000))
    }
}

function changeLight(){
    let current_id=lights[li_index];
    console.log("Starting here");
    if (first){
        console.log("We good")
        first = false;
        
    }
    else{
        document.getElementById(current_id).style.cssText = "background-color: green";
        li_index += 1;
        console.log(li_index)
        if (current_id == lights[lights.length-1]){
            lightsGreen = true;
            li_index = 0;
            clearInterval(light_interval);
            interBegin();
        }
        clearInterval(light_interval);
        lightTimer(lights[li_index])
        first=true;
    }
}

function stopGame(){
    if (lightsGreen==true){
        stopTimer();
    }
    else{
        document.getElementById("clickButton").style.cssText = "background-color: red";
        clearInterval(light_interval);
    }
}

function interBegin(){
	if (running == false){
		interval = setInterval(startTimer, 10)
	}
}

function resetGame(){
    document.getElementById("clickButton").style.cssText = "background-color: blanchedalmond";
    for (let i = 0; i < lights.length; i++){
        document.getElementById(lights[i]).style.cssText = "background-color: red";
    }
    lightsGreen = false;
    time = 0;
    resetTimer();

}

function startTimer(){
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
	console.log("stop clicked")
	clearInterval(interval)
	running = false
}

function resetTimer(){
	console.log("Reset clicked")
	clearInterval(interval)
	time = 0
	document.getElementById("timer").innerHTML = "00.00"
	running = false
    li_index = 0
}


