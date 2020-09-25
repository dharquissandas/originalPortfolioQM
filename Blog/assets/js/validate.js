var title = document.getElementById('title');
var post = document.getElementById('post');

let resetButton = document.getElementById("resetButton").addEventListener("click", resetClicked);
let postButton = document.getElementById("postButton").addEventListener("click", postClicked);

function resetClicked(e){
    var retVal = confirm("Are you sure you want to clear your post?\nYour post will not be saved.");
    if(retVal == true) {
        return true;
    } 
    else{
        e.preventDefault();
        return false;
    }
 }

 function postClicked(e){
	if(title.value == "" && post.value == ""){
		e.preventDefault();
		window.alert('Title and Post Empty');
    }
    else if(title.value == ""){
        e.preventDefault();
		window.alert('Title Empty'); 
    }
    else if(post.value == ""){
        e.preventDefault();
		window.alert('Post Empty'); 
    }
 }