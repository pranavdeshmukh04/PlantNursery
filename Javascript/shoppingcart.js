
// var addToCartButtons = document.getElementsByClassName('shop-item-button')
// for(var i=0; i<addToCartButtons.length; i++){
//     var button = addToCartButtons[i]
//     button.addEventListener('click', addToCartClicked)
// }

// function addToCartClicked(event) {
//     var button = event.target
//     var shopItem = button.parentElement.parentElement
//     var title = shopItem.getElementsByClassName('shop-item-title')[0].innerText
//     var price = shopItem.getElementsByClassName('shop-item-price')[0].innerText
//     var imageSrc = shopItem.getElementsByClassName('shop-item-image')[0].src
//     updateCartTotal()
// }

var quantityInputs = document.getElementsByClassName('cart-quantity-input')
for(var i = 0; i < quantityInputs.length; i++){
    var input = quantityInputs[i]
    input.addEventListener('change', quantityChanged)
}
function quantityChanged(event){
    var input = event.target
    if(isNaN(input.value) || input.value <= 0){
        input.value = 1
    }
    updateCartTotal()
}

var deliveryElement = document.getElementsByName('radio')
    for(var i=0; i<deliveryElement.length; i++){
        var element = deliveryElement[i]
        element.addEventListener('change', deliveryChanged)
    }
    function deliveryChanged(event){
        var input = event.target
        updateCartTotal()
}

function updateCartTotal(){
    var cartItemContainer = document.getElementsByClassName('cart-items')[0]
    var cartRows = cartItemContainer.getElementsByClassName('cart-row')
    var total = 0
    var count = 0
    for(var i = 0; i < removeCartItemButtons.length; i++){
        var cartRow = cartRows[i]
        var priceElement = cartRow.getElementsByClassName('cart-price')[0]
        var quantityElement = cartRow.getElementsByClassName('cart-quantity-input')[0]
        var price = parseFloat(priceElement.innerText.replace('Rs.',''))
        var quantity = parseFloat(quantityElement.value)
        total = total + (price*quantity)
        count = count + quantity
    }
    if(count == 1){
        document.getElementsByClassName('no-of-items-text')[0].innerText = count + " Item"
        document.getElementsByClassName('item-no-text')[0].innerText = "ITEM " + count
    } else{
        document.getElementsByClassName('no-of-items-text')[0].innerText = count + " Items"
    document.getElementsByClassName('item-no-text')[0].innerText = "ITEMS " + count
    }
    
    document.getElementsByClassName('cart-total-price')[0].innerText = 'Rs.' + total
    var deliveryElement = document.getElementsByName('radio')
    var standardDelivery = parseFloat(deliveryElement[0].value);
    var fastDelivery = parseFloat(deliveryElement[1].value);
    var totalCost = 0
    if(deliveryElement[0].checked)
        totalCost = total + standardDelivery
    if(deliveryElement[1].checked)
        totalCost = total + fastDelivery
    if(count == 0)
        totalCost = 0
    document.getElementsByClassName('total-cost-price')[0].innerText = 'Rs.' + totalCost
}

