$(document).ready(function() {
  var searchInput = $('#searchInput');
  var dropdownMenu = $('#dropdownMenu');
  var searchResults = $('#searchResults');
  var commandPalette = $('#commandPalette');

  searchInput.on('input', function() {
    var searchQuery = $(this).val();

    if (searchQuery.length > 0) {
      // Send search request
      $.get('/search', {
        q: searchQuery
      })
      .done(function(response) {
        var results = response.data;

        // Clear previous results
        searchResults.html('');

        // Display new results
        $.each(results, function(index, result) {
          var li = $('<li></li>').text(result.name).addClass('py-2 px-4 hover:bg-gray-100');
          searchResults.append(li);
        });

        // Show the dropdown menu
        dropdownMenu.css('display', 'block');
      })
      .fail(function(error) {
        console.error(error);
      });
    } else {
      // Hide the dropdown menu
      dropdownMenu.css('display', 'none');
    }
  });

  searchInput.on('keydown', function(event) {
    if (event.key === 'Escape') {
      // Hide the dropdown menu and clear the input
      dropdownMenu.css('display', 'none');
      searchInput.val('');
    }
  });
});