<!DOCTYPE html>
<html lang="en">
<script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></script>
<style>
#popup-bg{
    position: fixed; top: 0; left: 0;
    background-color: rgba(0, 0, 0, 0.7);
    width: 100%;
    height: 100%;
    display: none; 
}
#popup-main{
    position: fixed; top: 5%; left: 15%;
    width: 70%;
    height: 90%;
    border: 2px solid #0E1766;
    border-radius: 8px;
    background: linear-gradient(to top, #D8D8D8, #F9F8F8);
}
#popup-title-bar{
    position: relative;
    width: 100%;
    height: 60px;
    background-color: #0E1766;
}
#popup-footer-bar{
    position: relative;
    width: 100%;
    height: 60px;
    background-color: #0E1766;
}
#close-popus{
    position: relative; top:-55%; right: -91%;
    width: 6%;
    height: 30px;
    padding: 0 2.2%;
    border-radius: 25px;
    border: 2px solid white;
    background-color: #FFF;
    text-align: center;
    cursor: pointer;
}
#close-popus p{
    color: #0E1766;
}
#titulo-popup{
    text-align:center;
    color: white;
    font-size: 28px;
    line-height: 50px;
}

#bot-button{
        position:fixed; bottom:20px; left:50px;
        background: linear-gradient(to top, #232697, #0582AD );
        width: 50px;
        height: 50px;
        line-height: 55px;
        font-size: 22px;
        text-align: center;
        color: #fff;
        border-radius: 50%;
        cursor: pointer;
        z-index:5;
    }
#chat-box{
    position: relative; top:5%; left: 10%;
    width: 80%;
    height: 70%;
    border-radius: 8px;
    border: 1px solid #0E1766;
    background-color: #FFF;
    overflow-x: hidden;
    overflow-y: scroll;
}
#chats{
    display: flex;
    flex-flow: row wrap;
    align-items: flex-start;
    margin-top: 10px;
    
}
#chatbot{
    background:linear-gradient(to top, #CFCFCF, #A5A5A5 );
    width: 70%; 
    padding: 15px;
    margin: 10px 10px 0;
    border-radius: 10px;
    color: #0E1766;
    font-size: 18px;
    transition-duration: 2s;
    transition-property: width;
    transition-timing-function: ease-out;
}

#user{
    background:linear-gradient(to top, #164D97, #0E1766 );
    width: 70%; 
    padding: 15px;
    margin: 10px 10px 0;
    border-radius: 10px;
    color: #fff;
    font-size: 18px;
    transition-duration: 2s;
    transition-property: width;
    transition-timing-function: ease-in;
}
#bot-photo{ 
    width: 60px;
    height: 60px;
    background: #92D3F5;
    border-radius: 50%;
    margin: 1% 2%;
}
#user-photo{
    display: flex;
    width: 60px;
    height: 60px;
    background: #92D3F5;
    border-radius: 50%;
    margin: 1% 2%;
}

/*.user .chats .chat-photo{
    width: 60px;
    height: 60px;
    background: #92D3F5;
    border-radius: 50%;
    margin: 1% 2%;
}*/

#chat-textarea{
    width: 80%;
    position: relative; top:8%; left: 10%;
}
#chat-mgs-icon{
    margin: 1% 0; 
}
</style>
<body>
    <button id="bot-button" onclick="openChatBotBox();">
    <i class="fas fa-archive"></i>
    </button>
    <div id="popup-bg">
        <div id="popup-main">
            <div id="popup-title-bar">
                <div id="titulo-popup">CorpoH9 ChatBot</div>
                <div id="close-popus" onclick="closeChatBotBox();" title="Cerra ventana de Chatbot">
                    <strong>
                        <p >X</p>
                    </strong>
                </div>
            </div>
            <div id="chat-box">
                <div id="chats">
                    <!--<div class="chat-photo user" id="user-photo"></div>
                        <p class="chat-msg" id="user"></p>-->
                </div>
            </div>
            <div id="chat-textarea">
                <input type="text" class="form-control" id="wright" placeholder="Escriba aquí..."></input>
                <!--<input id="chat-mgs-icon" class="btn btn-primary" type="submit" value="Mensaje">-->
            </div>
        </div>   
    </div>


