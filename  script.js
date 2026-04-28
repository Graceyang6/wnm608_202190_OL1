
const toggle = document.querySelector(".nav-toggle");
const navLinks = document.querySelector(".nav-links");

toggle?.addEventListener("click", () => {
  navLinks.classList.toggle("open");
});

document.getElementById("year") &&
  (document.getElementById("year").textContent = new Date().getFullYear());




let allProducts = [];
let currentFilter = "all";
let currentSort = "default";

const productList = document.getElementById("product-list");
const searchInput = document.getElementById("search-input");
const sortSelect = document.getElementById("sort-select");
const filterButtons = document.querySelectorAll(".filter-btn");




async function loadProducts() {
  try {
    const res = await fetch("api.php");
    const data = await res.json();

    allProducts = data;
    renderProducts(allProducts);
  } catch (err) {
    console.error(err);
    productList.innerHTML = "<p>Failed to load products</p>";
  }
}




function renderProducts(products) {
  if (!products.length) {
    productList.innerHTML = "<p>No products found.</p>";
    return;
  }

  productList.innerHTML = products.map(p => `
    <a class="product-card" href="product.php?id=${p.id}">
      <img src="images/${p.image}" alt="${p.title}">
      <h3>${p.title}</h3>
      <p>$${Number(p.price).toFixed(2)}</p>
    </a>
  `).join("");
}




function updateProducts() {
  let filtered = [...allProducts];

  
  const searchValue = searchInput.value.toLowerCase();
  filtered = filtered.filter(p =>
    p.title.toLowerCase().includes(searchValue)
  );

  
  if (currentFilter !== "all") {
    filtered = filtered.filter(p =>
      p.category.toLowerCase() === currentFilter
    );
  }


  if (currentSort === "low") {
    filtered.sort((a, b) => a.price - b.price);
  } else if (currentSort === "high") {
    filtered.sort((a, b) => b.price - a.price);
  } else if (currentSort === "az") {
    filtered.sort((a, b) => a.title.localeCompare(b.title));
  } else if (currentSort === "za") {
    filtered.sort((a, b) => b.title.localeCompare(a.title));
  }

  renderProducts(filtered);
}




searchInput?.addEventListener("input", updateProducts);

sortSelect?.addEventListener("change", (e) => {
  currentSort = e.target.value;
  updateProducts();
});

filterButtons.forEach(btn => {
  btn.addEventListener("click", () => {
    currentFilter = btn.dataset.filter;

    filterButtons.forEach(b => b.classList.remove("active"));
    btn.classList.add("active");

    updateProducts();
  });
});




function updateCartCount() {
  let cart = JSON.parse(localStorage.getItem("cart")) || [];
  let el = document.getElementById("cart-count");

  if (el) {
    el.textContent = cart.length;
  }
}




loadProducts();
updateCartCount();














