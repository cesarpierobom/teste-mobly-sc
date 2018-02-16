function previewTodosOsPosts(){
    fetch('https://jsonplaceholder.typicode.com/posts').then(function (response) {
        var contentType = response.headers.get("content-type");
        if (contentType && contentType.indexOf("application/json") !== -1) {
            return response.json().then(function (json) {
                mountHomeCards(json);
            });
        } else {
            console.log('allposts api fail');
        }
    });
}

function mountHomeCards(json){
    json.forEach(element => {
        var card = $("<div class='card'></div>");
        var cardBody = $("<div class='card-body'></div>");
        var title = $("<h5 class='card-title'></h5>").text(element.title);
        var text = $("<p class='card-text'></p>").text(element.body.substring(0, 50) + "...");
        var button = $("<a href='#' onclick='viewPost(" + element.id + ")' class='btn btn-primary'>Ir para o post</a>");
        $(cardBody).append(title);
        $(cardBody).append(text);
        $(cardBody).append(button);
        $(card).append(cardBody);
        $("#cards_here").append(card);
    });
}

function clearView(){
    $("#cards_here").empty();
}

function viewPost(id){
    clearView();
    
    fetch('https://jsonplaceholder.typicode.com/posts/'+id).then(function (response) {
        var contentType = response.headers.get("content-type");
        if (contentType && contentType.indexOf("application/json") !== -1) {
            return response.json().then(function (json) {
                mountPostCard(json);
            });
        }else{
            console.log('postId api fail');
        }
    });
}

function mountPostCard(json){
    var card = $("<div class='card'></div>");
    var cardBody = $("<div class='card-body'></div>");
    var title = $("<h5 class='card-title'></h5>").text(json.title);
    var text = $("<p class='card-text'></p>").text(json.body);
    var button = $("<a href='#' onclick='showComments(" + json.id + ")' class='card-link'>Visualizar Comentarios</a>");
    $(cardBody).append(title);
    $(cardBody).append(text);
    $(cardBody).append(button);
    $(card).append(cardBody);
    $("#cards_here").append(card);
}

function showComments(postId){
    fetch('https://jsonplaceholder.typicode.com/posts/' + postId + '/comments').then(function (response) {
        var contentType = response.headers.get("content-type");
        if (contentType && contentType.indexOf("application/json") !== -1) {
            return response.json().then(function (json) {
                createComments(json);
            });
        }else{
            console.log('comments api fail');
        }
    });
}

function createComments(json){
    json.forEach(element => {
        var cardFooter = $("<div class='card-footer text-muted'></div>");
        var blockquote = $("<blockquote class='blockquote'></blockquote>");
        var commentP = $("<p></p>").text(element.body);
        var citeEmail = $("<cite title='Email'></cite>").text(' (' + element.email + ') ');
        var nameFooter = $("<footer class='blockquote-footer'></footer>").text(element.name);
        $(nameFooter).append(citeEmail);
        $(blockquote).append(commentP);
        $(blockquote).append(nameFooter);
        $(cardFooter).append(blockquote);
        $(".card:first > .card-body").after(cardFooter);
    });
}

$(document).ready(function(){
    previewTodosOsPosts();
});