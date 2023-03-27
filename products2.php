
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>Product Filter in PHP using Vanilla JavaScript</title>

    <link rel="canonical" href="">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

    </style>
</head>

<body>

<div class="col-lg-8 mx-auto">

    <main>
        <h1 class="text-center mt-3 mb-3">Product Filter in PHP using Vanilla JavaScript - Introduction - 1</h1>

        <div class="row">

            <div class="col-sm-3 p-3 bg-light">

                <button type="button" name="clear_filter" class="btn btn-warning btn-sm form-control mb-2" id="clear_filter">Clear Filter</button>

                <p class="fs-4 text-center border-bottom text-bold">Gender</p>

                <div id="gender_filter" class="mb-2"></div>

                <p class="fs-4 text-center border-bottom text-bold">Price</p>

                <div id="price_filter" class="mb-2"></div>

                <p class="fs-4 text-center border-bottom text-bold">Brand</p>

                <div id="brand_filter" class="overflow-auto mb-3" style="height:350px;"></div>
            </div>

            <div class="col-sm-9">

                <div id="product_area" style="display:none"></div>

                <div id="skeleton_area"></div>

                <div id="pagination_area" class="mt-2 mb-5"></div>

            </div>

        </div>

    </main>
</div>

</body>
</html>

<script>

    function $(selector)
    {
        return document.querySelector(selector);
    }

    load_product(1, '');

    function load_product(page = 1, query = '')
    {
        $('#product_area').style.display = 'none';

        $('#skeleton_area').style.display = 'block';

        $('#skeleton_area').innerHTML = make_skeleton();

        fetch('process.php?page='+page+query+'').then(function(response){

            return response.json();

        }).then(function(responseData){

            var t_html = '';
            if(responseData.data)
            {
                if(responseData.data.length > 0)
                {
                    t_html += '<p class="h6">'+responseData.total_data+' Products Found</p>';
                    t_html += '<div class="row">';
                    for(var i = 0; i < responseData.data.length; i++)
                    {
                        t_html += '<div class="col-md-3 mb-2 p-3">';
                        t_html += '<img src = "'+responseData.data[i].file_name+'" class="img-fluid border mb-3 p-3" />';
                        t_html += '<p class="fs-6 text-center">'+responseData.data[i].Title+'&nbsp;&nbsp;&nbsp;<span class="badge bg-info text-dark">'+responseData.data[i].Brand+'</span><br />';
                        t_html += '<span class="fw-bold text-danger"><span>&#8377;</span> '+responseData.data[i].Price+'</p>';
                        t_html += '</div>';
                    }
                    t_html += '</div>';
                    $('#product_area').innerHTML = t_html;
                }
                else
                {
                    $('#product_area').innerHTML = '<p class="h6">No Product Found</p>';
                }
            }

            if(responseData.pagination)
            {
                $('#pagination_area').innerHTML = responseData.pagination;
            }

            setTimeout(function(){

                $('#product_area').style.display = 'block';

                $('#skeleton_area').style.display = 'none';

            }, 3000);

        });
    }

    function make_skeleton()
    {
        var output = '<div class="row">';
        for(var count = 0; count < 8; count++)
        {
            output += '<div class="col-md-3 mb-3 p-4">';
            output += '<div class="mb-2 bg-light text-dark" style="height:240px;"></div>';
            output += '<div class="mb-2 bg-light text-dark" style="height:50px;"></div>';
            output += '<div class="mb-2 bg-light text-dark" style="height:25px;"></div>';
            output += '</div>';
        }
        output += '</div>';
        return output;
    }

    load_filter();

    function load_filter()
    {
        fetch('process.php?action=filter').then(function(response){

            return response.json();

        }).then(function(responseData){

            if(responseData.gender)
            {
                if(responseData.gender.length > 0)
                {
                    var html = '<div class="list-group">';
                    for(var i = 0; i < responseData.gender.length; i++)
                    {
                        html += '<label class="list-group-item">';

                        html += '<input class="form-check-input me-1 gender_filter" type="radio" name="gender_filter" value="'+responseData.gender[i].name+'">';

                        html += responseData.gender[i].name+' <span class="text-muted">('+responseData.gender[i].total+')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#gender_filter').innerHTML = html;

                    var gender_elements = document.getElementsByClassName("gender_filter");

                    for(var i = 0; i < gender_elements.length; i++)
                    {
                        gender_elements[i].onclick = function(){

                            load_product(page = 1, make_query());

                        };
                    }
                }
            }

            if(responseData.Brand)
            {
                if(responseData.brand.length > 0)
                {
                    var html = '<div class="list-group">';
                    for(var i = 0; i < responseData.Brand.length; i++)
                    {
                        html += '<label class="list-group-item">';

                        html += '<input class="form-check-input me-1 brand_filter" type="checkbox" value="'+responseData.Brand[i].name+'">';

                        html += responseData.Brand[i].Title+' <span class="text-muted">('+responseData.Brand[i].total+')</span>';

                        html += '</label>';
                    }

                    html += '</div>';

                    $('#brand_filter').innerHTML = html;

                    var brand_elements = document.getElementsByClassName("brand_filter");

                    for(var i = 0; i < brand_elements.length; i++)
                    {
                        brand_elements[i].onclick = function(){

                            load_product(page = 1, make_query());

                        };
                    }
                }
            }

            if(responseData.price)
            {
                if(responseData.price.length > 0)
                {
                    var html = '<div class="list-group">';

                    for(var i = 0; i < responseData.Price.length; i++)
                    {
                        html += '<a href="#" class="list-group-item list-group-item-action price_filter" id="'+responseData.Price[i].condition+'"><span>&#8377;</span> '+responseData.price[i].name+' <span class="text-muted">('+responseData.price[i].total+')</a>';
                    }

                    html += '</div>';

                    $('#price_filter').innerHTML = html;

                    var price_elements = document.getElementsByClassName("price_filter");

                    for(var i = 0; i < price_elements.length; i++)
                    {
                        price_elements[i].onclick = function(){

                            remove_active_class(price_elements);

                            this.classList.add("active");

                            load_product(page = 1, make_query());

                        };
                    }

                }
            }

        });
    }

    function remove_active_class(element)
    {
        for(var i = 0; i < element.length; i++)
        {
            if(element[i].matches('.active'))
            {
                element[i].classList.remove("active");
            }
        }
    }

    function make_query()
    {
        var query = '';

        var gender_elements = document.getElementsByClassName("gender_filter");

        for(var i = 0; i < gender_elements.length; i++)
        {
            if(gender_elements[i].checked)
            {
                query += '&gender_filter='+gender_elements[i].value+'';
            }
        }

        var price_elements = document.getElementsByClassName("price_filter");

        for(var i = 0; i < price_elements.length; i++)
        {
            if(price_elements[i].matches('.active'))
            {
                query += '&price_filter='+price_elements[i].getAttribute("id")+'';
            }
        }

        var brand_elements = document.getElementsByClassName("brand_filter");

        var brandlist = '';

        for(var i = 0; i < brand_elements.length; i++)
        {
            if(brand_elements[i].checked)
            {
                brandlist += brand_elements[i].value + ',';
            }
        }

        if(brandlist != '')
        {
            query += '&brand_filter='+brandlist+'';
        }

        return query;
    }

    $('#clear_filter').onclick = function(){

        var gender_elements = document.getElementsByClassName("gender_filter");

        for(var i = 0; i < gender_elements.length; i++)
        {
            gender_elements[i].checked = false;
        }

        var price_elements = document.getElementsByClassName("price_filter");

        remove_active_class(price_elements);

        var brand_elements = document.getElementsByClassName("brand_filter");

        for(var i = 0; i < brand_elements.length; i++)
        {
            brand_elements[i].checked = false;
        }

        load_product(1, '');

    };

</script>