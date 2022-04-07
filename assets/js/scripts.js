(function ($) {

	/* ajaxify Product Load More */
		var cat_name = $("#cat_name").attr("data-id");
	    var dataBlogPost = {
	        paged: 1,
	        cat: cat_name,
	        append: false,
	        formDataBlogPost: null,
	        action: 'load_more_product',
	    };

	    function isNumber(num) {
	        return !Number.isNaN(parseFloat(num));
	    }

	    function queryAjaxProduct(dataBlogPost = null) {
	        $.ajax({
	            data: dataBlogPost,
	            type: 'POST',
	            //async: false,
	            dataType: 'html',
	            url: ajax.ajaxurl,
	            beforeSend: function() {
	                // if (dataBlogPost.append) {
	                //     $('#loadAjaxPosts').append('<div class="ajax-preloader col-12"><img src="' + ajax.site_url + '/assets/img/ajax-loader.gif"></div>');
	                // } else {
	                //     $('#loadAjaxPosts').html('<div class="ajax-preloader col-12"><img src="' + ajax.site_url + '/assets/img/ajax-loader.gif"></div>');
	                // }
	                $.LoadingOverlay("show");
	            },
	            success: function(resp) {
	                //$('.ajax-preloader').remove();
	                $.LoadingOverlay("hide");
	                
	                if (dataBlogPost.append) {
	                    $('.notResult').remove();

	                    $('#loadAjaxPosts').append(resp);
	                } else {
	                    $('#loadAjaxPosts').html(resp);
	                }

	                var hasNoResult = $(resp).hasClass('notResult');

	                if (hasNoResult) {
	                    $('.blog_load_more').addClass('d-none');
	                } else {
	                    $('.blog_load_more').removeClass('d-none');
	                }
	            },
	            error: function(jqXHR, textStatus, errorThrown) {
	                console.log(jqXHR, textStatus, errorThrown);
	            }
	        });
	    }

	    // on page load
	    const loadAjaxBlogPost = document.querySelector('#loadAjaxPosts');

	    if (loadAjaxBlogPost) {
	        queryAjaxProduct(dataBlogPost);
	    }

	    $('.product_load_more .ajax-loadmore').on('click', function(e) {
	        e.preventDefault();
	        dataBlogPost.paged = dataBlogPost.paged + 1;
	        dataBlogPost.append = true;
	        queryAjaxProduct(dataBlogPost);
	    });

	    $('#postFormFilter').on("change", function(e) {
	        e.preventDefault();
	        var formDataBlogPost = $(this).serialize();
	        dataBlogPost.formDataBlogPost = formDataBlogPost;
	        dataBlogPost.append = false;
	        dataBlogPost.paged = 1;
	        queryAjaxProduct(dataBlogPost);
	    });

	    $('.reset').on("click", function(e) {
	        var formDataBlogPost = $(this).serialize();
	        dataBlogPost.formDataBlogPost = formDataBlogPost;
	        dataBlogPost.append = false;
	        dataBlogPost.paged = 1;
	        queryAjaxProduct(dataBlogPost);
	    });

	    // $(window).on("load", function(e) {
	    //     e.preventDefault();
	    //     var formDataBlogPost = $('#postFormFilter').serialize();
	    //     dataBlogPost.formDataBlogPost = formDataBlogPost;
	    //     dataBlogPost.append = false;
	    //     dataBlogPost.paged = 1;
	    //     queryAjaxProduct(dataBlogPost);
	    // });

	    $('#postFormFilter').on("submit", function(e) {
	        e.preventDefault();
	        var formDataBlogPost = $(this).serialize();
	        dataBlogPost.formDataBlogPost = formDataBlogPost;
	        dataBlogPost.append = false;
	        dataBlogPost.paged = 1;
	        queryAjaxProduct(dataBlogPost);
	    });


	/* ajaxify lifestyle Product Filter */
	    var dataLifeStyleProduct = {
	        paged: 1,
	        append: false,
	        formLifeStyleProduct: null,
	        action: 'lifestyle_product_filter',
	    };

	    function isNumber(num) {
	        return !Number.isNaN(parseFloat(num));
	    }

	    function queryAjaxlifestyleProduct(dataLifeStyleProduct = null) {
	        $.ajax({
	            data: dataLifeStyleProduct,
	            type: 'POST',
	            //async: false,
	            dataType: 'html',
	            url: ajax.ajaxurl,
	            beforeSend: function() {
	                // if (dataLifeStyleProduct.append) {
	                //     $('#show_lifestyle_product').append('<div class="ajax-preloader col-12"><img src="' + ajax.site_url + '/assets/img/ajax-loader.gif"></div>');
	                // } else {
	                //     $('#show_lifestyle_product').html('<div class="ajax-preloader col-12"><img src="' + ajax.site_url + '/assets/img/ajax-loader.gif"></div>');
	                // }
	                $.LoadingOverlay("show");
	            },
	            success: function(resp) {
	                //$('.ajax-preloader').remove();
	                $.LoadingOverlay("hide");

	                if (dataLifeStyleProduct.append) {
	                    $('.notResult').remove();

	                    $('#show_lifestyle_product').append(resp);
	                } else {
	                    $('#show_lifestyle_product').html(resp);
	                }

	                var hasNoResult = $(resp).hasClass('notResult');

	                if (hasNoResult) {
	                    $('.blog_load_more').addClass('d-none');
	                } else {
	                    $('.blog_load_more').removeClass('d-none');
	                }
	            },
	            error: function(jqXHR, textStatus, errorThrown) {
	                console.log(jqXHR, textStatus, errorThrown);
	            }
	        });
	    }

	    //on page load
	    const loadAjaxlifestyleProduct = document.querySelector('#show_lifestyle_product');

	    if (loadAjaxlifestyleProduct) {
	        queryAjaxlifestyleProduct(dataLifeStyleProduct);
	    }

	    $('.product_load_more .ajax-loadmore').on('click', function(e) {
	        e.preventDefault();
	        dataLifeStyleProduct.paged = dataLifeStyleProduct.paged + 1;
	        dataLifeStyleProduct.append = true;
	        queryAjaxlifestyleProduct(dataLifeStyleProduct);
	    });

	    $('#postFormFilterforlifestyle').on("change", function(e) {
	        e.preventDefault();
	        var formLifeStyleProduct = $(this).serialize();
	        console.log(formLifeStyleProduct);
	        dataLifeStyleProduct.formLifeStyleProduct = formLifeStyleProduct;
	        dataLifeStyleProduct.append = false;
	        dataLifeStyleProduct.paged = 1;
	        queryAjaxlifestyleProduct(dataLifeStyleProduct);
	    });

	    $('#postFormFilterforlifestyle').on("submit", function(e) {
	        e.preventDefault();
	        var formLifeStyleProduct = $(this).serialize();
	        dataLifeStyleProduct.formLifeStyleProduct = formLifeStyleProduct;
	        dataLifeStyleProduct.append = false;
	        dataLifeStyleProduct.paged = 1;
	        queryAjaxlifestyleProduct(dataLifeStyleProduct);
	    });





}(jQuery));