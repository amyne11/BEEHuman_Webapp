let text = "the quick brown fox jumps over the lazy dog";
let currentindex = 0;
let pOffset = 0;
let lastLetter = "";
let lastKeyCorrect = false;

let typingtext = document.createElement("p");
typingtext.innerHTML = text;

document.getElementById("typingtext").appendChild(typingtext);

document.onkeydown = function (e) {
    e = e || window.event;

    if (e.shiftKey || e.ctrlKey) return;

    let closingP = "</span>";

    // Find where we are in the inner html taking into account spans we have added
    let indexWithOffset = pOffset + currentindex;

    // Find left of the string with regard to our offset index
    let leftSpan = text.substring(0, indexWithOffset);

    // Find character we are currently on
    let letter = text[indexWithOffset];

    // Find right of the string with regard to our offset index
    let rightSpan = text.substring(indexWithOffset + 1, text.length);

    if (letter === e.key) {
        lastKeyCorrect = true;
        lastLetter = e.key;

        // The beginning of the green span of text
        let firstP = "<span style='color:green'>";

        // Construct innerHtml by, [LEFT OF STRING] + <span style='color:green'> + [LETTER] + </span> + [RIGHT OF STRING]
        text = leftSpan + firstP + letter + closingP + rightSpan;

        // Apply changes to html
        typingtext.innerHTML = text;

        // Add our offset by adding both lengths of our span tags
        pOffset += firstP.length + closingP.length;
        currentindex++;

    } else if (e.key === "Backspace") {

        if (currentindex > 0) {

            // If the last key was correct, we need to remove the green span tags
            if (lastKeyCorrect) {
                firstP = "<span style='color:green'>";
            } else {
                firstP = "<span style='color:red'>";
            }

            // Make leftSpan = everything before the span tag
            leftSpan = text.substring(0, indexWithOffset - (firstP.length - 1) - 9);

            // Make rightSpan = everything after the span tag
            rightSpan = text.substring(indexWithOffset, text.length);

            // Update the text
            text = leftSpan + lastLetter + rightSpan;

            // Update indexWithOffset
            indexWithOffset -= firstP.length + closingP.length;
            currentindex--;

            // Apply changes to html
            typingtext.innerHTML = text;
        }

    } else {
        lastKeyCorrect = false;
        lastLetter = text[indexWithOffset];

        // The beginning of the red span of text
        let firstP = "<span style='color:red'>";

        // Construct innerHtml by, [LEFT OF STRING] + <span style='color:red'> + [LETTER] + </span> + [RIGHT OF STRING]
        text = leftSpan + firstP + letter + closingP + rightSpan;

        // Apply changes to html
        typingtext.innerHTML = text;

        // Add our offset by adding both lengths of our span tags
        pOffset += firstP.length + closingP.length;
        currentindex++;
    }

    // Alert for testing purposes
    // alert(`current index: ${currentindex}, offset: ${pOffset}, index with offset: ${indexWithOffset}`);
};
