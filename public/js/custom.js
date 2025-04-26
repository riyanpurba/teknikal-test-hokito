"use strict";

document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".alert-dismissible .close").forEach(function(button) {
        button.addEventListener("click", function() {
            const alertBox = button.closest(".alert-dismissible");
            if (alertBox) {
                alertBox.remove(); // remove alert dari DOM
            }
        });
    });
});
