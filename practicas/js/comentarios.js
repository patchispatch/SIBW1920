// Sección de comentarios

/* Set the width of the sidebar to 25% (show it) */
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
    var comment = document.createElement("div");
    comment.className = "comment";
    
    // Append name and current date as title
    var title = document.createElement("h4");
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
        alert("Debes proporcionar una dirección de correo electrónico válida.")
        return false;
    }
    else {
        addComment(author, email, comment);
    }
}

function liveCensorship(id) {
    var text = document.getElementById(id);
    var filter = ["macabeo", "cernícalo", "tontopollas", "merluzo", "rufián", "truhán", "meretriz", "Sonic4", "tragaldabas", "Jordi"];
    
    for(var word of filter) {
        text.value = text.value.replace(word, "*".repeat(word.length));
    }
}