let csrf_token = document.getElementsByName('csrf-token')[0].content
let cart = JSON.parse(sessionStorage.getItem("cart"));
let total = sessionStorage.getItem("total");

function createElement(element, ...cssClasses) {
    const newElement = document.createElement(element);
    if (cssClasses.length != 0) {
        cssClasses.forEach((cssclass) => {
            newElement.classList.add(cssclass)
        })
        
    }
    
    return newElement
}


if (cart) {
    const body = document.getElementById('body')
    let cartDiv = createElement('section', 'container', 'content-section');

    cartDiv.innerHTML = `
    <h2 class="section-header">CART</h2>
    <div class="cart-row">
    <span class="cart-item cart-header cart-column">ITEM</span>
    <span class="cart-price cart-header cart-column">PRICE</span>
    <span class="cart-quantity cart-header cart-column">QUANTITY</span>
    </div>
    <div class="cart-items">

    </div>
    <div class="cart-total">
    <strong class="cart-total-title">Total</strong>
    <span class="cart-total-price">$${total ? total : '0'}</span>
    </div>
    <button class="btn btn-primary btn-purchase" type="button">PURCHASE</button>
    `;

    body.append(cartDiv)
    const cart_items = body.querySelector('.cart-items');

    cart.forEach((product) => {
        const product_div = createElement('div', 'cart-row');
        product_div.innerHTML = `
        <div class="cart-item cart-column">
        <img class="cart-item-image" src="${product.image}" width="100" height="100">
        <span class="cart-item-title">${product.name}</span>
        </div>
        <span class="cart-price cart-column">${product.price}</span>
        <div class="cart-quantity cart-column">
        <input class="cart-quantity-input" readonly min=1 value="${product.quantity}">
        </div>
        `
        
        cart_items.append(product_div);
    })





    const form = createElement('form');
    const input = createElement('input');
    const input2 = createElement('input');
    input.type = 'hidden';
    input.name = 'cart';
    input.value = JSON.stringify(cart);
    form.action = '/checkout/done';
    form.method = 'post'
    input2.name = "_token"
    input2.value = csrf_token
    form.innerHTML = `
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" name="user_name">
        </div>
        <div class="form-group">
            <label for="">Phone</label>
            <input type="text" class="form-control" name="user_phone">
        </div>
        <div class="form-group">
            <label for="">Address</label>
            <input type="text" class="form-control" name="user_address">
        </div>

        <button class="btn btn-success" id="submit-btn">Submit</button>
    `

    
    form.append(input2);
    form.append(input);
    body.append(form)
    const submitBtn = form.querySelector('#submit-btn');
    submitBtn.addEventListener('click', submitFormHandler);
    function submitFormHandler(event) {
        const formInputs = form.querySelectorAll('input.form-control')
        formInputs.forEach((input) => {
            if (input.value == '') {
                input.classList.add('alert-danger')
                event.preventDefault()
            }
        })
        sessionStorage.clear();
    }

}


