$(document).ready(function(){
    if($('#products').length){
        filterProizvoda();
    }
    correctTotalPrice()

    $(document).on("click",".addToCart",addToCart);

    $(document).on("change",".genre",filterProizvoda);
    $("#search").keyup(filterProizvoda);
    $("#sort").on("change",filterProizvoda);

    $(document).on('change','.quantity',changeQuantity);
    $(document).on('click','.remove',removeFromCart);

    $(document).on('click','.page-link',getPage);
})
//Ajax funkcija
function fetchData(url,method,data){
    return new Promise((resolve, reject) => {
        $.ajax({
            url:url,
            method:method,
            dataType:"json",
            data:data,
            success:resolve,
            error:reject
        })
    })
}
//Funkcija za ispis html-a za proizvode
function ispisProizvoda(proizvodi){
    let html = "";
    if(proizvodi.length>0){
        for(proizvod of proizvodi){
            html+=`<div class="col-10 col-sm-6 col-md-4 mt-2 mx-auto mx-md-0">
          <div class="product card">
              <img src="${imgPath}/${proizvod.image}" class="card-img-top" alt="${proizvod.book_name}">
              <div class="card-body">
              <a href="/books/${proizvod.id}" id="name">
                <h5 class="card-title" >${proizvod.book_name}</h5><hr/>
              </a>
                <p class="card-text m-0">Genre: ${proizvod.genre.genre_name}</p><hr/>`;
                let authors = proizvod.authors.map(item => {
                    return item.name
                }).join(', ');
                html+=`<p class="card-text m-0">Author: ${authors}</p><hr/>
                <p class="card-text font-weight-bold m-0" id="price">Price: $${proizvod.price}</p>`;
                if($("#navigacija").data('admin') == 'true'){
                    html+=`<a href="/books/${proizvod.id}/ed" class="btn btn-outline-warning mt-2">Edit</a>
                <a href="{{route('books.destroy',['book'=>$book->id])}}" class="btn btn-outline-danger mt-2">Delete</a>`
                }
                else{
                    html+=`<a href="#!" class="btn btn-outline-warning mt-2 addToCart" data-id=${proizvod.id}>Add to cart</a>`;
                }
                html+=`<p></p>
              </div>
            </div>
          </div>`;
        }
    }
    else{
        html=`<div class="container not-found m-5 alert alert-danger"><p>There are no products that match the criteria.</p></div>`
    }
    $('#products').html(html);
}

//Funkcije za prikaz, filter i paginaciju proizvoda
async function filterProizvoda(){
    let searchVal = $("#search").val().toLowerCase();
    let sortVal = $("#sort").val();
    let izabraniZanrovi=[];
    $('.genre:checked').each(function(el){
        izabraniZanrovi.push(parseInt($(this).val()));
    })
    window.filterObj = {
        search: searchVal,
        sort: sortVal,
        genres:izabraniZanrovi
    }
    try{
        $("#products .product, #products .not-found").remove();
        $('#loader').show();
        $("#pagination").hide();

        let books = await fetchData('/books/json', 'get', filterObj);

        $("#loader").hide();
        $('#count').html("Books ("+books.total+")")

        ispisProizvoda(books.data);
        printPagination(books.last_page);
    }catch(ex){
        console.error(ex);
    }
}

function printPagination(page,activePage = 1){
    let html = '';
    for(i =1;i<=page;i++){
        html += `<li class="page-item ${activePage == i ? 'active' : ''}"><a class="page-link" href="#!"  data-page="${i}">${i}</a></li>`;
    }
    $('.pagination').html(html);
    $("#pagination").show();
}

async function getPage(){
    let page = $(this).data('page');
    let dataObj = filterObj;
    dataObj.page = page;
    try{
        $("html").animate({
            scrollTop: $("nav").offset().top
        }, 300);

        $("#products .product, #products .not-found").remove();
        $('#loader').show();
        $("#pagination").hide();

        let books = await fetchData('/books/json','get',dataObj);

        $("#loader").hide();
        $('#count').html("Books ("+books.total+")")


        ispisProizvoda(books.data);
        printPagination(books.last_page,books.current_page);
    }catch(ex){
        console.error(ex);
    }
}

//Funkcija za ispis poruke da je proizvod dodat u korpu
function poruka(tekst){
    switch(tekst){
        case 'uspeh':
            toastr.success('Added to cart!')
            break;
        case 'adminje':
            toastr.warning('Admin can not add to cart.');
            break;
        case 'gostje':
            toastr.warning('You have to login first.')
            break;
        case 'greska':
            toastr.warning('There has been an error processing your request.')
            break;
    }
}

//Funkcije za obradu forme
function ukloniGreske(){
    $('.greska').hide();
    $('.uspeh').hide();
}
function greskaForme(elementForme,poruka){
    $(elementForme).next().text(poruka).fadeIn();
}
var izrazMejl = /^([a-z]{3,15})(([\.]?[-]?[_]?[a-z]{3,20})*([\d]{1,3})*)@([a-z]{3,20})(\.[a-z]{2,3})+$/;
var izrazImePrezime = /^\p{Uppercase_Letter}\p{Letter}{1,14}(\s\p{Uppercase_Letter}\p{Letter}{1,14}){1,3}$/u;

