(self["webpackChunk"] = self["webpackChunk"] || []).push([["js/ad"],{

/***/ "./assets/js/ad.js":
/*!*************************!*\
  !*** ./assets/js/ad.js ***!
  \*************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

__webpack_require__(/*! core-js/modules/es.regexp.exec.js */ "./node_modules/core-js/modules/es.regexp.exec.js");

__webpack_require__(/*! core-js/modules/es.string.replace.js */ "./node_modules/core-js/modules/es.string.replace.js");

$('#add-image').click(function () {
  // Je récupére le numéro des futures champs que je vais Créer
  //alert('ok');
  var index = +$('#widgets-counter').val(); //console!;log(index);
  // je récupérer le prototype des entrées

  var tmpl = $('#ad_images').data('prototype').replace(/__name__/g, index); //alert(tmpl);
  // J'injecte ce code au sein de la div

  $('#ad_images').append(tmpl);
  $('#widgets-counter').val(index + 1); //Je gére le button supprimer

  handleDeleteButtons();
});

function handleDeleteButtons() {
  $('button[data-action="delete"]').click(function () {
    var target = this.dataset.target; //console!;log(target);

    $(target).remove();
  });

  function updateCounter() {
    var count = +$('#ad_images div.form-group').length;
    $('#widgets-counter').val(count);
  }

  updateCounter();
}

handleDeleteButtons();

/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_core-js_modules_es_string_replace_js"], () => (__webpack_exec__("./assets/js/ad.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoianMvYWQuanMiLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7Ozs7O0FBQ0VBLENBQUMsQ0FBQyxZQUFELENBQUQsQ0FBZ0JDLEtBQWhCLENBQXNCLFlBQVk7QUFDeEI7QUFDQTtBQUNBLE1BQU1DLEtBQUssR0FBRyxDQUFDRixDQUFDLENBQUMsa0JBQUQsQ0FBRCxDQUFzQkcsR0FBdEIsRUFBZixDQUh3QixDQUl4QjtBQUNBOztBQUVBLE1BQU1DLElBQUksR0FBR0osQ0FBQyxDQUFDLFlBQUQsQ0FBRCxDQUFnQkssSUFBaEIsQ0FBcUIsV0FBckIsRUFBa0NDLE9BQWxDLENBQTBDLFdBQTFDLEVBQXVESixLQUF2RCxDQUFiLENBUHdCLENBUXhCO0FBQ0E7O0FBRUFGLEVBQUFBLENBQUMsQ0FBQyxZQUFELENBQUQsQ0FBZ0JPLE1BQWhCLENBQXVCSCxJQUF2QjtBQUVBSixFQUFBQSxDQUFDLENBQUMsa0JBQUQsQ0FBRCxDQUFzQkcsR0FBdEIsQ0FBMEJELEtBQUssR0FBRyxDQUFsQyxFQWJ3QixDQWV4Qjs7QUFDQU0sRUFBQUEsbUJBQW1CO0FBQ2xCLENBakJYOztBQW1CVSxTQUFTQSxtQkFBVCxHQUE4QjtBQUMxQlIsRUFBQUEsQ0FBQyxDQUFDLDhCQUFELENBQUQsQ0FBa0NDLEtBQWxDLENBQXdDLFlBQVU7QUFDOUMsUUFBTVEsTUFBTSxHQUFHLEtBQUtDLE9BQUwsQ0FBYUQsTUFBNUIsQ0FEOEMsQ0FFOUM7O0FBQ0FULElBQUFBLENBQUMsQ0FBQ1MsTUFBRCxDQUFELENBQVVFLE1BQVY7QUFDSCxHQUpEOztBQU1BLFdBQVNDLGFBQVQsR0FBd0I7QUFDcEIsUUFBTUMsS0FBSyxHQUFHLENBQUNiLENBQUMsQ0FBQywyQkFBRCxDQUFELENBQStCYyxNQUE5QztBQUVBZCxJQUFBQSxDQUFDLENBQUMsa0JBQUQsQ0FBRCxDQUFzQkcsR0FBdEIsQ0FBMEJVLEtBQTFCO0FBQ0g7O0FBRURELEVBQUFBLGFBQWE7QUFDaEI7O0FBQ0RKLG1CQUFtQiIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL2Fzc2V0cy9qcy9hZC5qcyJdLCJzb3VyY2VzQ29udGVudCI6WyJcdFx0XG5cdFx0JCgnI2FkZC1pbWFnZScpLmNsaWNrKGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgIC8vIEplIHLDqWN1cMOpcmUgbGUgbnVtw6lybyBkZXMgZnV0dXJlcyBjaGFtcHMgcXVlIGplIHZhaXMgQ3LDqWVyXG4gICAgICAgICAgICAvL2FsZXJ0KCdvaycpO1xuICAgICAgICAgICAgY29uc3QgaW5kZXggPSArJCgnI3dpZGdldHMtY291bnRlcicpLnZhbCgpO1xuICAgICAgICAgICAgLy9jb25zb2xlITtsb2coaW5kZXgpO1xuICAgICAgICAgICAgLy8gamUgcsOpY3Vww6lyZXIgbGUgcHJvdG90eXBlIGRlcyBlbnRyw6llc1xuICAgICAgICAgICAgXG4gICAgICAgICAgICBjb25zdCB0bXBsID0gJCgnI2FkX2ltYWdlcycpLmRhdGEoJ3Byb3RvdHlwZScpLnJlcGxhY2UoL19fbmFtZV9fL2csIGluZGV4KTtcbiAgICAgICAgICAgIC8vYWxlcnQodG1wbCk7XG4gICAgICAgICAgICAvLyBKJ2luamVjdGUgY2UgY29kZSBhdSBzZWluIGRlIGxhIGRpdlxuICAgICAgICAgICAgXG4gICAgICAgICAgICAkKCcjYWRfaW1hZ2VzJykuYXBwZW5kKHRtcGwpO1xuICAgICAgICAgICAgXG4gICAgICAgICAgICAkKCcjd2lkZ2V0cy1jb3VudGVyJykudmFsKGluZGV4ICsgMSk7XG4gICAgICAgICAgICBcbiAgICAgICAgICAgIC8vSmUgZ8OpcmUgbGUgYnV0dG9uIHN1cHByaW1lclxuICAgICAgICAgICAgaGFuZGxlRGVsZXRlQnV0dG9ucygpO1xuICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICBcbiAgICAgICAgICAgIGZ1bmN0aW9uIGhhbmRsZURlbGV0ZUJ1dHRvbnMoKXtcbiAgICAgICAgICAgICAgICAkKCdidXR0b25bZGF0YS1hY3Rpb249XCJkZWxldGVcIl0nKS5jbGljayhmdW5jdGlvbigpe1xuICAgICAgICAgICAgICAgICAgICBjb25zdCB0YXJnZXQgPSB0aGlzLmRhdGFzZXQudGFyZ2V0O1xuICAgICAgICAgICAgICAgICAgICAvL2NvbnNvbGUhO2xvZyh0YXJnZXQpO1xuICAgICAgICAgICAgICAgICAgICAkKHRhcmdldCkucmVtb3ZlKCk7XG4gICAgICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICBcbiAgICAgICAgICAgICAgICBmdW5jdGlvbiB1cGRhdGVDb3VudGVyKCl7XG4gICAgICAgICAgICAgICAgICAgIGNvbnN0IGNvdW50ID0gKyQoJyNhZF9pbWFnZXMgZGl2LmZvcm0tZ3JvdXAnKS5sZW5ndGg7XG4gICAgICAgICAgICBcbiAgICAgICAgICAgICAgICAgICAgJCgnI3dpZGdldHMtY291bnRlcicpLnZhbChjb3VudCk7XG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgXG4gICAgICAgICAgICAgICAgdXBkYXRlQ291bnRlcigpO1xuICAgICAgICAgICAgfVxuICAgICAgICAgICAgaGFuZGxlRGVsZXRlQnV0dG9ucygpO1xuICAgICAgICAgICAgIl0sIm5hbWVzIjpbIiQiLCJjbGljayIsImluZGV4IiwidmFsIiwidG1wbCIsImRhdGEiLCJyZXBsYWNlIiwiYXBwZW5kIiwiaGFuZGxlRGVsZXRlQnV0dG9ucyIsInRhcmdldCIsImRhdGFzZXQiLCJyZW1vdmUiLCJ1cGRhdGVDb3VudGVyIiwiY291bnQiLCJsZW5ndGgiXSwic291cmNlUm9vdCI6IiJ9