<?php

/**验证类 Validate.class.php
 * @Author: Richer
 * @Date:   2018-10-09 15:17:02
 * @Last Modified by:   Richer
 * @Last Modified time: 2018-10-09 16:04:46
 */
class Validate{

	//是否为空
	static public function checkNull($_date){
		if (trim($_date)=='') return ture;
		return false;
	}

	//长度是否合法$_date－值，$_length-长度,$_flag-最大或最小
	static public function checkLength($_date,$_length,$_flag){
		if($_flag=='min'){
			if (mb_strlen(trim($_date),'utf-8')<$_length) return true;
			return false;
		}elseif ($_flag=='max') {
			if (mb_strlen(trim($_date),'utf-8')>$_length) return true;
			return false;
		}elseif($_flag=='equals'){
		    if(mb_strlen(trim($_date),'utf-8')!=$_length) return true;
		    return false;
        }else{
			Tool::alertBack('ERROR:参数传递错误，必须为min或max!');
		}
			
	}
	//数据是否一致
	static public function checkEquals($_date,$_otherdate){
		if (trim($_date) != trim($_otherdate)) return true;
		return false;
		
	}

    //session验证
    static public function checkSession(){
	    if(!$_SESSION['admin']) Tool::alertBack('警告:非法登录!');
    }
}