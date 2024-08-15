
// Twinkle

// const searchBox = document.getElementById('searchBox');
// const resultsContainer = document.getElementById('results');
// const products = document.querySelectorAll('.product-item');

// searchBox.addEventListener('input', function () {
//   const query = this.value.toLowerCase();
//   resultsContainer.innerHTML = '';

//   if (query.length > 0) {
//     const filteredProducts = Array.from(products).filter(product => product.dataset.name.toLowerCase().includes(query));
//     if (filteredProducts.length > 0) {
//       filteredProducts.forEach(product => {
//         const resultItem = document.createElement('div');
//         resultItem.classList.add('result-item');
//         resultItem.innerHTML = `<img src="${product.querySelector('img').src}" alt="${product.dataset.name}"><div>${product.dataset.name}</div>`;
//         resultItem.addEventListener('click', function () {
//           // Redirect to the product details page
//           const productName = product.dataset.name.toLowerCase().replace(/\s/g, '-');
//           window.location.href = `product-details.html?product=${productName}`;
//         });
//         resultsContainer.appendChild(resultItem);
//       });
//     } else {
//       resultsContainer.innerHTML = '<div class="result-item">No results found</div>';
//     }
//   }
// });

document.addEventListener('DOMContentLoaded', function () {
  const searchBox = document.getElementById('searchBox');
  const resultsContainer = document.getElementById('results');

  searchBox.addEventListener('input', function () {
    const query = this.value.toLowerCase();
    resultsContainer.innerHTML = '';

    if (query.length > 0) {
      fetch(`/search?query=${query}`)
        .then(response => response.json())
        .then(products => {
          if (products.length > 0) {
            products.forEach(product => {
              const resultItem = document.createElement('div');
              resultItem.classList.add('result-item');
              resultItem.innerHTML = `
                <img src="${product.image_url}/${product.image}" alt="${product.name}">
                <div>${product.name}</div>`;
              resultItem.addEventListener('click', function ( ) {
                // Redirect to the product details page
                const productName = product.name.toLowerCase().replace(/\s/g, '-');
                window.location.href = `product-details.html?product=${productName}`;
              });
              resultsContainer.appendChild(resultItem);
            });
          } else {
            resultsContainer.innerHTML = '<div class="result-item">No results found</div>';
          }
        })
        .catch(error => {
          console.error('Error fetching products:', error);
          resultsContainer.innerHTML = '<div class="result-item">Error fetching results</div>';
        });
    }
  });
});


// on this code update face the data in Laravel database and show the foreche loop  


// Load More

document.addEventListener("DOMContentLoaded", function () {
  const load = document.querySelector(".load-more");
  const hide = document.querySelector(".hidden-page");


  if (load) {
    load.addEventListener("click", function (event) {
      event.preventDefault();
      hide.style.display = "block";
      load.style.display = "none";
    });
  }


});

//shipping-product-increase-decrease-i tag
const plus = document.getElementsByClassName("plus");
const minus = document.getElementsByClassName("minus");
let changeNum = document.getElementsByClassName("items");

const getNumber = (index) => {
  let num = changeNum[index].innerHTML;
  return parseInt(num)
}
function main() {
  let element = Array.from(plus)
  console.log(element);

  for (let i = 0; i < element.length; i++) {
    plus[i].addEventListener("click", function () {
      let num = getNumber(i)
      num++;
      changeNum[i].innerHTML = num.toString();
    });
  }


  for (let i = 0; i < element.length; i++) {
    minus[i].addEventListener("click", function () {
      let num = getNumber(i);
      if (num > 0) {
        num--;
        changeNum[i].innerHTML = num.toString();
      }
    });
  }
}
main()

/*

  plus.addEventListener("click", () => {
    let num = parseInt(changeNum.innerHTML)
    num ++;
    changeNum.innerHTML = num.toString();
  });

  minus.addEventListener("click", () => {
    let num = parseInt(changeNum.innerHTML);
    if(num > 0) {
      num--;
      changeNum.innerHTML = num.toString();
    }
  });

*/

