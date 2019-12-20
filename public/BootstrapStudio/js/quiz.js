// select all elements
const start = document.getElementById("start");
const quiz = document.getElementById("quiz");
const question = document.getElementById("question");
const qImg = document.getElementById("qImg");
const choiceA = document.getElementById("A");
const choiceB = document.getElementById("B");
const choiceC = document.getElementById("C");
const choiceD = document.getElementById("D");
const counter = document.getElementById("counter");
const timeGauge = document.getElementById("timeGauge");
const progress = document.getElementById("progress");
const scoreDiv = document.getElementById("scoreContainer");

// create our questions

let questions = [
    {
        question : "Quel est son nom complet ?",
        imgSrc : image['url'],
        choiceA : juste[0],
        choiceB : faux[0][0],
        choiceC : faux[1][0],
        choiceD : faux[2][0],
        correct : "A"
    },{
        question : "Où est-il né?",
        imgSrc : image['url'],
        choiceA : faux[0][1],
        choiceB : juste[1],
        choiceC : faux[1][1],
        choiceD : faux[2][1],
        correct : "B"
    },{
        question : "De quelle race est-il?",
        imgSrc : image['url'],
        choiceA : faux[0][2],
        choiceB : faux[1][2],
        choiceC : faux[2][2],
        choiceD : juste[2],
        correct : "D"
    },{
        question : "Quel est son alias?",
        imgSrc : image['url'],
        choiceA : faux[0][3],
        choiceB : faux[1][3],
        choiceC : faux[2][3],
        choiceD : juste[3],
        correct : "D"
    },{
        question : "Quel est son éditeur?",
        imgSrc : image['url'],
        choiceA : faux[0][4],
        choiceB : faux[1][4],
        choiceC : juste[4],
        choiceD : faux[2][4],
        correct : "C"
    },{
        question : "Quelle est son occupation?",
        imgSrc : image['url'],
        choiceA : juste[5],
        choiceB : faux[0][5],
        choiceC : faux[1][5],
        choiceD : faux[2][5],
        correct : "A"
    },{
        question : "Quel est son groupe d'affiliation?",
        imgSrc : image['url'],
        choiceA : faux[0][6],
        choiceB : faux[1][6],
        choiceC : juste[6],
        choiceD : faux[2][6],
        correct : "C"
    },{
        question : "Parmis tous ses prénoms, avec qui le héros à t'il un lien de parenté?",
        imgSrc : image['url'],
        choiceA : faux[0][7],
        choiceB : juste[7],
        choiceC : faux[1][7],
        choiceD : faux[2][7],
        correct : "B"
    },{
        question : "Où est situé sa base?",
        imgSrc : image['url'],
        choiceA : faux[0][8],
        choiceB : faux[1][8],
        choiceC : juste[8],
        choiceD : faux[2][8],
        correct : "C"
    },{
        question : "Dans quelle scène a t-il été vu pour la première fois?",
        imgSrc : image['url'],
        choiceA : faux[0][9],
        choiceB : faux[1][9],
        choiceC : faux[2][9],
        choiceD : juste[9],
        correct : "D"
    }
];

// create some variables

const lastQuestion = questions.length - 1;
let runningQuestion = 0;
let count = 0;
const questionTime = 30; // 10s
const gaugeWidth = 150; // 150px
const gaugeUnit = gaugeWidth / questionTime;
let TIMER;
let score = 0;

// render a question
function renderQuestion(){
    let q = questions[runningQuestion];
    
    question.innerHTML = "<p>"+ q.question +"</p>";
    qImg.innerHTML = "<img src="+ q.imgSrc +">";
    choiceA.innerHTML = q.choiceA;
    choiceB.innerHTML = q.choiceB;
    choiceC.innerHTML = q.choiceC;
    choiceD.innerHTML = q.choiceD;
}

start.addEventListener("click",startQuiz);

// start quiz
function startQuiz(){
    start.style.display = "none";
    renderQuestion();
    quiz.style.display = "block";
    renderProgress();
    renderCounter();
    TIMER = setInterval(renderCounter,1000); // 1000ms = 1s
}

