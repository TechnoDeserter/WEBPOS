<?php

class Pager
{

	protected $limit   			= 10;
	public $offset   			= 0;  
	public $pages   			= 2;  

	public function __construct($limit = 10)
	{
		$this->limit = (int)$limit;
		
		$page_number = $this->update_page();
		$this->offset = ($page_number - 1) * $this->limit;



	}

	protected function update_page()
	{

		$page_number = $_GET['pg'] ?? 1;
		$page_number = (int)$page_number;

		if($page_number < 1)
		{
			$page_number = 1;
		}

		return $page_number;

	}

	protected function page_link($pg)
	{
		//url
		$url = "index.php?";
		$url2 = "";
		foreach ($_GET as $key => $value) {
			if($key == 'pg'){
				$url2 .= "&".$key ."=$pg";
			}else{
				$url2 .= "&".$key ."=".$value;
			}
		}
				

		$url2 = trim($url2,"&");
		if(!strstr($url2, "pg="))
		{
			$url2 .= "&pg=$pg";
		}

		$url .= $url2;
		return $url;
	}


	public function display_page($rec_count = null)
	{
		if(!$rec_count){
			$rec_count = $this->limit;
		}

		if($rec_count  < $this->limit){
			return;
		}

		$page_number = $this->update_page();

		?>
			<nav aria-label="Page navigation">
			  <ul class="pagination justify-content-end me-5 pe-3">
			    <li class="page-item">
			    	<?php 

		 				$num = $page_number - 1;
		 				$num = ($num < 1) ? 1 : $num;
		 			?>

			      <a class="page-link link-dark" href="<?=$this->page_link($num)?>" aria-label="Previous">
			        <span aria-hidden="true">&laquo;</span>
			      </a>
			    </li>
			    <?php
			    	$y = $this->pages;
			    	for ($i=1; $i <= $this->pages; $i++) { 

			    		if (($page_number - $y) < 1) {
			    			$y--;
			    			continue;
			    		}
			    			
			    		echo '
			    		<li class="page-item">
			    			<a class="page-link link-dark" href="'.$this->page_link($page_number - $y).'">'.$page_number - $y.'</a>
			    		</li>';
			    		$y--;
			    	}


			    ?>

			    <li class="page-item active">
			    	<a class="page-link link-dark" href="<?=$this->page_link($page_number)?>"><?=$page_number?></a>
			    </li>
			    <?php
			    	
			    	for ($i=1; $i <= $this->pages; $i++) { 
			    		echo '
			    		<li class="page-item">
			    		<a class="page-link link-dark" href="' . $this->page_link($page_number + $i) . '">' . ($page_number + $i) . '</a>
			    		</li>';
			    		
			    	}

			    ?>
			    <li class="page-item">
			      <a class="page-link link-dark" href="<?=$this->page_link($this->update_page() + 1)?>" aria-label="Next">
			        <span aria-hidden="true">&raquo;</span>
			      </a>
			    </li>
			  </ul>
			</nav>
		<?php
	}
}