<?php
//期望的数据
array(
	array(
		"cat_id"=>1,
		"cat_name"=>"男女服装",
		"parent_id"=>0,
		'child' => array(
			array(
				"cat_id"=>2,
				"cat_name"=>"男装",
				"parent_id"=>1
				"child"=> array(
					array("cat_id"=>5,"cat_name"=>"西服","parent_id"=>2),
					array("cat_id"=>10,"cat_name"=>"衬衣","parent_id"=>2),
				)
			),
			array(
				"cat_id"=>3,
				"cat_name"=>"女装",
				"parent_id"=>1
				"child"=> array(
					array("cat_id"=>4,"cat_name"=>"裙子","parent_id"=>3),
				)
			),
		)
	),
	array(
		"cat_id"=>6,
		"cat_name"=>"鞋帽服饰",
		"parent_id"=>0
		"child"=> array(
			array(
				"cat_id"=>7,
				"cat_name"=>"鞋子",
				"parent_id"=>6,
				"child" = array()
			),
			array(
				"cat_id"=>8,
				"cat_name"=>"帽子",
				"parent_id"=>6,
				"child" = array()
			),
		)
	),
	
	
	
	
);
//数据库中的数据
array(
	array("cat_id"=>1,"cat_name"=>"男女服装","parent_id"=>0),
	array("cat_id"=>2,"cat_name"=>"男装","parent_id"=>1),
	array("cat_id"=>3,"cat_name"=>"女装","parent_id"=>1),
	array("cat_id"=>4,"cat_name"=>"裙子","parent_id"=>3),
	array("cat_id"=>5,"cat_name"=>"西服","parent_id"=>2),
	array("cat_id"=>6,"cat_name"=>"鞋帽服饰","parent_id"=>0),
	array("cat_id"=>7,"cat_name"=>"鞋子","parent_id"=>6),
	array("cat_id"=>8,"cat_name"=>"帽子","parent_id"=>6),
);