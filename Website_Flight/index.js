document.querySelector("button").addEventListener("click" , onclick);

function onclick(){
    document.querySelector(".logout").classList.add("clicked");
        setTimeout(function(){
            document.querySelector(".logout").classList.remove("clicked");
        }, 80);
    
}

 document.querySelector('.logout').addEventListener("click", function(){
    window.location.href("/Applications/XAMPP/xamppfiles/htdocs/Website_Flight/signup.php");
 })
 