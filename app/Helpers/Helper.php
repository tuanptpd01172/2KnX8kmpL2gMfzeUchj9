<?php
namespace App\Helpers;
use Session;
use App;
use Illuminate\Support\Facades\Input;
use App\Model\Categories\Categories;

/**
*
* 
*/
class Helper
{
	
	
	//gerenate slug 
	 public static  function gen_slug($str){
	    # special accents
	   $str = trim(mb_strtolower($str));
	    $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
	    $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
	    $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
	    $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
	    $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
	    $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
	    $str = preg_replace('/(đ)/', 'd', $str);
	    $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
	    $str = preg_replace('/([\s]+)/', '-', $str);
	    return $str;
		}


	public static function Check_Role($name,$function){
			switch ($function):
            case 'view': $r_role = 1;
                break;
            case 'add': $r_role = 2;
                break;
            case 'edit': $r_role = 3;
                break;
            case 'delete': $r_role = 4;
                break;
            case 'none': $r_role = 0;
                break;
            case 'full': $r_role = 10;
                break;
            
            default: $r_role = 0;
                # code...
                break;
        endswitch;
			if(Session::has('Permission')):

			    foreach(Session::get('Permission') as $rs):

			    		if( $rs['group'] == 'admin' || $name == $rs['name'] && $rs['function'] == '10' || $name == $rs['name'] && $r_role == $rs['function']){
				  			
				    		return  true ;
				    		break;
			    		}
			    		
			    endforeach;


		   else :
		       return false;
	       endif;
			
		}	


		




	//gerenate slug 
	 public static  function date_y($str){
	    # special accents
	   $date = str_replace('/', '-', $str);
	   $str = date('Y-m-d', strtotime($date));
	   
	    return $str;
		}

	public static  function Currency_Text($number)
	{
		return convert_number_to_words($number);
	}

	public static  function Cash_input($id)
	{

		  $hocphi = [
		  '1'=> ['id'=>'hocphi', 'name'=> 'học phí' ],
		  '2'=> ['id'=>'hocphitoi', 'name'=> 'học phí tối' ],
		  '3'=> ['id'=>'tienan', 'name'=> 'tiền ăn' ],
		  '4'=> ['id'=>'tienantoi', 'name'=> 'tiền ăn tối' ],
		  '5'=> ['id'=>'phucvubantru', 'name'=> 'phục vụ bán trú' ],
		  '6'=> ['id'=>'phucvubantrutoi', 'name'=> 'phục vụ bán trú tối ']
		 ];
		 return $hocphi[$id];
		
	}

	public static  function gen_cate(array $elements, $parentId = 0,$indent = "",$select_id=null)
	{

		 
		 return generateCategoryLists($elements,$parentId,$indent,$select_id);
		
	}

	public static  function ss_flash($data =true)
	{
		
		

			// if(Session::has('message')){
			// 	$rs =  '<div class="alert alert-warning">'.Session::get('message').'</div>';
			//  return $rs;
			// }

			if(Session::has('success')){
				$rs =  '<div class="alert alert-success">'.Session::get('success').'</div>';
			 return $rs;
			}

		

			if(Session::has('errors')){
				// if(is_array(Session::has('errors'))){
				// 	$rs = "";
				// 	foreach (Session::get('errors') as $value) {
				// 		if(!is_array($value)){

				// 				$rs +=  '<div class="alert alert-danger">'.$value.'</div>';
				// 		}else{
				// 			foreach ($value as $value1) {
								
				// 				$rs +=  '<div class="alert alert-danger">'.$value1.'</div>';
				// 			}
				// 		}	
				// 	}
				// }else{

				// 	$rs = [];
				// } 
				
					// $rs =  '<div class="alert alert-danger">'.Session::get('errors').'</div>';
					// return Session::has('message');
			 return Session::get('errors')->all();
			}

		
	}

