console.log('cart1');
const removeItemFromCartButtons = document.querySelectorAll('.btn-danger');
const totalElement = document.querySelector('.cart-total-price');
const addToCartButtons = document.querySelectorAll('.shop-item-button');
const quantityInputs = document.querySelectorAll('.cart-quantity-input');
const cartItemsContainer = document.querySelector('.cart-items');
const purchaseButton = document.querySelector('.btn-purchase');
let productsArray = [];
let total = 0
// sessionStorage.clear()

let cartSession = JSON.parse(sessionStorage.getItem('cart'))
if (cartSession != null) {
    cartSession.forEach((product) => {
        const productElement = createElement('div', ['cart-row'])
        // let productRow = document.createElement('div')
        // productRow.classList.add('cart-row')
        productElement.innerHTML = `
        <div class="cart-item cart-column">
        <img class="cart-item-image" src="${product.image}" width="100" height="100">
        <span class="cart-item-title">${product.name}</span>
        </div>
        <span class="cart-price cart-column">$${product.price}</span>
        <div class="cart-quantity cart-column">
            <input class="cart-quantity-input" type="number" min=1 value="${product.quantity}">
            <button class="btn btn-danger" type="button">REMOVE</button>
        </div>
        `
        productElement.querySelector('.cart-quantity-input').addEventListener('change', updateCartTotal);
        productElement.querySelector('.btn-danger').addEventListener('click', removeCartItem);
        console.log(cartItemsContainer);
        cartItemsContainer.append(productElement)
        const productObject = {
            name: product.name,
            image: product.image,
            price: product.price,
            quantity: product.quantity
        };
        productsArray.push(productObject);
        updateCartTotal()
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


function appendElementsEventListener(documentElements, event, listener) {
    for (let i = 0; i < documentElements.length; i++) {
        const element = documentElements[i];
        element.addEventListener(event, listener)
    }
}


appendElementsEventListener(removeItemFromCartButtons, 'click', removeCartItem);
appendElementsEventListener(quantityInputs, 'change', updateCartTotal);
appendElementsEventListener(addToCartButtons, 'click', addToCart);



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

function updateCartTotal() {
    console.log(productsArray)
    const cartRows = cartItemsContainer.querySelectorAll('.cart-row');
    let totalElementValue = document.querySelector('.cart-total-price');
     total = 0;

    for (let i = 0; i < cartRows.length; i++) {
        const cartRow = cartRows[i];
        const priceElement = cartRow.querySelector('.cart-price');
        console.log(priceElement);
        const quantityElement = cartRow.querySelector('.cart-quantity-input');
        let price = priceElement.textContent.replace('$', '');
        let quantity = parseInt(quantityElement.value);
        console.log(price, quantity)
        total += price * quantity;
        productsArray[i]['quantity'] = quantity;
    }

    total = Math.round(total * 100) / 100
    // console.log(total);
    totalElementValue.textContent = '$' + total;
    sessionStorage.setItem('cart', JSON.stringify(productsArray))
    sessionStorage.setItem('total', total)
}



function addToCart(event) {
    const buttonParentDiv = event.target.closest('.shop-item');
    const productName = buttonParentDiv.querySelector('.shop-item-title').textContent;
    const productImage = buttonParentDiv.querySelector('.shop-item-image').src;
    const productPrice = buttonParentDiv.querySelector('.shop-item-price').textContent.replace('$', '')
    const productElement = createElement('div', 'cart-row')

    const productObject = {
        name: productName,
        image: productImage,
        price: productPrice,
        quantity: 1
    };
    productsArray.push(productObject);
    console.log(productsArray)
    productElement.innerHTML = `
    <div class="cart-item cart-column">
        <img class="cart-item-image" src="${productImage}" width="100" height="100">
        <span class="cart-item-title">${productName}</span>
    </div>
    <span class="cart-price cart-column">${productPrice}</span>
    <div class="cart-quantity cart-column">
        <input class="cart-quantity-input" type="number" min=1 value="1">
        <button class="btn btn-danger" type="button">REMOVE</button>
    </div>
    `;
    productElement.querySelector('.cart-quantity-input').addEventListener('change', updateCartTotal);
    productElement.querySelector('.btn-danger').addEventListener('click', removeCartItem);
    cartItemsContainer.append(productElement);
    updateCartTotal();
    sessionStorage.setItem('cart', JSON.stringify(productsArray))
    sessionStorage.setItem('total', total)
}

purchaseButton.addEventListener('click', proceedToCheckout);

function proceedToCheckout() {
    // let cartSession = sessionStorage.setItem('cart', JSON.stringify(productsArray));
    let cartTotal = sessionStorage.setItem('total', total);

    window.location.href = 'checkout';
}



