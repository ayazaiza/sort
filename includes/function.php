<?php
/********************************************

	For More Detail please Visit: 
	
	http://www.discussdesk.com/download-pagination-in-php-and-mysql-with-example.htm

	************************************************/

   function displayPaginationBelow($per_page,$page,$connection,$get){

	   $page_url="?";
    	//$query = "SELECT COUNT(*) as totalCount FROM TABLE_NAME where status = 1";

          $query3 ="SELECT COUNT(*) as totalCount FROM `links`  WHERE `sub_category` = '$get' AND `status`='active' ORDER BY `id` DESC";

            
		  


    	$rec = mysqli_fetch_array(mysqli_query($connection,$query3));
    	$total = $rec['totalCount'];
        $adjacents = "2"; 

    	$page = ($page == 0 ? 1 : $page);  
    	$start = ($page - 1) * $per_page;								
		
    	$prev = $page - 1;							
    	$next = $page + 1;
        $setLastpage = ceil($total/$per_page);
    	$lpm1 = $setLastpage - 1;
    	
    	$setPaginate = "";
    	if($setLastpage > 1)
    	{	
    		$setPaginate .= "<div class='pagination flex-m flex-w p-r-50'>";
                   // $setPaginate .= "stpage</a>";
    		if ($setLastpage < 7 + ($adjacents * 2))
    		{	
    			for ($counter = 1; $counter <= $setLastpage; $counter++)
    			{
    				if ($counter == $page)
    					$setPaginate.= "<a class='item-pagination flex-c-m trans-0-4 active-pagination'>$counter</a>";
    				else
    					$setPaginate.= "<a class='item-pagination flex-c-m trans-0-4 ' href='{$page_url}page=$counter&subc=$get'>$counter</a>";					
    			}
    		}
    		elseif($setLastpage > 5 + ($adjacents * 2))
    		{
    			if($page < 1 + ($adjacents * 2))		
    			{
    				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
    				{
    					if ($counter == $page)
    						$setPaginate.= "<a class='item-pagination flex-c-m trans-0-4 active-pagination'>$counter</a>";
    					else
    						$setPaginate.= "<a class='item-pagination flex-c-m trans-0-4' href='{$page_url}page=$counter&subc=$get'>$counter</a>";					
    				}
    				$setPaginate.= "<a class='dot'>...</a>";
    				$setPaginate.= "<a class='item-pagination flex-c-m trans-0-4'  href='{$page_url}page=$lpm1&subc=$get'>$lpm1</a>";
    				$setPaginate.= "<a class='item-pagination flex-c-m trans-0-4' href='{$page_url}page=$setLastpage&subc=$get'>$setLastpage</a>";		
    			}
    			elseif($setLastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
    			{
    				$setPaginate.= "<a class='item-pagination flex-c-m trans-0-4' href='{$page_url}page=1&subc=$get&year=$year'>1</a>";
    				$setPaginate.= "<a class='item-pagination flex-c-m trans-0-4' href='{$page_url}page=2&genres=$genres&year=$year'>2</a>";
    				$setPaginate.= "<a class='dot'>...</a>";
    				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
    				{
    					if ($counter == $page)
    						$setPaginate.= "<a  class='item-pagination flex-c-m trans-0-4 active-pagination' >$counter</a>";
    					else
    						$setPaginate.= "<a class=' item-pagination flex-c-m trans-0-4 href='{$page_url}page=$counter&subc=$get'>$counter</a>";					
    				}
    				$setPaginate.= "<a class='dot'>..</a>";
    				$setPaginate.= "<a  class=' item-pagination flex-c-m trans-0-4' href='{$page_url}page=$lpm1&subc=$get'>$lpm1</a>";
    				$setPaginate.= "<a  class=' item-pagination flex-c-m trans-0-4' href='{$page_url}page=$setLastpage&subc=$get'>$setLastpage</a>";		
    			}
    			else
    			{
    				$setPaginate.= "<a href='{$page_url}page=1&subc=$get'>1</a>";
    				$setPaginate.= "<a href='{$page_url}page=2&genres=$get'>2</a>";
    				$setPaginate.= "<a class='dot'>..</a>";
    				for ($counter = $setLastpage - (2 + ($adjacents * 2)); $counter <= $setLastpage; $counter++)
    				{
    					if ($counter == $page)
    						$setPaginate.= "<a  class='item-pagination flex-c-m trans-0-4 active-pagination' >$counter</a>";
    					else
    						$setPaginate.= "<a  class=' item-pagination flex-c-m trans-0-4' href='{$page_url}page=$counter&subc=$get'>$counter</a>";					
    				}
    			}
    		}
    		
    		if ($page < $counter - 1){ 
    			$setPaginate.= "<a  class=' item-pagination flex-c-m trans-0-4' href='{$page_url}page=$next&subc=$get'>Next</a>";
                $setPaginate.= "<a  class=' item-pagination flex-c-m trans-0-4' href='{$page_url}page=$setLastpage&subc=$get'>Last</a></li>";
    		}else{
    			$setPaginate.= "<a  class=' item-pagination flex-c-m trans-0-4 '>Next</a>";
                $setPaginate.= "<a  class=' item-pagination flex-c-m trans-0-4 '>Last</a>";
            }

    		$setPaginate.= "</div>\n";		
    	}
    
    
        return $setPaginate;
    } 
?>