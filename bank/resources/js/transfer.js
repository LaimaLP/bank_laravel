// setTimeout(() => {
//     const formSubmitBtn = document.querySelector('[transfer-form-btn]');
//     formSubmitBtn.addEventListener("click", (_) => {
//         alert("hello");
//     });
// }, 2000);



document.addEventListener('DOMContentLoaded', function() {
    const formSubmitBtn = document.querySelector('[transfer-form-btn]');
    formSubmitBtn.addEventListener("click", (_) => {
        if(document.getElementById('transfer-amount').value > 1000){
            alert("ne");
        }else{
        document.querySelector('[my-form]').submit();
        }
    });
}, false);