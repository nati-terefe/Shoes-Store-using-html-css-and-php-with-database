const bodies = document.querySelectorAll('.body1, .body2, .body3, .body4, .body5, .body6, .body7, .body8, .body9, .body10, .body11, .body12, .body13, .body14, .body15, .body16, .body17, .body18, .body19, .body20, .body21, .body22, .body23, .body24, .body25, .body26, .body27, .body28, .body29, .body30, .body31, .body32, .body33, .body34, .body35, .body36');

bodies.forEach((body) => {
  body.addEventListener('click', () => {
    const productHTML = `
      <html>
      <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product</title>
        <link rel="stylesheet" href="product.css">
      </head>
      <body>
        <div class="product">
          <img src="${body.dataset.image}" alt="Product Image">
          <div class="buttons">
            <button class="buy-button">Buy</button>
            <button class="add-to-cart-button">Add to Cart</button>
          </div>
        </div>
        <script src="product.js"></script>
      </body>
      </html>
    `;
    
    const productFile = new Blob([productHTML], { type: 'text/html' });
    const productURL = URL.createObjectURL(productFile);
    window.open(productURL);
  });
});