$(document.regForm).on("submit",function(event){
    event.preventDefault();
    ukloniGreske();
    let forma=document.regForm;
    let greska=false;

    if(!izrazImePrezime.test(forma.tbName.value)){
        greskaForme(forma.tbName,"First and last name must start with capital letter and have at least 2 characters.")
        greska = true;
    }

    if(!izrazMejl.test(forma.tbEmail.value)){
        greskaForme(forma.tbEmail, "Please enter a valid email(example: yourname@gmail.com).")
        greska = true;
    }

    if(forma.tbPass.value.length < 7) {
        greskaForme(forma.tbPass, "Password must have at least 7 characters.");
        greska = true;
    }

    if(!greska){
        $('#btnReg').attr('type','hidden');
        forma.submit();
    }
})

$(document.logForm).on("submit",function(event){
    event.preventDefault();
    ukloniGreske();
    let forma = document.logForm;
    let greska = false;
    if(!izrazMejl.test(forma.tbEmail.value)){
        greskaForme(forma.tbEmail, "Please enter a valid email(example: yourname@gmail.com).")
        greska = true;
    }
    if(!forma.tbEmail.value){
        greskaForme(forma.tbEmail,"Email field can't be empty.");
        greska=true;
    }
    if(!forma.tbPass.value){
        greskaForme(forma.tbPass,"Password field can't be empty.");
        greska=true
    }

    if(!greska){
        $('#btnLogin').attr('type','hidden');
        forma.submit();
    }
})

$(document.conForm).on("submit",function(event){
    event.preventDefault();
    ukloniGreske();
    let forma=document.conForm;
    let greska=false;

    if(!izrazImePrezime.test(forma.tbName.value)){
        greskaForme(forma.tbName,"First and last name must start with capital letter and have at least 2 characters.")
        greska = true;
    }

    if(!izrazMejl.test(forma.tbEmail.value)){
        greskaForme(forma.tbEmail, "Please enter a valid email(example: yourname@gmail.com).")
        greska = true;
    }
    if(!forma.tbEmail.value){
        greskaForme(forma.tbEmail,"Email field can't be empty.");
        greska=true;
    }
    if(forma.userMessage.value.length == "" || forma.userMessage.value.length > 200) {
        greskaForme(forma.userMessage, "Please enter a message no longer than 200 characters.");
        greska = true;
    }

    if(!greska){
        $('#btnSubmitContact').attr('type','hidden');
        forma.submit();
    }
})

//Scroll to top dugme
const showOnPx = 200;
const backToTopButton = document.querySelector(".back-to-top");

const scrollContainer = () => {
    return document.documentElement || document.body;
};

const goToTop = () => {
    document.body.scrollIntoView({
        behavior: "smooth"
    });
};

document.addEventListener("scroll", () => {

    if (scrollContainer().scrollTop > showOnPx) {
        backToTopButton.classList.remove("hidden");
    } else {
        backToTopButton.classList.add("hidden");
    }
});

backToTopButton.addEventListener("click", goToTop);


//Funkcije za rad sa korpom
function addToCart(){
    let id=$(this).data('id');
    $.ajax({
        method: "POST",
        url: "/cart",
        data: {
            bookId : id
        },
        success: function(data) {
            poruka(data)
        },
        error: function(xhr) {
            console.error(xhr);

        }
    })
}

function changeQuantity() {
    let inputVal = $(this).val();
    let price = $(this).data('price');
    let bookId = $(this).data('id');
    console.log(inputVal)
    if(!inputVal || inputVal < 1) {
        toastr.warning('Only numbers equal to or higher than 1 are allowed in the quantity field.')
        $(this).val(1);
    } {
        $("#span_price_" + bookId).html($(this).val() * price);
        correctTotalPrice();

        $.ajax({
            method: "POST",
            url: "/cart/adjustQuantity",
            data: {
                bookId : bookId,
                quantity : inputVal
            },
            success: function() {
                toastr.success("Adjustment successfull.")
            },
            error: function(xhr, status, error) {
                toastr.error("There was an error processing your request.")
            }
        })
    }
}

function correctTotalPrice() {
    var allPrices = document.querySelectorAll(".product_price")

    var totalPrice = 0;

    for(let priceSpan of allPrices) {
        totalPrice += Number(priceSpan.innerHTML)
    }

    $("#totalPrice").html(totalPrice)
}

function removeFromCart() {
    let bookId = $(this).data('id');
    $.ajax({
        method: "DELETE",
        url: "/cart/" + bookId,
        success: function() {
            toastr.success("Item successfully removed.")

            let cartItemDiv = $("#cart_item_" + bookId)

            cartItemDiv.remove()
            if($('.cart-item').length == 0){
                location.reload();
            }
            $("#count").html($('.cart-item').length+" items");
            correctTotalPrice()
        },
        error: function(xhr, status, error) {
            toastr.error("There was an error processing your request.")
        }
    })
}
