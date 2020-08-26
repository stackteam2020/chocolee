const cartItemsContainer2 = document.querySelector('.ps-cart__items');
let cartTotal2 = document.querySelector('#total-cart');
let cartTotalElements2 = document.querySelector('#cart_total_elements');
let total2 = 0
let productsCount2 = 0;

let shoppingCart;

if (sessionStorage.getItem('cart') !== null) {
    shoppingCart = JSON.parse(sessionStorage.getItem('cart'))
    shoppingCart.forEach((product) => {
        const productElement = createElement('div', ['ps-product--mini-cart'])
        productElement.innerHTML = `
            <div class="ps-product__thumbnail"><a href="#"><img src="${product.image}" alt=""></a></div>
            <div class="ps-product__content"><span class="ps-btn--close"></span><a class="ps-product__title" href="product-default.html">${product.name}</a>
            <p><strong>Quantity: <span class="product_quantity">1</span></strong></p><small class="product_price">$${product.price}</small>
            </div>
    `
       
        total2 += parseInt(product.price * product.quantity)
        productsCount2++
        cartTotalElements2.textContent = productsCount2
        cartTotal2.textContent = '$' + total2;
        cartItemsContainer2.append(productElement)
    })

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