	public static  function nav()
	{
		
		
		$locale =App::getLocale(); 
        if(Session::has('locale')){

        $GLOBALS['locale'] = Session::get('locale');
        }else{

        $GLOBALS['locale'] = App::getLocale();
        }
        $cate = Categories::where('Status',1)->with(['lang'=>function ($lang){$lang->get();}])->get();
        return $cate;
	}

	public static  function footer()
	{
		
		
		$locale =App::getLocale(); 
        if(Session::has('locale')){

        $GLOBALS['locale'] = Session::get('locale');
        }else{

        $GLOBALS['locale'] = App::getLocale();
        }
        $post = Categories::where('Slug','tin-tuc')->with([

			'post'=>function ($post){
				$post->with(['lang'=>function ($lang){}])->skip(0)->take(4)->orderBy('id','DESC')->get();

		}])->get();
        return $post;
	}

}


function convert_number_to_words($number) {
 
			$hyphen      = ' ';
			$conjunction = '  ';
			$separator   = ' ';
			$negative    = 'âm ';
			$decimal     = ' phẩy ';
			$dictionary  = array(
			0                   => 'Không',
			1                   => 'Một',
			2                   => 'Hai',
			3                   => 'Ba',
			4                   => 'Bốn',
			5                   => 'Năm',
			6                   => 'Sáu',
			7                   => 'Bảy',
			8                   => 'Tám',
			9                   => 'Chín',
			10                  => 'Mười',
			11                  => 'Mười một',
			12                  => 'Mười hai',
			13                  => 'Mười ba',
			14                  => 'Mười bốn',
			15                  => 'Mười năm',
			16                  => 'Mười sáu',
			17                  => 'Mười bảy',
			18                  => 'Mười tám',
			19                  => 'Mười chín',
			20                  => 'Hai mươi',
			30                  => 'Ba mươi',
			40                  => 'Bốn mươi',
			50                  => 'Năm mươi',
			60                  => 'Sáu mươi',
			70                  => 'Bảy mươi',
			80                  => 'Tám mươi',
			90                  => 'Chín mươi',
			100                 => 'trăm',
			1000                => 'ngàn',
			1000000             => 'triệu',
			1000000000          => 'tỷ',
			1000000000000       => 'nghìn tỷ',
			1000000000000000    => 'ngàn triệu triệu',
			1000000000000000000 => 'tỷ tỷ'
			);
			 
			if (!is_numeric($number)) {
			return false;
			}
			 
			if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
			// overflow
			trigger_error(
			'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
			E_USER_WARNING
			);
			return false;
			}
			 
			if ($number < 0) {
			return $negative . convert_number_to_words(abs($number));
			}
			 
			$string = $fraction = null;
			 
			if (strpos($number, '.') !== false) {
			list($number, $fraction) = explode('.', $number);
			}
			 
			switch (true) {
			case $number < 21:
			$string = $dictionary[$number];
			break;
			case $number < 100:
			$tens   = ((int) ($number / 10)) * 10;
			$units  = $number % 10;
			$string = $dictionary[$tens];
			if ($units) {
			$string .= $hyphen . $dictionary[$units];
			}
			break;
			case $number < 1000:
			$hundreds  = $number / 100;
			$remainder = $number % 100;
			$string = $dictionary[$hundreds] . ' ' . $dictionary[100];
			if ($remainder) {
			$string .= $conjunction . convert_number_to_words($remainder);
			}
			break;
			default:
			$baseUnit = pow(1000, floor(log($number, 1000)));
			$numBaseUnits = (int) ($number / $baseUnit);
			$remainder = $number % $baseUnit;
			$string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
			if ($remainder) {
			$string .= $remainder < 100 ? $conjunction : $separator;
			$string .= convert_number_to_words($remainder);
			}
			break;
			}
			 
			if (null !== $fraction && is_numeric($fraction)) {
			$string .= $decimal;
			$words = array();
			foreach (str_split((string) $fraction) as $number) {
			$words[] = $dictionary[$number];
			}
			$string .= implode(' ', $words);
			}
			 
			return $string;
}	

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

		