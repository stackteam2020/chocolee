let csrf_token = document.getElementsByName('csrf-token')[0].content
const catrElement = document.querySelector('.ps-cart--mini')
const cart = JSON.parse(sessionStorage.getItem('cart'))
console.log(cart)
const tBody = document.querySelector('#table-body')
catrElement.remove()
const formDiv = document.querySelector('.ps-checkout__left')
let total = 0

let checkoutProductsArray = []

console.log(cart.length)
if (cart.length > 0) {
cart.forEach((product) => {
    const checkoutProductObject = {
        name : product.name,
        image: product.image,
        price: product.price,
        quantity: product.quantity
    }
    checkoutProductsArray.push(checkoutProductObject)
});




cart.forEach((product) => {
    const tableRow = createElement('tr');
    tableRow.innerHTML = `
    <td>
    <div class="ps-product--cart">
        <div class="ps-product__thumbnail"><img src="${product.image}" alt=""><a class="ps-product__overlay" href="product-detail.html"></a></div>
        <div class="ps-product__content"><a class="ps-product__title" href="product-detail.html">${product.name}</a></div>
    </div>
    </td>
    <td>$${product.price}</td>
    <td>
    <div class="form-group--number">
        <button class="up"></button>
        <button class="down"></button>
        <input class="form-control" type="text" placeholder="1" value="${product.quantity}">
    </div>
    </td>
    <td class="total">$${product.quantity * product.price}</td>
    <td class="ps-table__actions"><a class="ps-btn--close" href="#"></a></td>
    `
    tableRow.querySelector('.ps-btn--close').addEventListener('click', removeCartItem)
    tBody.append(tableRow)
    total+= Math.round((product.quantity * product.price) * 100) / 100
})

const cartDiv = createElement('figure', 'ps-shopping-cart__total')
cartDiv.innerHTML = `
<figcaption>Cart Total</figcaption>
<table class="table">
  <tr>
    <td>SubTotal</td>
    <td><strong id="subtotal">$48.00</strong></td>
  </tr>
  <tr>
    <td>Shipping</td>
    <td>
      <div class="ps-radio">
        <input class="form-control" type="radio" id="shipping-1" name="shipping"/>
        <label for="shipping-1">Flat Rate: $50.00 </label>
      </div>
      <div class="ps-radio">
        <input class="form-control" type="radio" id="shipping-2" name="shipping"/>
        <label for="shipping-2">Free Shipping Estimate for Vietnam. </label>
      </div>
    </td>
  </tr>
  <tr class="total" id="checkout-total">
    <td>Total</td>
    <td>$48.00</td>
  </tr>
</table>
`

document.querySelector('.ps-checkout').append(cartDiv)
let checkoutTotal = document.querySelector('#checkout-total')
let subTotal = document.querySelector('#subtotal')
subTotal.textContent = '$' + total
checkoutTotal.children[1].textContent = '$' + total

const input = createElement('input');
    input.type = 'hidden';
    input.name = 'cart';
    input.value = JSON.stringify(cart);

const checkoutForm = createElement('form', 'ps-form--checkout')
checkoutForm.innerHTML = `
    <h4>Billing Detail</h4>
    <input type="hidden" value="${csrf_token}" name="_token">   
    <div class="row">
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
        <div class="form-group">
        <label>First Name</label>
        <input class="form-control" name="name" type="text" placeholder="Enter Your Name">
        </div>
    </div>
    
    </div>
    
    <div class="form-group">
    <label>Address</label>
    <input class="form-control" name="address" type="text" placeholder="Enter Your Address">
    </div>
    
    <div class="row">
    
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
        <div class="form-group">
        <label>Phone</label>
        <input class="form-control" type="text" name="phone" placeholder="Enter Your Phone">
        </div>
    </div>
    </div>
    <button class="ps-btn ps-btn--fullwidth">Checkout</button>
             `

checkoutForm.action = '/checkout'
checkoutForm.method = 'post'
checkoutForm.append(input)
formDiv.append(checkoutForm)

}

function removeCartItem(event) {
    const removedProductName = event.target.parentElement.parentElement.querySelector('.ps-product__title').textContent
    const itemRow = event.target.parentElement.parentElement.remove()
    const itemPrice = parseInt(event.target.parentElement.previousElementSibling.textContent.replace('$', ''))
    total-=itemPrice
    let filteredProducts = checkoutProductsArray.filter((product) => {
        return product.name != removedProductName
    })
    
    sessionStorage.setItem('cart', JSON.stringify(filteredProducts))
    checkoutProductsArray = filteredProducts
    console.log(checkoutProductsArray)
    updateCheckoutCart()
    if (filteredProducts.length < 1) {
        document.querySelector('.ps-shopping-cart__total').remove()
        document.querySelector('.ps-form--checkout').remove()
        // checkoutForm.remove()
        console.log('a')
    }
}

function updateCheckoutCart() {
    document.querySelector('#subtotal').textContent = '$' + total
    document.querySelector('#checkout-total').children[1].textContent = '$' + total
}
