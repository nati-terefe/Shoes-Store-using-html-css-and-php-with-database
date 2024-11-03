
////////////////////////  product page loader //////////////////////////////
document.addEventListener("DOMContentLoaded", function() {
  var grids = document.querySelectorAll(".body1, .body2, .body3, .body4, .body5, .body6, .body7, .body8, .body9, .body10, .body11, .body12, .body13, .body14, .body15, .body16, .body17, .body18, .body19, .body20, .body21, .body22, .body23, .body24, .body25, .body26, .body27, .body28, .body29, .body30, .body31, .body32, .body33");

  for (var i = 0; i < grids.length; i++) {
    grids[i].addEventListener("click", function() {
      var className = this.className;
      var backgroundImage = getComputedStyle(this).getPropertyValue("background-image");

      if (backgroundImage !== "none") {
        var bgImage = backgroundImage.match(/url\(["']?(.*?)["']?\)/)[1];
        localStorage.setItem("selectedBgImage", bgImage);
        window.open("product.php", "_blank");
      }
    });
  }
});




///////////////////////////////////// filter code ///////////////////////////
document.addEventListener('DOMContentLoaded', function() {
const filterButtons = document.querySelectorAll('.filter-button');
const colorButtons = document.querySelectorAll('.color-button');
const bodies = document.querySelectorAll('[class^="body"]');

// Filter shoes based on the selected category
filterButtons.forEach(function(button) {
  button.addEventListener('click', function() {
    const category = button.dataset.category;

    bodies.forEach(function(body) {
      const bodyCategories = body.dataset.category.split(' ');

      if (category === 'all' || bodyCategories.includes(category)) {
        body.style.display = 'block';
      } else {
        body.style.display = 'none';
      }
    });

    filterButtons.forEach(function(btn) {
      btn.classList.remove('active');
    });
    button.classList.add('active');
  });
});

// Filter shoes based on the selected color
colorButtons.forEach(function(button) {
  button.addEventListener('click', function() {
    const color = button.dataset.color;

    bodies.forEach(function(body) {
      const bodyColor = body.dataset.color;

      if (color === 'all' || bodyColor === color) {
        body.style.display = 'block';
      } else {
        body.style.display = 'none';
      }
    });

    colorButtons.forEach(function(btn) {
      btn.classList.remove('active');
    });
    button.classList.add('active');
  });
});
});


///////////////////////////////////// cart system code /////////////////////////////
document.getElementById("addToCartButton").addEventListener("click", function() {
  // Increment the cart counter
  var cartCounter = document.querySelector(".cart-counter");
  var currentCount = parseInt(cartCounter.textContent);
  cartCounter.textContent = currentCount + 1;
//   the counter can be stored in a database
})

function cart(num) {
  if(num==1){
      let params = `scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,
                  width=779.429px,height=321px,left=300%,top=200%%`;
  window.open('http://localhost/Final%20Project/User%20Cart/usercart.php', 'Your Cart', params);
  }
  else{
      alert("Login Required");
      window.location.href = "Log-in soe - Copy/index.php";
  }
}
function settingaccount(num) {
  if(num==1){
      window.location.href = "Account%20Setting/accountset.php";
  }
  else{
      alert("Login Required");
      window.location.href = "Log-in soe - Copy/index.php";
  }
}
