/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!*******************************************************!*\
  !*** ../src/js/custom/documentation/forms/select2.js ***!
  \*******************************************************/


// Class definition
var KTFormsSelect2Demo = function () {
    // Private functions
    var exampleCountry = function () {
        // Format options
        const format = (item) => {
            if (!item.id) {
                return item.text;
            }

            var url = 'assets/media/' + item.element.getAttribute('data-kt-select2-country');
            var img = $("<img>", {
                class: "rounded-circle me-2",
                width: 26,
                src: url
            });
            var span = $("<span>", {
                text: " " + item.text
            });
            span.prepend(img);
            return span;
        }

        // Init Select2 --- more info: https://select2.org/
        $('#kt_docs_select2_country').select2({
            templateResult: function (item) {
                return format(item);
            }
        });
    }

    const exampleUsers = function () {
        // Format options
        const format = (item) => {
            if (!item.id) {
                return item.text;
            }

            var url = 'assets/media/' + item.element.getAttribute('data-kt-select2-User');
            var img = $("<img>", {
                class: "rounded-circle me-2",
                width: 26,
                src: url
            });
            var span = $("<span>", {
                text: " " + item.text
            });
            span.prepend(img);
            return span;
        }

        // Init Select2 --- more info: https://select2.org/
        $('#kt_docs_select2_users').select2({
            templateResult: function (item) {
                return format(item);
            }
        });
    }

    return {
        // Public Functions
        init: function () {
            exampleCountry();
            exampleUsers();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTFormsSelect2Demo.init();
});

/******/ })()
;
//# sourceMappingURL=select2.js.map
