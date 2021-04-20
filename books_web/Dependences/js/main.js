$(document).ready(function(){
  apiUrl = 'http://127.0.0.1:8000/api/';  
  validInit = false;
  //load books 
  pageTo(apiUrl);  
});

//pagination
function pageTo(page){    
  if(!validInit){
    pageToVal = 'http://127.0.0.1:8000/api/books';
    validInit = true;
  }else{    
    pageToVal = 'http://127.0.0.1:8000/api/books?page='+page
  }
  loadBooks(pageToVal);
}

//load books
function loadBooks(url){
  fetch(url, {
    //method: 'GET',       
    //headers: {                              
      //'Content-Type' : 'application/json '  
    //},
     // body: formData                        
  })          
  .then((response)=> response.json())
  .then(data=> {
    console.log(url);
    console.log(validInit);
    var arrBooks = data.data;                      
    var doomCard = '';
    var cantPage = data.last_page;
    var contentPages = data.links;
    var doomPaginated = '';
    //load cant page
    $.each(contentPages,function(i,element){
      classActive = ''
      if(element.active){
        classActive = 'active';      
      }
      if(element.label!='Next »' && element.label!='« Previous'){
        doomPaginated += '<li class="page-item '+classActive+'"><a class="page-link" onClick="pageTo('+element.label+');">'+element.label+'</a></li>';
      }
    });
    $('.pagination').html(doomPaginated);

    //load books in cards
    $.each(arrBooks,function(index,element){
      doomCard += '<div class="m-5 card" style="width:450px">';
      doomCard += '<img class="card-img-top" src="'+element.cover_large+'">';
      doomCard += '<div class="card-body">';
      doomCard += '<h4 class="card-title">'+element.title+'</h4>';
      doomCard += '<h6 class="card-title">ISBN: '+element.ISBN+'</h6>';
      doomCard += '<a href="#" class="btn btn-info">Detalle</a>';
      doomCard += '<a onClick="deleteBook('+element.id+');" class="btn btn-danger">Eliminar</a>';
      doomCard += '</div>';
      doomCard += '</div>';
    });
    $('#secciontBooks').html(doomCard);    
  });  
}

//delete book
function deleteBook(id){
  bootbox.confirm("¿Seguro que desea borrar este libro?", function(result){ 
    if(result){
      fetch(apiUrl+'books/delete/'+id, {
        method: 'DELETE',       
        headers: {                              
          'Content-Type' : 'application/json '  
        },
        //body: formData                        
      })          
      .then((response)=> response.json())
      .then(data=> {        
          bootbox.alert({
            message: data.message            
          })
          validInit = false;
          pageTo(apiUrl);
      });
    }
  });  
}