// render progress
function renderProgress(){
    for(let qIndex = 0; qIndex <= lastQuestion; qIndex++){
        progress.innerHTML += "<div class='prog' id="+ qIndex +"></div>";
    }
}

// counter render

function renderCounter(){
    if(count <= questionTime){
        counter.innerHTML = count;
        timeGauge.style.width = count * gaugeUnit + "px";
        count++
    }else{
        count = 0;
        // change progress color to red
        answerIsWrong();
        if(runningQuestion < lastQuestion){
            runningQuestion++;
            renderQuestion();
        }else{
            // end the quiz and show the score
            clearInterval(TIMER);
            scoreRender();
        }
    }
}

// checkAnwer

function checkAnswer(answer){
    if( answer == questions[runningQuestion].correct){
        // answer is correct
        score++;
        // change progress color to green
        answerIsCorrect();
    }else{
        // answer is wrong
        // change progress color to red
        answerIsWrong();
    }
    count = 0;
    if(runningQuestion < lastQuestion){
        runningQuestion++;
        renderQuestion();
    }else{
        // end the quiz and show the score
        clearInterval(TIMER);
        scoreRender();
    }
}

// answer is correct
function answerIsCorrect(){
    document.getElementById(runningQuestion).style.backgroundColor = "#0f0";
}

// answer is Wrong
function answerIsWrong(){
    document.getElementById(runningQuestion).style.backgroundColor = "#f00";
}

// score render
function scoreRender(){
    scoreDiv.style.display = "block";
    
    // calculate the amount of question percent answered by the user
    const scorePerCent = Math.round(100 * score/questions.length);
    
    // choose the image based on the scorePerCent
    let img = (scorePerCent >= 80) ? "/BootstrapStudio/img/5.png" :
              (scorePerCent >= 60) ? "/BootstrapStudio/img/4.png" :
              (scorePerCent >= 40) ? "/BootstrapStudio/img/3.png" :
              (scorePerCent >= 20) ? "/BootstrapStudio/img/2.png" :
              "/BootstrapStudio/img/1.png";
    
    scoreDiv.innerHTML = "<img src="+ img +">";
    scoreDiv.innerHTML += "<p>"+ scorePerCent +"%</p>";
    scoreDiv.innerHTML += "<button type='submit'><a href='/'>Retour</a></button>";
}


document.getElementById("form").addEventListener("submit", function(evt){
    evt.preventDefault();
    document.getElementById("resultat").innerHTML = "Hello World";
});
/*
$(document).ready(function() {
    console.log('test');
    //A l'écoute du bouton ADD accueil
    $('#form').submit(function (evt) {
        evt.preventDefault();
        let question1 = document.getElementById('0').getAttribute('style');
        let question2 = document.getElementById('1').getAttribute('style');
        let question3 = document.getElementById('2').getAttribute('style');
        let question4 = document.getElementById('3').getAttribute('style');
        let question5 = document.getElementById('4').getAttribute('style');
        let question6 = document.getElementById('5').getAttribute('style');
        let question7 = document.getElementById('6').getAttribute('style');
        let question8 = document.getElementById('7').getAttribute('style');
        let question9 = document.getElementById('8').getAttribute('style');
        let question10 = document.getElementById('9').getAttribute('style');

        $.ajax('/SendQuizz.php', {
            method: 'POST',
            data: {
                question1: question1,
                question2: question2,
                question3: question3,
                question4: question4,
                question5: question5,
                question6: question6,
                question7: question7,
                question8: question8,
                question9: question9,
                question10: question10,
            }
        })
            .then(
                function success() {
                    $('#resultat').append('<div class="alert alert-success">Votre demande de devis a bien été transmis  ' +
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
                        '    <span aria-hidden="true">&times;</span>\n' +
                        '  </button></div>');
                },
                function fail() {
                    $('#resultat').append('<div class="alert alert-danger">Votre demande de devis n\'a pas été transmis ' +
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
                        '    <span aria-hidden="true">&times;</span>\n' +
                        '  </button></div>');
                }
            );
    });
});*/





















