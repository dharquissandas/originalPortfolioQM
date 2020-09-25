var titleField = document.getElementById("title");
var postField = document.getElementById("post");
var previewButton = document.getElementById("previewButton").addEventListener("click", preview);
var reset = document.getElementById("resetButton").addEventListener("click", resetbutton);
var postColumn = document.getElementById("column1");


function resetbutton(){
    var element =  document.getElementById("previewcard");
    var titlecard = document.getElementById("previewtitlecard")
    if (typeof(element) != 'undefined' && element != null && typeof(titlecard) != 'undefined' && titlecard != null){
        postColumn.removeChild(element);
        postColumn.removeChild(titlecard);
    }
}


function preview(){
    var element =  document.getElementById("previewcard");
    var titlecard = document.getElementById("previewtitlecard")
    if (typeof(element) != 'undefined' && element != null && typeof(titlecard) != 'undefined' && titlecard != null){
        postColumn.removeChild(element);
        createPreview();
    }
    else{
        createPreviewTitleCard();
        createPreview();
    }
}

function createPreview(){
    var previewdiv = document.createElement("div");
    previewdiv.setAttribute("class","card");
    previewdiv.setAttribute("id","previewcard");

    var timestamp = new Date().getTime();

    var clockimage = document.createElement("i");
    clockimage.setAttribute("class","fa fa-clock-o");
    previewdiv.appendChild(clockimage);

    var dateTitle = document.createElement("h3");
    dateTitle.setAttribute("class","align");
    var datenode = document.createTextNode(timeConverter(timestamp) + " UTC");
    dateTitle.appendChild(datenode);
    previewdiv.appendChild(dateTitle);

    var hr = document.createElement("hr");
    previewdiv.appendChild(hr);

    var title = document.createElement("h4");
    var titlenode = document.createTextNode(titleField.value);
    title.appendChild(titlenode);
    previewdiv.appendChild(title);

    var post = document.createElement("p");
    var postnode = document.createTextNode(postField.value);
    post.appendChild(postnode);
    previewdiv.appendChild(post);

    postColumn.appendChild(previewdiv);
}

function createPreviewTitleCard(){
    var previewtitlediv = document.createElement("div");
    previewtitlediv.setAttribute("class","card");
    previewtitlediv.setAttribute("id","previewtitlecard");

    var previewTitle = document.createElement("h2");
    var titleText = document.createTextNode("Preview");
    previewTitle.appendChild(titleText);
    previewtitlediv.appendChild(previewTitle);

    postColumn.appendChild(previewtitlediv);
}

function timeConverter(UNIX_timestamp){
    var a = new Date(UNIX_timestamp);
    var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
    var year = a.getFullYear();
    var month = months[a.getMonth()];
    var date = a.getDate();
    var hour = a.getHours();
    var min = (a.getMinutes()<10? '0':'') + a.getMinutes();
    var time = date + nth(date) + ' ' + month + ' ' + year + ' ' + hour + ':' + min;
    return time;
  }

  function nth(d) {
    if (d > 3 && d < 21) return 'th'; 
        switch (d % 10) {
            case 1:  return "st";
            case 2:  return "nd";
            case 3:  return "rd";
            default: return "th";
        }
    }