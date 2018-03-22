<?php
use Illuminate\Support\Facades\Input;

 function ss_flash($errors = null)
	{
			
			
			if (isset($errors) && count($errors) > 0):
				$er ="";
	            foreach ($errors->all() as $key => $error):
	            	
	                		$er = $er.'<li>'.$error.'</li>';

	            	
	            endforeach;
			    $rs = '<div class="alert alert-danger">
			        <ul>'.$er.
			        '</ul>
			    </div>';
			    return $rs;

			endif;

			if(Session::has('message')){
				$rs =  '<div class="alert alert-warning">'.Session::get('message').'</div>';
			 return $rs;
			}

			if(Session::has('success')){
				$rs =  '<div class="alert alert-success">'.Session::get('success').'</div>';
			 return $rs;
			}

			


		
	}
// generate category
if (! function_exists('generateCategoryLists')) {
		    function generateCategoryLists(array $elements, $parentId = 0,$indent = "",$select_id=null) {
		        
		        foreach ($elements as $cate) {
	        	$cate_id = $cate['parent_id'];
	        	$vi_detail=null;
				if(isset($cate['lang']) && count($cate['lang']) > 0):
				 	foreach($cate['lang'] as $detail):
				 		if($detail['Locale'] == "vi"):
				 			$vi_detail = $detail;
				 		
				 		endif;
				 	endforeach;
				endif;
				if($cate_id == ""){
					$cate_id = 0;
				}
		            if ($cate_id == $parentId) {
		                if(($select_id != null && $select_id == $cate['id']) || ($cate['id'] == Input::get('categories_id'))){

			                echo '<option selected="selected" value = "'.$cate['id'].'"> '.$indent. $vi_detail['pivot']['Name'] . '</option>';
		                }else{
			                	
			                echo '<option value = "'.$cate['id'].'"> '.$indent. $vi_detail['pivot']['Name'] . '</option>';
		                }
		                
		                $children = generateCategoryLists($elements, $cate['id'],$indent." -- ",$select_id);
		            }
		        }
		    }
		}













?>