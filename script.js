let product_name = document.getElementById("product_name");
let quantity = document.getElementById("quantity");
let customer_name = document.getElementById("customer_name");
let email = document.getElementById("email");
let phone = document.getElementById("phone");
let submitBtn = document.getElementById("submit-btn");

let users = {};

function User(product_name, quantity, customer_name, email, phone) {
  this.product_name = product_name;
  this.quantity = quantity;
  this.customer_name = customer_name;
  this.email = email;
  this.phone = phone;
}

function createID() {
  return Object.keys(users).length;
}

submitBtn.addEventListener("click", () => {
  const product_nameuser = product_name.value;
  const quantityuser = quantity.value;
  const customer_nameuser = customer_name.value;
  const emailuser = email.value;
  const phoneuser = phone.value;

  const user = new User(
    product_nameuser,
    quantityuser,
    customer_nameuser,
    emailuser,
    phoneuser
  );

  const userID = "User" + createID();
  users[userID] = user;

  console.log(users);

  alert(`${customer_nameuser}, вы успешно добавили в корзину!`);
});
