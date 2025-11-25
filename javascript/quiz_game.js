document.addEventListener("DOMContentLoaded",function(){
    const question = document.getElementById("question");
    const choices = document.getElementById("choices");
    const nextBtn = document.getElementById ("nextBtn" );
    const result = document.getElementById("result")
    const quizData =[
        {
            question: "Arry index in Javascript start form?",
            choices: ["1","0","-1","2"],
            answer: "0"
        },
        {
            question: "which tag is used to declare variables?",
            choices: ["make","var/let/const","create","nex/var"],
            answer: "var/let/const"
        },
        {
            question: "How do you wirte a comment in CSS?",
            choices: ["//comment","/*comment*/","<--comment-->","#comment"],
            answer: "/*comment*/"
        }
    ];
    function loadQuiz(){
        const currentData = quizData[currentQuiz];
        question.textContent =currentData.question;

        nextBtn.classList.add("hidden");
        choices.innerHTML="";
        const choicesArr = currentData.choices
        choicesArr.forEach(choice =>{
            const button = document.createElement("button");
            button.textContent = choice;
            button.addEventListener("click",selectAnswer);
            choices.appendChild(button);
        });

    }
    function selectAnswer(e){
        const selectAnswer = e.target.textContent;
        const correctAnwswer = quizData[currentQuiz].answer;

        if(selectAnswer === correctAnwswer){
            e.target.style.backgroundColor ="skyblue";
            score++;
        }
        else{
            e.target.style.backgroundColor ="pink";
        }
        Array.from(choices.children).forEach(btn => btn.disabled = true);
        nextBtn.classList.remove("hidden");
    }

    // button.addEventListener("click",selectAnswer);
    function showResult() {
        document.getElementById("quiz").classList.add("hidden");
        result.classList.remove("hidden");
        result.textContent = `អ្នកទទួលបានពិន្ទុចំនួន​ ${score}/ ${quizData.length} !`;
    }

    let currentQuiz =0;
    let score =0;
    nextBtn.addEventListener("click", function(event){
        currentQuiz++;
        if(currentQuiz<quizData.length){
            loadQuiz();
        }
        else{
            showResult();
        }
    });

    loadQuiz();
});