(function()
{
var form=document.querySelector("#form"),
    emailField=form.querySelector("input[name='email']"),
    nameField=form.querySelector("input[name='name']"),
    messageField=form.querySelector("textarea[name='message']")

form.addEventListner("submit",function(e){

e.preventDefault();

var errors=[];

if (emailField.value.indexOf("@") === -1) {
  errors.push("Podaj poprawny adres e-mail .");
  emailField.classList.add("znacznik");


}

},false)

})();
