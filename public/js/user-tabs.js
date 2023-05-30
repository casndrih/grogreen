/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***********************************!*\
  !*** ./resources/js/user-tabs.js ***!
  \***********************************/
$(document).ready(function () {
  // Set My Profile tab as active by default
  $("#profileTab").addClass("text-lime-500 border-lime-500 border-b-4");
  showProfile();
  $("#profileTab").click(function () {
    showProfile();
  });
  $("#activeOrdersTab").click(function () {
    showActiveOrders();
  });
  $("#orderHistoryTab").click(function () {
    showOrderHistory();
  });
  $("#supportTicketTab").click(function () {
    showSupportTicket();
  });
  function showProfile() {
    // Show My Profile tab content
    $("#profileView").show();

    // Hide other tab content
    $("#activeOrdersView").hide();
    $("#orderHistoryView").hide();
    $("#supportTicketView").hide();

    // Update active tab styling
    updateTabStyling("#profileTab");
  }
  function showActiveOrders() {
    // Show Active Orders tab content
    $("#activeOrdersView").show();

    // Hide other tab content
    $("#profileView").hide();
    $("#orderHistoryView").hide();
    $("#supportTicketView").hide();

    // Update active tab styling
    updateTabStyling("#activeOrdersTab");
  }
  function showOrderHistory() {
    // Show Order History tab content
    $("#orderHistoryView").show();

    // Hide other tab content
    $("#profileView").hide();
    $("#activeOrdersView").hide();
    $("#supportTicketView").hide();

    // Update active tab styling
    updateTabStyling("#orderHistoryTab");
  }
  function showSupportTicket() {
    // Show Support Ticket tab content
    $("#supportTicketView").show();

    // Hide other tab content
    $("#profileView").hide();
    $("#activeOrdersView").hide();
    $("#orderHistoryView").hide();

    // Update active tab styling
    updateTabStyling("#supportTicketTab");
  }
  function updateTabStyling(tabId) {
    // Remove active tab styling from all tabs
    $(".tab-link").removeClass("text-lime-500 border-lime-500 border-b-4");

    // Add active tab styling to the clicked tab
    $(tabId).addClass("text-lime-500 border-lime-500 border-b-4");
  }
});
/******/ })()
;