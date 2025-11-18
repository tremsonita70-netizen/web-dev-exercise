document.addEventListener("DOMContentLoaded",function(){
    const titleInput = document.getElementById("title");
    const titleError = document.getElementById("titleError");
    const typeButtons = document.getElementsByName("type");
    const typeError = document.getElementById("typeError");
    const startdateInput = document.getElementById("startdate");
    const startdateError = document.getElementById("startdateError");
    const genreInput = document.getElementById("genre");
    const genreError = document.getElementById("genreError");
    const summaryInput = document.getElementById("Summary");
    const summaryError = document.getElementById("summaryError");
    function validateSummary(){
        if (summaryInput.value.trim() === ""){
            summaryError.textContent ="Summary is required.";
            return false;
        }
        else{
            summaryError.textContent = "";
            return true;
        }
    }
    function validateGenre(){
        if(genreInput.value === ""){
            genreError.textContent = " Genre is required.";
            return false; 
        }
        else{
            genreError.textContent = "";
            return true;
        }
    }


    function validateStartDate(){
        if(!startdateInput.validity.valid){
            startdateError.textContent = "Invalid date.";
            return false;
        }
        else{
            startdateError.textContent = "";
            return true;
        }
        
    }


    function validateType(){
        let checkedType = document.querySelector("input[name='type']:checked");
        if( checkedType === null){
            typeError.textContent = "Type is  required.";
            return false;
        }
        else{
            typeError.textContent = "";
            return true;
        }
    }
    
    function validateTitle(){
        const value = titleInput.value.trim();
        if (titleInput.value.trim() === ""){
            titleError.textContent = "Title is required.";
            return false;
        }
        if (value.length > 50){
            titleError.textContent = "No more than 50 characters allowed."
            return false;
        }
        else {
            titleError.textContent ="";
            return true;
        }
        
    }
    typeButtons.forEach(radioButton =>{
        radioButton.addEventListener('blur', validateType);
    }) 

    titleInput.addEventListener("blur", validateTitle);

    const form = document.getElementById("songForm");
    form.addEventListener("submit", function(event){
        const isvalid = validateTitle();
        if(!isvalid){
            event.preventDefault();
        }
        
    })
    startdateInput.addEventListener("blur",validateStartDate);
    genreInput.addEventListener("blur", validateGenre );
    summaryInput.addEventListener("blur",validateSummary);
    
});