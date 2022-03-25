$(function() {
  let loadMoreAjaxPagination = false;

  $(window).scroll(function() {
    const nextPageAjaxPaginationBtn = $("#ajaxNextPageBtn");
    if (nextPageAjaxPaginationBtn.length && !loadMoreAjaxPagination) {
      let urlAjaxPagination = nextPageAjaxPaginationBtn.attr("href");
      let offsetAjaxPaginationBtn = nextPageAjaxPaginationBtn.offset();
      if ($(this).scrollTop() >= offsetAjaxPaginationBtn.top - $(window).height()) {
        loadMoreAjaxPagination = true;
        $.ajax({
          url: urlAjaxPagination,
          type: "POST",
          data: {
            IS_AJAX: 'Y'
          },
          success: function(data) {
            nextPageAjaxPaginationBtn.after(data);
            nextPageAjaxPaginationBtn.remove();
            loadMoreAjaxPagination = false;
          }
        });
      }
    }
  });
});
