<?php

//process.php

$connect = new PDO("mysql:host=localhost; dbname=mobster", "root", "1xCMat5k5Cb4");

if(isset($_GET["page"]))
{

	$data = array();

	$limit = 8;

	$page = 1;

	if($_GET["page"] > 1)
	{
		$start = (($_GET["page"] - 1) * $limit);

		$page = $_GET["page"];
	}
	else
	{
		$start = 0;
	}

	$where = '';

	$search_query = '';

	if(isset($_GET["gender_filter"]))
	{
		$where .= ' gender = "'.trim($_GET["gender_filter"]).'" ';

		$search_query .= '&gender_filter='.trim($_GET["gender_filter"]);
	}

	if(isset($_GET["price_filter"]))
	{
		if($where != '')
		{
			$where .= ' AND '. trim($_GET["price_filter"]);
		}
		else
		{
			$where .= trim($_GET["price_filter"]);
		}

		$search_query .= '&price_filter='.trim($_GET["price_filter"]);
	}

	if(isset($_GET["brand_filter"]))
	{
		$brand_array = explode(",", trim($_GET["brand_filter"]));

		if(count($brand_array) > 0)
		{
			//if(count($brand_array) > 1)
			//{
				if($where != '')
				{
					$brand_condition = '';
					foreach($brand_array as $brand)
					{
						if(trim($brand) != '')
						{
							$brand_condition .= 'brand = "'.trim($brand).'" OR ';
						}
					}
					if($brand_condition != '')
					{
						$where .= ' AND ('.substr($brand_condition, 0, -4).')';
					}
				}
				else
				{
					$brand_condition = '';
					foreach($brand_array as $brand)
					{
						if(trim($brand) != '')
						{
							$brand_condition .= 'brand = "'.trim($brand).'" OR ';
						}
					}
					if($brand_condition != '')
					{
						$where .= substr($brand_condition, 0, -4);
					}
				}
			//}
			$search_query .= '&brand_filter=' . trim($_GET["brand_filter"]);
		}
	}

	if($where != '')
	{
		$where = 'WHERE ' . $where;
	}

	$query = "
	SELECT Title, Price, file_name, Brand 
	FROM products 
	".$where."
	ORDER BY id ASC
	";

	$filter_query = $query . ' LIMIT ' . $start . ', ' . $limit . '';

	$statement = $connect->prepare($query);

	$statement->execute();

	$total_data = $statement->rowCount();

	$statement = $connect->prepare($filter_query);

	$statement->execute();

	$result = $statement->fetchAll();

	foreach($result as $row)
	{
		$img_arr = explode(" ~ ", $row['images']);

		$data[] = array(
			'name'				=>	$row["Title"],
			'price'				=>	$row['Price'],
			'brand'				=>	$row['Brand'],
			'image'				=>	$img_arr[0]
		);

	}

	$pagination_html = '
	<nav aria-label="Page navigation example">
  		<ul class="pagination justify-content-center">
	';

	$total_links = ceil($total_data/$limit);

	$previous_link = '';

	$next_link = '';

	$page_link = '';

	$page_array = '';

	if($total_links > 0)
	{
		if($total_links > 4)
		{
			if($page < 5)
			{
				for($count = 1; $count <= 5; $count++)
				{
					$page_array[] = $count;
				}
				$page_array[] = '...';
				$page_array[] = $total_links;
			}
			else
			{
				$end_limit = $total_links - 5;

				if($page > $end_limit)
				{
					$page_array[] = 1;

					$page_array[] = '...';

					for($count = $end_limit; $count <= $total_links; $count++)
					{
						$page_array[] = $count;
					}
				}
				else
				{
					$page_array[] = 1;

					$page_array[] = '...';

					for($count = $page - 1; $count <= $page + 1; $count++)
					{
						$page_array[] = $count;
					}

					$page_array[] = '...';

					$page_array[] = $total_links;
				}
			}
		}
		else
		{
			for($count = 1; $count <= $total_links; $count++)
			{
				$page_array[] = $count;
			}
		}

		for($count = 0; $count < count($page_array); $count++)
		{
			if($page == $page_array[$count])
			{
				$page_link .= '
				<li class="page-item active">
		      		<a class="page-link" href="#">'.$page_array[$count].'</a>
		    	</li>
				';

				$previous_id = $page_array[$count] - 1;

				if($previous_id > 0)
				{
					$previous_link = '<li class="page-item"><a class="page-link" href="javascript:load_product('.$previous_id.',`'.$search_query.'`)">Previous</a></li>';
				}
				else
				{
					$previous_link = '
					<li class="page-item disabled">
				        <a class="page-link" href="#">Previous</a>
				    </li>
					';
				}

				$next_id = $page_array[$count] + 1;

				if($next_id >= $total_links)
				{
					$next_link = '
					<li class="page-item disabled">
		        		<a class="page-link" href="#">Next</a>
		      		</li>
					';
				}
				else
				{
					$next_link = '
					<li class="page-item"><a class="page-link" href="javascript:load_product('.$next_id.',`'.$search_query.'`)">Next</a></li>
					';
				}

			}
			else
			{
				if($page_array[$count] == '...')
				{
					$page_link .= '
					<li class="page-item disabled">
		          		<a class="page-link" href="#">...</a>
		      		</li>
					';
				}
				else
				{
					$page_link .= '
					<li class="page-item">
						<a class="page-link" href="javascript:load_product('.$page_array[$count].', `'.$search_query.'`)">'.$page_array[$count].'</a>
					</li>
					';
				}
			}
		}

	}

	$pagination_html .= $previous_link . $page_link . $next_link;


	$pagination_html .= '
		</ul>
	</nav>
	';

	$output = array(
		'data'				=>	$data,
		'pagination'		=>	$pagination_html,
		'total_data'		=>	$total_data
	);

	echo json_encode($output);

}


if(isset($_GET["action"]))
{
	$data = array();

	$query = "
	SELECT Title, COUNT(id) AS Total FROM products 
	";

	foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['name'] = $row['Tender'];
		$sub_data['total'] = $row['Total'];
		$data['gender'][] = $sub_data;
	}

	$query = "
	SELECT Brand, COUNT(id) AS Total FROM products GROUP BY Brand
	";

	foreach($connect->query($query) as $row)
	{
		$sub_data = array();
		$sub_data['Title'] = $row['Brand'];
		$sub_data['total'] = $row['Total'];
		$data['Brand'][] = $sub_data;
	}

	$price_range = array(
		'price < 1000'						=>	'Under 1000',
		'price > 1000 && price < 5000'		=>	'1000 - 5000', 
		'price > 5000 && price < 10000'		=>	'5000 - 10000',
		'price > 10000 && price < 20000'	=>	'10000 - 20000',
		'price > 20000'						=>	'Over 20000'
	);

	foreach($price_range as $key => $value)
	{
		$query = "
		SELECT COUNT(id) AS Total FROM products 
		WHERE ".$key." 
		";
		$sub_data = array();
		foreach($connect->query($query) as $sub_row)
		{
			$sub_data['name'] = $value;
			$sub_data['total'] = $sub_row['Total'];
			$sub_data['condition'] = $key;		
		}
		$data['Price'][] = $sub_data;
	}

	echo json_encode($data);
}



?>