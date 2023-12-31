<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comfica</title>
    
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    

    <script>

        let idBookToDel = 0;
        
		function getBooks() {
            $.ajax({
                url: 'http://127.0.0.1:8000/api/books',
                type: 'GET',
				dataType: 'json',
                success: function(data) {
                    console.log(data);
					var grid = "";
                    var fav= "";
					for(var i = 0; i < data.length; i++) {
                        if(data[i].fav == 1){
                            fav='./images/c2.png';
                        }
                        else{
                            fav='./images/c.png';
                        }
						grid += `<div class="card">
                                    <div class="img-div" id="imgcard" style="background: url('` + data[i].url_img + `'); background-size: auto 100%; background-repeat: no-repeat; background-origin: content-box; background-position: center;">
                                        <button class="fav-btn" id="btnFav" idBook="` + data[i].id + `" fav="` + data[i].fav + `" onclick="favBook(this);"><img src="` + fav + `" height="30px" width="30px"></button>
                                    </div>
                                    <div class="card-body" idBook="` + data[i].id + `" data-bs-toggle="modal" data-bs-target="#modalDel" onclick="setBookToDel(this);">
                                        <h5 class="card-title">` + data[i].name + `</h5>
                                        <p class="card-text">` + data[i].description + `</p>
                                    </div>
                                </div>`
					}
                    grid += `<div class="add-book">
                                <button class="add-btn" data-bs-toggle="modal" data-bs-target="#modalAdd" id="add">Adicionar</button>
                            </div>`				
					document.getElementById("board").innerHTML = grid;

				},
				error: function(err) {
					console.log(err.responseText.message);
				}
			});
        }

        function insertBook() {
            $.ajax({
                url: 'http://127.0.0.1:8000/api/books/new',
                type: 'POST',
                data: { 
                    name: document.getElementById('txtLivro').value,
                    description: document.getElementById('txtDescricao').value,
                    url_img: document.getElementById('txtUrl').value,
                    fav: 0
                },
				dataType: 'json',
                success: function() {
                    location.reload();
				},
				error: function(err) {
					console.log(err.responseText.message);
				}
			});
        }

        function favBook(elem){
            changedFav = '';
            if(elem.getAttribute('fav') == 0){
                changedFav = 1;
            }
            else{
                changedFav = 0;
            }

            $.ajax({
                url: 'http://127.0.0.1:8000/api/book/editfav',
                type: 'POST',
                data: { 
                    id: elem.getAttribute('idBook'),
                    fav: changedFav
                },
				dataType: 'json',
                success: function() {
                    location.reload();
				},
				error: function(err) {
					console.log(err.responseText.message);
				}
			});
        }

        function orderBooksByFav() {
            var btnFavs = document.getElementById("btnFavs");
            var color = btnFavs.style.backgroundColor;
            if(color == "purple"){
                getBooks();
                btnFavs.style.backgroundColor = "darkblue";
            }
            else{
                btnFavs.style.backgroundColor = "purple";
                $.ajax({
                    url: 'http://127.0.0.1:8000/api/books',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        function compare( a, b ) {
                            if ( a.fav < b.fav ){
                                return 1;
                            }
                            if ( a.fav > b.fav){
                                return -1;
                            }
                            return 0;
                        }
                    
                        data.sort(compare)

                        var grid = "";
                        var fav= "";
                        for(var i = 0; i < data.length; i++) {
                            if(data[i].fav == 1){
                                fav='./images/c2.png';
                            }
                            else{
                                fav='./images/c.png';
                            }
                            grid += `<div class="card">
                                        <div class="img-div" id="imgcard" style="background-image: url('` + data[i].url_img + `'); background-size: auto 100%; background-repeat: no-repeat; background-origin: content-box; background-position: center;">
                                            <button class="fav-btn" id="btnFav" idBook="` + data[i].id + `" fav="` + data[i].fav + `" onclick="favBook(this);"><img src="` + fav + `" height="30px" width="30px"></button>
                                        </div>
                                        <div class="card-body" idBook="` + data[i].id + `" data-bs-toggle="modal" data-bs-target="#modalDel" onclick="setBookToDel(this);">
                                            <h5 class="card-title">` + data[i].name + `</h5>
                                            <p class="card-text">` + data[i].description + `</p>
                                        </div>
                                    </div>`
                        }
                        grid += `<div class="add-book">
                                    <button class="add-btn" data-bs-toggle="modal" data-bs-target="#modalAdd" id="add">Adicionar</button>
                                </div>`			
                        document.getElementById("board").innerHTML = grid;
                    },
                    error: function(err) {
                        console.log(err.responseText.message);
                    }
			    });
            }


            
        }

        function delBook(){
            console.log(idBookToDel);

            $.ajax({
                url: 'http://127.0.0.1:8000/api/book/destroy',
                type: 'POST',
                data: { 
                    id: idBookToDel
                },
				dataType: 'json',
                success: function() {
                    location.reload();
				},
				error: function(err) {
					console.log(err.responseText.message);
				}
			});
        }
    
        function setBookToDel(elem){
            idBookToDel = elem.getAttribute("idBook");
        }
    
    </script>
</head>
<body onload='getBooks()'>
    <div class="title">
        Bibloteca de livros
    </div>

    <div class="favs">
        <button class="favs-btn" id="btnFavs" onclick="orderBooksByFav();">Favoritos</button>
    </div>

    <div class="row" id="board"></div>
    
    <div class="modal fade bd-example-modal-xl" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Adicionar livro</h5>
              <button class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-add-book" >
                    <b>
                        <br>Titulo:
                        <br><input type="text" class="form-txt" id="txtLivro">
                        <br><br>Descrição:
                        <br><input type="text" class="form-txt" id="txtDescricao">
                        <br><br>URL da imagem:
                        <br><input type="text" class="form-txt" id="txtUrl">
                    </b>
                    <br>
                </div>
            </div>
            <div class="modal-footer">
              <button class="cancel-btn" data-bs-dismiss="modal">Cancelar</button>
              <button class="confirm-btn" id="btnAdd" onclick="insertBook()">Confirmar</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal" tabindex="-1" role="dialog" id="modalDel">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Confirmação</h5>
              <button class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Deseja realmente excluir esse livro?</p>
            </div>
            <div class="modal-footer">
                <button class="cancel-btn" data-bs-dismiss="modal">Cancelar</button>
                <button class="confirm-btn" id="btnDel" onclick="delBook();">Confirmar</button>
              
            </div>
          </div>
        </div>
      </div>

    <script>
        var btnAdd = document.getElementById("btnAdd");
        btnAdd.addEventListener("click", function(event){
            btnAdd.disabled = true; 
        })
    </script>

    <script>
        var btnDel = document.getElementById("btnDel");
        btnDel.addEventListener("click", function(event){
            btnDel.disabled = true; 
        })
    </script>

</body>
</html>