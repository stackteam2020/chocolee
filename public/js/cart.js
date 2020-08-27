const cartItemsContainer2 = document.querySelector('.ps-cart__items');
let cartTotal2 = document.querySelector('#total-cart');
let cartTotalElements2 = document.querySelector('#cart_total_elements');
let productsCount2 = 0;
let total2 = sessionStorage.getItem('total') ?? 0
let shoppingCart;
const cartFooter = document.querySelector('.cart-figure');

// sessionStorage.clear()
shoppingCart = JSON.parse(sessionStorage.getItem('cart'))

if (shoppingCart.length > 0) {
    console.log('yes')
    shoppingCart = JSON.parse(sessionStorage.getItem('cart'))
    shoppingCart.forEach((product) => {
        const productElement = createElement('div', ['ps-product--mini-cart'])
        productElement.innerHTML = `
            <div class="ps-product__thumbnail"><a href="#"><img src="${product.image}" alt=""></a></div>
            <div class="ps-product__content"><a class="ps-btn--close"></a><a class="ps-product__title" href="product-default.html">${product.name}</a>
            <p><strong>Quantity: <span class="product_quantity">${product.quantity}</span></strong></p><small class="product_price">$${product.price}</small>
            </div>
    `
    
    
    const removeBtn = productElement.querySelector('.ps-btn--close')
    removeBtn.addEventListener('click', removeCartItem2);
        productsCount2++
        cartTotalElements2.textContent = productsCount2
        cartTotal2.textContent = '$' + total2;
        cartItemsContainer2.append(productElement)
    })

    const cartCheckout = createElement('a', 'ps-btn', 'ps-btn--dark')
    cartCheckout.href='aaa.html'
    cartCheckout.innerHTML = 'checkout'

    cartFooter.append(cartCheckout)


}

function createElement(element, ...cssClasses) {
    const newElement = document.createElement(element);
    if (cssClasses.length != 0) {
        cssClasses.forEach((cssclass) => {
            newElement.classList.add(cssclass)
        })
        
    }
    return newElement

}


function removeCartItem2(event) {
    console.log('b')
    const removeBtn = event.target
    let removedProductName = removeBtn.nextSibling.textContent
    let filteredProducts = shoppingCart.filter((product) => {
        return product.name != removedProductName
    })
    const parentDiv = removeBtn.parentElement.previousElementSibling.parentElement
    const cartContent = document.querySelector('.ps-cart__content')
    if(filteredProducts.length == 0) {
        cartContent.querySelector('.ps-btn--dark').remove()
    }
    if (filteredProducts.length == 0) {
        sessionStorage.clear()
    }
    parentDiv.remove()
    updateCartTotal2();
    shoppingCart = filteredProducts
    sessionStorage.setItem('cart', JSON.stringify(shoppingCart));

}

function updateCartTotal2() {
    const cartRows = cartItemsContainer2.querySelectorAll('.ps-product--mini-cart');
     total = 0;

    for (let i = 0; i < cartRows.length; i++) {
        const cartRow = cartRows[i];
        const priceElement = cartRow.querySelector('.product_price');
        const quantityElement = cartRow.querySelector('.product_quantity')
        let price = priceElement.textContent.replace('$', '');
        let quantity = parseInt(quantityElement.textContent);
        total += price * quantity;
    }

    total = Math.round(total * 100) / 100
    console.log(total)
    cartTotal2.textContent = '$' + total;
    productsCount2--
    cartTotalElements2.textContent = productsCount2
    sessionStorage.setItem('total', total)
}
