const addToCartButtons = document.querySelectorAll('.ps-product__add-to-cart');
const cartItemsContainer = document.querySelector('.ps-cart__items');
let cartTotal = document.querySelector('#total-cart');
let cartTotalElements = document.querySelector('#cart_total_elements');
let productsCount = 0;
let productsArray = [];

let cartSession = JSON.parse(sessionStorage.getItem('cart'))
if (cartSession != null) {
    cartSession.forEach((product) => {
     
        const productObject = {
            name: product.name,
            image: product.image,
            price: product.price,
            quantity: product.quantity
        };
        productsArray.push(productObject);
        console.log(productsArray)
    })

}

function updateCartTotal() {
    const cartRows = cartItemsContainer.querySelectorAll('.ps-product--mini-cart');
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
    cartTotal.textContent = '$' + total;
    
    sessionStorage.setItem('total', total)
}


function addToCart(event) {
     const buttonParentDiv = event.target.closest('.ps-product');
     const productName = buttonParentDiv.querySelector('.ps-product__title').textContent;
     const productImage = buttonParentDiv.querySelector('.product_image').src;
     const productPrice = buttonParentDiv.querySelector('.ps-product__price').textContent.replace('$', '')
    const productElement = createElement('div', 'ps-product--mini-cart')
    const quantityInput = buttonParentDiv.querySelector('.quantity-input');
    const quantity = parseInt(quantityInput.value)
    const cartFooter = document.querySelector('.cart-figure');
    const cartCheckout = createElement('a', 'ps-btn', 'ps-btn--dark')

    const productObject = {
        name: productName,
        image: productImage,
        price: productPrice,
        quantity: quantity
    };

    productElement.innerHTML = `
        <div class="ps-product__thumbnail"><a href="#"><img src="${productImage}" alt=""></a></div>
        <div class="ps-product__content"><a class="ps-btn--close"></a><a class="ps-product__title" href="product-default.html">${productName}</a>
        <p><strong>Quantity: <span class="product_quantity">${quantity}</span></strong></p><small class="product_price">$${productPrice}</small>
        </div>
    `

    if(productsArray.length == 0) {
        cartCheckout.href='aaa.html'
        cartCheckout.innerHTML = 'checkout'
        cartFooter.append(cartCheckout)
    }
    const removeBtn = productElement.querySelector('.ps-btn--close')
    removeBtn.addEventListener('click', removeCartItem);
    // return
    total2 += Math.round(parseInt(productPrice * quantity) * 100) / 100
    sessionStorage.setItem('total', total2)
    productsCount2++
    cartTotalElements.textContent = productsCount2
    console.log(cartTotalElements)
    
    cartItemsContainer.append(productElement)
    productsArray.push(productObject)
    sessionStorage.setItem('cart', JSON.stringify(productsArray))
    updateCartTotal();
    
}



function appendElementsEventListener(documentElements, event, listener) {
    for (let i = 0; i < documentElements.length; i++) {
        const element = documentElements[i];
        element.addEventListener(event, listener)
    }
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


function removeCartItem(event) {
    const removeBtn = event.target
    // console.log(removeBtn.parentElement.parentElement)
    let removedProductName = removeBtn.nextSibling.textContent
    // console.log(removedProductName)
    let filteredProducts = productsArray.filter((product) => {
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
    console.log(cartContent)
    productsCount2--
    cartTotalElements2.textContent = productsCount2
    updateCartTotal();
    productsArray = filteredProducts
    sessionStorage.setItem('cart', JSON.stringify(productsArray));

}

appendElementsEventListener(addToCartButtons, 'click', addToCart);