
function display_cart(){
  //rebindActions();
  var x = document.getElementById("myCart");
  if(x.style.display === "none"){
    x.style.display = "block";
  } else {
  x.style.display = "none";
  }
}

function rebindActions(){
  /*add action to 'delete from cart'
  var deletes = document.getElementsByClassName('deletefromcart');
  if(deletes.length > 0 ){
    //console.log(deletes);
    for(i=0; i < deletes.length; i++) {
      deletes.item(i).addEventListener("click", deleteCart);
    }
  }*/

  //add action to 'add to cart'
  var buttons = document.getElementsByClassName('addcart');
  if(buttons.length > 0 ){
    //console.log(buttons);
    for(i=0; i < buttons.length; i++) {
      buttons.item(i).addEventListener("click", addCart());
    }
  }


}

function deleteCart(id) {
  /*
        var parent = this.parentElement;
        var mycart = document.getElementById("myCart");
        mycart.classList.remove('delete');

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../public/cart.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onreadystatechange = function () {
          if(xhr.readyState == 4 && xhr.status == 200) {
            mycart.innerHTML = xhr.responseText;
            rebindActions();
            mycart.classList.remove('floatout');
            mycart.classList.remove('floatin');
            mycart.classList.remove('addition');
            mycart.classList.add('delete');
          }
          console.log(xhr.readyState);
        };

        xhr.send("delete_id=" + parent.id);
        */

        $.ajax({
          headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
          type: "POST",
          url: '/deletecart',
          data: {movie_id: id},

          success: function(response) {
            $('#myCart').html(response);
          }
          });
      }


function addCart(id) {

  /*
        var parent = this.parentElement;
        var mycart = document.getElementById("myCart");
        mycart.classList.remove('addition');

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../public/cart.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onreadystatechange = function () {
          if(xhr.readyState == 4 && xhr.status == 200) {
            mycart.innerHTML = xhr.responseText;
            rebindActions();
            mycart.classList.remove('floatout');
            mycart.classList.remove('floatin');
            mycart.classList.remove('delete');
            mycart.classList.add('addition');
          }
          console.log(xhr.readyState);
        };

        xhr.send("add_id=" + parent.id);

        */


          //console.log(id);

          $.ajax({
            headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
            type: "POST",
            url: '/addcart',
            data: {movie_id: id},

            success: function(response) {
              $('#myCart').html(response);
            }
            });



      }



window.onload = function() {
  filterByGenres();
  rebindActions();
}

function filterByGenres(){
  /*
  var genre_select = document.getElementById("genre_select");
  var movie_overview = document.getElementById("movie_overview");
  console.log("yay");

  var genre_id = genre_select.options[genre_select.selectedIndex].value;
  console.log(genre_id);
  var url = '../public/items_overview.php?genre_id=' + genre_id;

  var xhr = new XMLHttpRequest();
  xhr.open('GET', url, true);

  xhr.onreadystatechange = function () {
    if(xhr.readyState == 4 && xhr.status == 200) {
      movie_overview.innerHTML = xhr.responseText;
      rebindActions();
    }
  }
  xhr.send();
*/

var genre_select = document.getElementById("genre_select");
var movie_overview = document.getElementById("movie_overview");
console.log("yay");

var genre_id = genre_select.options[genre_select.selectedIndex].value;
console.log(genre_id);

  $.ajax({
    headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
    type: "POST",
    url: '/filter',
    data: {genre: genre_id},

    success: function(response) {
      $('#movie_overview').html(response);
    }
  })
rebindActions();

}

var genre_select = document.getElementById("genre_select");
genre_select.addEventListener("change", filterByGenres);
