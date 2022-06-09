// cart aktif

var cartIcon = document.querySelector('#cart-icon');
var cart = document.querySelector('.cart');
var closeCart = document.querySelector('#close-cart');
var menu = document.querySelector('.menu-icon');
var navbar = document.querySelector('.navbar');
var header = document.querySelector('header');

window.addEventListener('scroll', () => {
  header.classList.toggle('header-active', window.scrollY > 0);
});

menu.onclick = () => {
  navbar.classList.toggle('open-menu');
  menu.classList.toggle('move');
};
window.onscroll = () => {
  navbar.classList.remove('open-menu');
  menu.classList.remove('move');
};

// membuka cart
cartIcon.onclick = () => {
  cart.classList.add('active');
  header.classList.remove('.menu-icon');
};

//menutup cart
closeCart.onclick = () => {
  cart.classList.remove('active');
};

if (document.readyState == 'loading') {
  document.addEventListener('DOMContentLoaded', ready);
} else {
  ready();
}

// function mengambil data dari classname dan ketika di klik menghapus cart item
function ready() {
  var removeCartButtons = document.getElementsByClassName('cart-remove');
  console.log(removeCartButtons);
  for (var i = 0; i < removeCartButtons.length; i++) {
    var button = removeCartButtons[i];
    button.addEventListener('click', removeCartItem);
  }
  // jumlah item bertambah
  var quantityInputs = document.getElementsByClassName('cart-quantity');
  for (var i = 0; i < quantityInputs.length; i++) {
    var input = quantityInputs[i];
    input.addEventListener('change', quantityChanged);
  }
  //menambah item ke cart

  var addCart = document.getElementsByClassName('add-cart');
  for (var i = 0; i < addCart.length; i++) {
    var button = addCart[i];
    button.addEventListener('click', addToCart);
  }

  document.getElementsByClassName('btn-buy')[0].addEventListener('click', buyButtonClicked);

  function buyButtonClicked() {
    success();
    var cartContent = document.getElementsByClassName('cart-content')[0];
    while (cartContent.hasChildNodes()) {
      cartContent.removeChild(cartContent.firstChild);
    }
    updateTotal();
  }
  // menghapus cart item
  function removeCartItem(event) {
    var buttonClicked = event.target;
    buttonClicked.parentElement.remove();
    updateTotal();
  }

  // jumlah item bertambah

  function quantityChanged(event) {
    var input = event.target;
    if (isNaN(input.value) || input.value <= 0) {
      input.value = 1;
    }
    updateTotal();
  }

  // menambah item ke cart

  function addToCart(event) {
    var button = event.target;
    var shopProducts = button.parentElement;
    var title = shopProducts.getElementsByClassName('product-title')[0].innerText;
    var price = shopProducts.getElementsByClassName('price')[0].innerText;
    var productImg = shopProducts.getElementsByClassName('product-img')[0].src;
    addProductCart(title, price, productImg);
    updateTotal();
  }

  function addProductCart(title, price, productImg) {
    var cartShopBox = document.createElement('div');
    cartShopBox.classList.add('cart-box');
    var cartItems = document.getElementsByClassName('cart-content')[0];
    var cartItemsNames = cartItems.getElementsByClassName('cart-product-title');
    for (var i = 0; i < cartItemsNames.length; i++) {
      if (cartItemsNames[i].innerText == title) {
        berhasil();
      }
    }

    var cartBoxContent = `
              <img src="${productImg}" alt="" class="cart-img" />
              <div class="detail-box">
                <div class="cart-product-title">${title}</div>
                <div class="cart-price">${price}</div>
                <input type="number" value="1" class="cart-quantity" />
              </div>
              <!-- HAPUS CART -->
              <i class="bx bx-trash-alt cart-remove"></i>`;
    cartShopBox.innerHTML = cartBoxContent;
    cartItems.append(cartShopBox);
    cartShopBox.getElementsByClassName('cart-remove')[0].addEventListener('click', removeCartItem);
    cartShopBox.getElementsByClassName('cart-quantity')[0].addEventListener('change', quantityChanged);
  }

  //total bertambah ketika item ditambahkan

  function updateTotal() {
    var cartContent = document.getElementsByClassName('cart-content')[0];
    var cartBoxes = document.getElementsByClassName('cart-box');
    var total = 0;

    for (var i = 0; i < cartBoxes.length; i++) {
      var cartBox = cartBoxes[i];
      var priceElement = cartBox.getElementsByClassName('cart-price')[0];
      var quantityElement = cartBox.getElementsByClassName('cart-quantity')[0];
      var price = parseFloat(priceElement.innerText.replace('Rp', ''));
      var quantity = quantityElement.value;
      total = total + price * quantity;
    }

    document.getElementsByClassName('total-price')[0].innerText = 'Rp. ' + total;
  }
}

function success() {
  swal({
    title: 'Order Berhasil!',
    text: 'Barang akan dikirim dalam 2x24Jam',
    icon: 'success',
    button: 'Oke!',
  });
}

function berhasil() {
  swal({
    title: 'Barang berhasil dimasukan ke keranjang',
    text: 'Silahkan cek keranjang anda',
    icon: 'success',
    button: 'Oke!',
  });
}
