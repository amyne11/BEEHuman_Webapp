const paragraphs = [

    "The quick brown fox jumps over the lazy dog.",
    "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
    "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?",
    "But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resulx tant pleasure?"
];

//Get the necessary HTML elements
const typingText = document.querySelector(".typingText p")
const inputText = document.querySelector(".wrapper .inputText")
const againBtn = document.querySelector(".content button")
const timeTag = document.querySelector(".time span b")
const mistakeTag = document.querySelector(".mistakes span")
const wpmTag = document.querySelector(".wpm span")
const wpmResult = document.querySelector(".wpmResult span")
const mistakesResult = document.querySelector(".mistakesResult span")
const accuracyResult = document.querySelector(".accuracyResult span")

//Initialises some variables
let timer;
let maxTime = 60;
let timeRem = maxTime;
let currentindex = 0;
let numOfMistakes = 0;
let isTyping = 0;
let finalWPM = 0;
let finalMistakes = 0;
let finalAccuracy = 0;

//Load a random paragraph for the user to type
function loadParagraph() {
    const randPara = Math.floor(Math.random() * paragraphs.length);
    typingText.innerHTML = "";
    //Split the paragraph into individual characters and add each character to the HTML as a <span>
    paragraphs[randPara].split("").forEach(char => {
        let span = `<span>${char}</span>`
        typingText.innerHTML += span;
    });
    //Highlight the first character in the paragraph
    typingText.querySelectorAll("span")[0].classList.add("active");
    //Set focus to the input field when the user clicks anywhere in the paragraph
    document.addEventListener("keydown", () => inputText.focus());
    typingText.addEventListener("click", () => inputText.focus());
}

//Check if the user's typing matches the expected text
function Typing() {
    let characters = typingText.querySelectorAll("span");
    let typedChar = inputText.value.split("")[currentindex];
    //If there are still characters to type and time has not run out
    if (currentindex < characters.length && timeRem > 0) {
        //If the user just started typing, start the timer
        if (!isTyping) {
            timer = setInterval(initialiseTimer, 1000);
            isTyping = true;
        }
        //If the user backspaces, delete the previous character
        if (typedChar == null) {
            if (currentindex > 0) {
                currentindex--;
                //If the previous character was incorrect, decrement the mistake count
                if (characters[currentindex].classList.contains("incorrect")) {
                    numOfMistakes--;
                }
                //Remove the "correct" and "incorrect" classes from the previous character
                characters[currentindex].classList.remove("correct", "incorrect");
            }
        //If the user types a character, check if it is correct
        } else {
            if (characters[currentindex].innerText == typedChar) {
                characters[currentindex].classList.add("correct");
            } else {
                //If the user typed the wrong character, increment the mistake count
                numOfMistakes++;
                characters[currentindex].classList.add("incorrect");
            }
            currentindex++;
        }
        //Remove the "active" class from all characters and add it to the current character
        characters.forEach(span => span.classList.remove("active"));
        characters[currentindex].classList.add("active");

        //Update the WPM and mistake count displayed to the user
        wpmTag.innerText = calcWPM();
        mistakeTag.innerText = numOfMistakes;
    //If the user has typed all the characters or time has run out
    } 
}

//Calculates and returns the user's words per minute (WPM) score
function calcWPM() {
    let wpm = Math.round(((currentindex - numOfMistakes) / 5) / (maxTime - timeRem) * 60);
    
    //Checks if the WPM score is invalid and sets it to zero if it is
    if (wpm < 0 || !wpm || wpm === Infinity) {
        wpm = 0;
    } else {
        wpm = wpm;
    }
    
    return wpm;
}

//Initializes and updates the timer and WPM score display
function initialiseTimer() {
    //Decrements the time remaining and updates the time display
    let characters = typingText.querySelectorAll("span");
    if (currentindex != characters.length && timeRem > 0) {
        timeRem--;
        timeTag.innerText = timeRem;
        
        //Calculates and updates the WPM score display
        wpmTag.innerText = calcWPM();
    } else {
        //Calculate the final WPM, mistakes, and accuracy
        finalWPM = calcWPM();
        finalMistakes = numOfMistakes;
        finalAccuracy = Math.round((currentindex - numOfMistakes) / currentindex * 100);
        //Display the final WPM, mistakes, and accuracy to the user
        wpmResult.innerText = finalWPM;
        mistakesResult.innerText = finalMistakes;
        accuracyResult.innerText = finalAccuracy + "%";
        //Stop the timer and clear the input field
        clearInterval(timer);
        inputText.value = "";

    }
}

//Resets the game and all relevant variables and displays
function resetGame() {
    //Loads a new paragraph, clears the timer, and resets all variables
    loadParagraph();
    clearInterval(timer);
    timeRem = maxTime;
    currentindex = numOfMistakes = isTyping = 0;
    
    //Resets the input text and all score displays
    inputText.value = "";
    timeTag.innerText = timeRem;
    wpmTag.innerText = 0;
    mistakeTag.innerText = 0;
}

//Loads the initial paragraph and sets up event listeners for typing and reset
loadParagraph();
inputText.addEventListener("input", Typing);
againBtn.addEventListener("click", resetGame);