</body>

<script type="text/javascript"> 

var popoupDiv = document.getElementById("popup-bg");

function openChatBotBox(){
    popoupDiv.style.display = "block";
};

function closeChatBotBox(){
    popoupDiv.style.display = "none";
};

// Chatbot

var trigger = [
	["hi","hey","hello"], 
	["how are you", "how is life", "how are things"],
	["what are you doing", "what is going on"],
	["how old are you"],
	["who are you", "are you human", "are you bot", "are you human or bot"],
	["who created you", "who made you", "who designed you"],
	["your name please",  "your name", "may i know your name", "what is your name"],
	["i love you"],
	["happy", "good"],
	["bad", "bored", "tired"],
	["help me", "tell me story", "tell me joke"],
	["ah", "yes", "ok", "okay", "nice", "thanks", "thank you"],
	["bye", "good bye", "goodbye", "see you later"]
];
var reply = [
	["Hi","Hey","Hello"], 
	["Fine", "Pretty well", "Fantastic"],
	["Nothing much", "About to go to sleep", "Can you guest?", "I don't know actually"],
	["I am 1 day old"],
	["I am just a bot", "I am a bot. What are you?"],
	["Leon Zlotnik", "Corpoh9"],
	["I am nameless", "I don't have a name"],
	["I love you too", "Me too"],
	["Have you ever felt bad?", "Glad to hear it"],
	["Why?", "Why? You shouldn't!", "Try watching TV"],
	["I will", "What about?"],
	["Tell me a story", "Tell me a joke", "Tell me about yourself", "You are welcome"],
	["Bye", "Goodbye", "See you later"]
];
var alternative = ["Haha...", "Eh..."];

document.querySelector("input").addEventListener("keypress",function(e){
    var key = e.which || e.keyCode;
    if(key === 13){// buton Enter
        var input = document.getElementById("wright").value;
        
        //Escribir input del usuario 
            document.body.onload 
            // crea un nuevo div 
            // y añade contenido 
            var newDiv = document.createElement("p");
            newDiv.setAttribute('id','user');
            var newContent = document.createTextNode('Usuario:  '+input); 
            newDiv.appendChild(newContent); //añade texto al div creado. 

            // añade el elemento creado y su contenido al DOM 
            var currentDiv = document.getElementById("chats"); 
            currentDiv.parentNode.insertBefore(newDiv, currentDiv);
      
        output(input);
    }
});

function output(input){
    try{
        var product = input + "=" + eval(input);
    }catch(e){
        var text = (input.toLowerCase()).replace(/[^\w\s\d]/gi, ""); //remove all chars except words, space and
		text = text.replace(/ a /g, " ").replace(/i feel /g, "").replace(/whats/g, "what is").replace(/please /g, "").replace(/ please/g, "");
        if(compare(trigger,reply,text)){
            var product = compare(trigger,reply,text);

        }else{
            var product = alternative[Math.floor(Math.random()*alternative.length)];
        }
    }

    //Escribir input del usuario 
        document.body.onload 
            // crea un nuevo div 
            // y añade contenido 
            var newBotDiv = document.createElement("p");
            newBotDiv.setAttribute('id','chatbot');
            var newBotContent = document.createTextNode('CorpoHBot:  "'+product+'"'); 
            newBotDiv.appendChild(newBotContent); //añade texto al div creado. 

            setTimeout(function(){
                var currentBotDiv = document.getElementById("chats"); 
                currentBotDiv.parentNode.insertBefore(newBotDiv, currentBotDiv); 
            }, 3000)
            // añade el elemento creado y su contenido al DOM 
            

        document.getElementById("input").value = ""; //clear input value
};

function compare(arr, array, string){
	var item;
	for(var x=0; x<arr.length; x++){
		for(var y=0; y<array.length; y++){
			if(arr[x][y] == string){
				items = array[x];
				item =  items[Math.floor(Math.random()*items.length)];
			}
		}
	}
	return item;
}
</script>
</html>

