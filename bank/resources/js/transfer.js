// setTimeout(() => {
//     const formSubmitBtn = document.querySelector('[transfer-form-btn]');
//     formSubmitBtn.addEventListener("click", (_) => {
//         alert("hello");
//     });
// }, 2000);

// const modalSection =  document.getElementById('transfer-modal');
document.addEventListener(
    "DOMContentLoaded",
    function () {
        const formSubmitBtn = document.querySelector("[transfer-form-btn]");
        const modalSection = document.getElementById("transfer-modal");

        formSubmitBtn.addEventListener("click", (_) => {
            if (document.getElementById("transfer-amount").value > 1000) {
                document.getElementById("transfer-modal").style.display =
                    "block";

                modalSection.querySelectorAll("[btn-close]").forEach((x) => {
                    x.addEventListener("click", (_) => {
                        modalSection.style.display = "none";
                    });
                });

                modalSection
                    .querySelector('[btn-next]')
                    .addEventListener("click", (_) => {
                        modalSection.style.display = "none";
                        document.querySelector("[my-form]").submit();
                    });
            } else {
                document.querySelector("[my-form]").submit();
            }
        });
    },
    false
);
