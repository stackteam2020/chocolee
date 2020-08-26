const addToCartButtons = document.querySelectorAll('.ps-product__add-to-cart');
const cartItemsContainer = document.querySelector('.ps-cart__items');
let cartTotal = document.querySelector('#total-cart');
let cartTotalElements = document.querySelector('#cart_total_elements');
let productsCount = 0;
const productsArray = [];

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


    const productObject = {
        name: productName,
        image: productImage,
        price: productPrice,
        quantity: 1
    };

    console.log(productsArray)
    productElement.innerHTML = `
        <div class="ps-product__thumbnail"><a href="#"><img src="${productImage}" alt=""></a></div>
        <div class="ps-product__content"><span class="ps-btn--close"></span><a class="ps-product__title" href="product-default.html">${productName}</a>
        <p><strong>Quantity: <span class="product_quantity">1</span></strong></p><small class="product_price">$${productPrice}</small>
        </div>
    `

    total2 += parseInt(productPrice)
    productsCount2++
    cartTotalElements.textContent = productsCount2
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
    let removedProductName = removeBtn.closest('.cart-row').querySelector('.cart-item-title').textContent;
    // console.log(removedProductName)
    // console.log(removedProductName)
    let filteredProducts = productsArray.filter((product) => {
        return product.name != removedProductName
    })
    removeBtn.parentElement.parentElement.remove()
    productsArray = filteredProducts
    sessionStorage.setItem('cart', JSON.stringify(productsArray));
    updateCartTotal();
    sessionStorage.setItem('total', total);
    // console.log(cart)
}

appendElementsEventListener(addToCartButtons, 'click', addToCart);