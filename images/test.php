<?php
$xml = simplexml_load_file('test.xml');

// 计算总共商品的个数
$id_count = sizeof($xml->categories->category->items->product);


//取得各自商品的id和商品name 
$tmp_id =array();
$tmp_name =array();
foreach($xml->categories->category->items->product as $value){
	array_push($tmp_id, json_decode(json_encode($value->attributes()->id), true) );
	array_push($tmp_name, json_decode(json_encode($value->name), true));
};

//取得各自商品的每个name - value
$tmp_id_feature_1 = array();
$tmp_id_feature_2 = array();
// $tmp_id_FeatureGroup_1 =array();
// $tmp_id_FeatureGroup_2 = array();
$tmp_id_FeatureGroup_1_name = array();	//每一个feature的数组标题
$tmp_id_FeatureGroup_2_name =array();
$tmp_feature_name_1  =array();
$tmp_feature_name_2  =array();
$tmp_feature_name_value_1 =array();	//每一个组的标题
$tmp_feature_name_value_2 =array();	//每一个组的标题
$tmp_feature_name_value_foreach = array();

foreach($xml->categories->category->items->product[0]->specifications->featureGroup as $valueFeatureGroup){

	//循环商品每一个group下name数组{  group-name  }    == 表头信息
	foreach($valueFeatureGroup->name as $valueFeatureGroupName){
		array_push($tmp_id_FeatureGroup_1_name, $valueFeatureGroupName);
	}

	//循环每个feature下每个name数组{  group-feature-name  }	  

	foreach($valueFeatureGroup->feature as $valueFeature){
		array_push($tmp_feature_name_1, $valueFeature->name);		//   == 每一个特性的属性值

		// 循环每个feature下value的总共值{  group-feature-value  }
		foreach($valueFeature->value as $valueFeatureValue){
			//为每个feature下的value保存为一个数组
			array_push($tmp_feature_name_value_foreach, $valueFeatureValue);	
		}
		array_push($tmp_feature_name_value_1, $tmp_feature_name_value_foreach);	//    === 每一个特性对应的value值数组
		//清空临时数组
		$tmp_feature_name_value_foreach = array();	
	}

}


echo 'product id:</br></br>';
echo $tmp_id[0][0].'---------'.$tmp_id[1][0];
echo '</br></br>product name:</br></br>';
echo $tmp_name[0][0].'---------'.$tmp_name[1][0];
echo '</br></br>';
echo '<h1>表头信息</h1>';
foreach($tmp_feature_name_1 as $tmp_value){
	echo $tmp_value.'</br>';
}
echo '</br></br>';
echo '<h1>特性名称</h1>';
foreach($tmp_id_FeatureGroup_1_name as $tmp_value){
	echo $tmp_value.'</br>';
}
echo '</br></br>';
echo '<h1>特性名称对应的值：</h1>';
foreach($tmp_feature_name_value_1 as $tmp_value){
	echo '</br>-------value each------</br>';
	foreach ($tmp_value as $value_me) {
		echo $value_me.'</br>';
	}
}
?>