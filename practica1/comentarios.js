// Sección de comentarios

/* Set the width of the sidebar to 250px (show it) */
function openNav() {
    document.getElementById("comments-section").style.display = "block";
}

/* Set the width of the sidebar to 0 (hide it) */
function closeNav() {
    document.getElementById("comments-section").style.display = "none";
}

function addComment(author, email, com) {
    var cs = document.getElementById("comments");
    
    // Create the comment div
    var comment = document.createElement("DIV");
    comment.className = "comment";
    
    // Append name and current date as title
    var title = document.createElement("H4");
    var d = new Date();
    var t = author + " - " + d.getDate() + "/" + d.getMonth() + " , " + d.getHours() + ":" + d.getMinutes();
    title.innerHTML = t;
    comment.appendChild(title);
    
    // Append comment
    var text = document.createTextNode(com);
    comment.appendChild(text);
    
    // Insert into page
    cs.appendChild(comment);
}

function validateForm() {
    var author = document.forms["postcomment"]["author"].value;
    var email = document.forms["postcomment"]["email"].value;
    var comment = document.forms["postcomment"]["comment"].value;
    
    // Check blank spaces
    if (author == "" || email == "" || comment == "") {
        alert("Todos los campos deben rellenarse");
        return false;
    }
    
    // Check email is correct
    if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
        alert("You have entered an invalid email address!")
        return (false)
    }
    else {
        addComment(author, email, comment);
    }
}