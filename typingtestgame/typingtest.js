let text = "the quick brown fox jumps over the lazy dog";
let currentindex = 0;
let pOffset = 0;

let typingtext = document.createElement("p");
typingtext.innerHTML = text;

document.getElementById("typingtext").appendChild(typingtext);


document.onkeydown = function (e) {
    e = e || window.event;

    if (e.shiftKey || e.ctrlKey) return;
    
    

    let closingP = "</span>";

    //Find where we are in the inner html taking into account spans we have added
    let indexWithOffset = pOffset + currentindex;

    //Find left of the string with regard to our offset index
    let leftSpan = text.substring(0,indexWithOffset);
    //Find character we are currently on
    let letter = text[indexWithOffset];
    //Find right of the string with regard to our offset index
    let rightSpan = text.substring(indexWithOffset + 1, text.length);

    if (letter === e.key) {
        //The beginning of the green span of text
        let firstP = "<span style='color:green'>";
        
        //Construct innerHtml by, [LEFT OF STRING] + <span style='color:green'> + [LETTER] + </span> + [RIGHT OF STRING]
        text = leftSpan + firstP + letter + closingP + rightSpan;

        //Apply changes to html
        typingtext.innerHTML = text;

        //Add our offset by adding both lengths of our span tags
        pOffset += firstP.length + closingP.length;
        currentindex++;

    } else {
        //The beginning of the red span of text
        let firstP = "<span style='color:red'>";

        //Construct innerHtml by, [LEFT OF STRING] + <span style='color:red'> + [LETTER] + </span> + [RIGHT OF STRING]
        text = leftSpan + firstP + letter + closingP + rightSpan;

        //Apply changes to html
        typingtext.innerHTML = text;

        //Add our offset by adding both lengths of our span tags
        pOffset += firstP.length + closingP.length;
        currentindex++;
    }
};
