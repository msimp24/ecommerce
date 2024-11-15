$(document).ready(() => {
  //add item to a cart
  $('#cart-btn').click(() => {
    let productName = $('#product-name').text()
    let price = $('#price').text()
    let id = $('#product-id').val()
    let quantity = 1

    if (productName == '' || price == '') {
      return false
    }

    $.ajax({
      type: 'POST',
      url: '../ecommerce/cart-actions.php',
      data: {
        action: 'add',
        productName,
        price,
        quantity,
        id,
      },
      cache: false,
      success: function (data) {
        $('.cart-updated').css('display', 'flex')
        setTimeout(() => {
          $('.cart-updated').hide()
        }, 2000)
      },
      error: function (xhr, status, error) {
        console.log(error)
      },
    })
  })
})

//onclick function to handle removal of item from a cart.
$('.fa-trash').click(() => {
  let id = $('.fa-trash').attr('id') // Try using .data()
  $.ajax({
    type: 'POST',
    url: '../ecommerce/cart-actions.php',
    data: { action: 'delete', id: id },
    cache: false,
    success: function (response) {
      location.reload()
    },
    error: function (xhr, status, error) {
      console.log(error)
    },
  })
})

$('').click(() => {
  $.ajax({
    type: 'POST',
    url: '../ecommerce/cart-actions.php',
    data: { action: 'substract' },
    cache: false,
    success: function (response) {
      location.reload()
    },
    error: function (xhr, status, error) {
      console.log(error)
    },
  })
})

//close added cart div
$('#close').click(() => {
  $('.cart-updated').hide()
})
