document.addEventListener(
    "DOMContentLoaded",
    function () {
        const modalSection = document.getElementById("transfer-modal");
        const formEditMoney = document.querySelector("[form-edit-money]");
        if (formEditMoney) {
            const editFormSubmitBtn = document.querySelector("[edit-form-submit]");

            editFormSubmitBtn.addEventListener("click", (_) => {
                if (document.getElementById("edit-amount").value > 1000) {
                    document.getElementById("transfer-modal").style.display =
                        "block";

                    modalSection
                        .querySelectorAll("[btn-close]")
                        .forEach((x) => {
                            x.addEventListener("click", (_) => {
                                modalSection.style.display = "none";
                            });
                        });

                    modalSection
                        .querySelector("[btn-next]")
                        .addEventListener("click", (_) => {
                            modalSection.style.display = "none";
                            document
                                .querySelector("[form-edit-money]")
                                .submit();
                        });
                } else {
                    document.querySelector("[form-edit-money]").submit();
                }
            });
        }
    },
    false
);
